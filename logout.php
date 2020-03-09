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

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

require('__ROOT__/class_cn.php');
require('browser_user.php');
require('os_user.php');

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

  $user_finger =  $_SESSION['fingerprint'];

  $sql="update prox_users_activities set log_out_time=NOW() 
         where username='$ses_login' and fingerprint='$user_finger'";

  $result = $conn->query($sql);
 

 if (isset($_SESSION['key']))
     {

    $rand_key = 6;
    $rand_keyw  = substr(str_shuffle("0123456789"),0, $rand_key);

    $keyword = $ses_login.$rand_keyw;

    $sql3="update prox_login set keyword = '$keyword' where username = '$ses_login'";
    $result3=$conn->query($sql3); 

     } // end if isset session key (font one connection) 

session_unset();
session_destroy();

echo ("<script>location.href='index.php'</script>");


} // end of else login


$conn->close();


?>
