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

require('__ROOT__/class_cn.php');

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

   $ip_addr = $_SERVER['REMOTE_ADDR'];
   $path = $_SERVER['REQUEST_URI']; 

   $date_now = date("Y-m-d H:i:s"); 

   $sql = "insert into prox_log_file (username,ip_addr,path,connect) 
           values('$ses_login','$ip_addr','$path',NOW())";

   $result = $conn->query($sql);  


} // end of else connection

$conn->close();

} // end else session



?>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title> Proxior </title>

     <link rel="shortcut icon" href="img/logo.png">

    <meta HTTP-EQUIV="REFRESH" content="900; url=logout.php">

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<script>
$(document).ready(function(){
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showLocation);
    }else{ 
        $('#location').html('Geolocation is not supported by this browser.');
    }
});



function showLocation(position)
         {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    //var admin     = window.location.href;

    var str = window.location.href;
    var user = str.split('=').pop();

    $.ajax({
        type:'POST',
        url:'view.php',
        data:{
             user : user, 
             latitude : latitude,
             longitude : longitude
              },
        success:function(msg)
             {
            if(msg)
              {
               $("#location").html(msg)
                  }
             else
               {
                $("#location").html('Not Available');
                  }
              }
            });
           }



</script>

<style>
body
{
background: url(img/radar.gif);
background-repeat: no-repeat;
background-size:20%;
background-position: 50% 50%; 
background-color:#22252a;
}


.blink_me {
  animation: blinker 2s linear infinite;
  color: white;
  font-weight: bold;
  font-size: 50px;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}

</style>

</head>

<body>
    
     
   <p>  <span id="location"></span></p> 

    <h1 align="center"> 
      <font color="white"> Proxior Devices </font> 
      <hr style="width:100%;">     
   </h1>


   <!-- <div class="blink_me" align="center"> SEARCH LOCATION </div> -->

</body>
</html>

<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

require('__DEV__/function.php');
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


$device_id =  $_SERVER["REMOTE_ADDR"];

$last_ip   =  $_SERVER["REMOTE_ADDR"];

$user_finger =  $_SESSION['fingerprint'];

$user = $_POST['user'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];


$address = "Here";

$all_info = "{ lat: " . $latitude . ", " . "lng: " . $longitude . ", " . "info: " . "''" . "Device Fingerprint: " . $device_id  . " <br> " . "Address: " . $address . "''" . " }"; 


       $time_of_renewal = 1;

   
       if (!empty($admin . $$latitude . $longitude))
             {

       $sql_norm_dev = "insert into prox_devices(user,device_id, last_ip, latitude, longitude, address, fingerprint, all_info) values ('$user','$device_id','$last_ip','$latitude','$longitude','$address','$user_finger','$all_info')";



       $sql_back_dev = "insert into prox_backup_devices(user,device_id, last_ip, latitude, longitude, address, fingerprint, all_info) values ('$user','$device_id','$last_ip','$latitude','$longitude','$address','$user_finger','$all_info')";

       $result_norm_dev = $conn->query($sql_norm_dev);
       $result_back_dev = $conn->query($sql_back_dev);

       sleep($time_of_renewal);


           } // check for empty fields

} // end of else connect

$conn->close();

?>
