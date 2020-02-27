<?php

/*
*  Copyright (c) 2019-2020 Barchampas Gerasimos <makindosxx@gmail.com>.
*  proxior is a wifi interception.
*
*  proxior is free software: you can redistribute it and/or modify
*  it under the terms of the GNU Affero General Public License as published by
*  the Free Software Foundation, either version 3 of the License, or
*  (at your option) any later version.
*
*  proxior is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU Affero General Public License for more details.
*
*  You should have received a copy of the GNU Affero General Public License
*  along with this program.  If not, see <http://www.gnu.org/licenses/>.
*
*/

session_start();

if (!isset($_SESSION['login']))
    {
      header("Location: index.php");
      }



else
{

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

//require('__ROOT__/class_cn.php');


 $obj = new security;
 
 $host=$obj->connect[0];
 $user=$obj->connect[1];
 $pass=$obj->connect[2];
 $db=$obj->connect[3];

$conn = new mysqli($host,$user,$pass,$db);

  if($conn->connect_error)
     {
     die ("Cannot connect to server " .$conn->connect_error);
       }

else
  {

   $ses_login = $_SESSION['login'];

   $ses_mail =  $_SESSION['mail'];


 
    $sql_level = "select user, email, access_level, access_level_num from prox_access_level 
                 where user='$ses_login' and email='$ses_mail'";

    $result_level = $conn->query($sql_level);  


      while ($row_level = $result_level->fetch_assoc())
             {
              $access_level = $row_level['access_level'];
              $access_level_num = $row_level['access_level_num'];  
              } // end while level
      

} // end of else connection

$conn->close();

} // end else session

?>

