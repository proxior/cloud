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


//$idletime=898;//after 15 minutes the user gets logged out


//if (time()-$_SESSION['timestamp']>$idletime)
 //  {
    
    // }


else
{

 $_SESSION['timestamp']=time();


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

   $ip_addr = $_SERVER['REMOTE_ADDR'];
   $path = $_SERVER['REQUEST_URI']; 

   $os_user = $os; 
   $browser_user = $yourbrowser;

   $date_now = date("Y-m-d H:i:s"); 

   $sql = "insert into prox_log_file (username,ip_addr,path,connect) 
           values('$ses_login','$ip_addr','$path',NOW())";

   $result = $conn->query($sql);  


} // end of else connection

//$conn->close();

} // end else session

?>


<!DOCTYPE html>
<html>
  <head> 
       <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> Proxior </title>

    <meta HTTP-EQUIV="REFRESH" content="900; url=logout.php">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Favicon-->
    <link rel="shortcut icon" href="img/logo.png">

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->



<style>

::-webkit-input-placeholder { /* WebKit browsers */
    text-align: center;
    color:white;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    text-align: center; color:white;
}
::-moz-placeholder { /* Mozilla Firefox 19+ but I'm not sure about working */
   text-align: center; color:white;
}
:-ms-input-placeholder { /* Internet Explorer 10+ */
   text-align: center;color:white;
}


input 
{
text-align: center;
}

input[type="text"]
{
height: 2em;
font-size:24px;
}


#map 
{
height: 80%;
}
  


}

</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
$(document).ready(function(){    
    loadstation();
});

function loadstation(){
    $("#station_data").load("remote_access.php");
    setTimeout(loadstation, 1000);
}
</script>





</head>

<body>


    <header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">

          <div class="navbar-header">
            <!-- Navbar Header--><a href="desktop.php" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase">
                <strong class="text-primary"> Proxior </strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">Proxior</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>


          <div class="right-menu list-inline no-margin-bottom">    
    
          
       <?php 
         echo 'Auto logout in  <span id="countdown"></span>'; 
       ?>


<!--for countdown to autologout -->
<script>
function countdown( elementName, minutes, seconds )
{
    var element, endTime, hours, mins, msLeft, time;

    function twoDigits( n )
    {
        return (n <= 9 ? "0" + n : n);
    }

    function updateTimer()
    {
        msLeft = endTime - (+new Date);
        if ( msLeft < 1000 ) {
            element.innerHTML = "countdown's over!";
        } else {
            time = new Date( msLeft );
            hours = time.getUTCHours();
            mins = time.getUTCMinutes();
            element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
            setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
        }
    }

    element = document.getElementById( elementName );
    endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
    updateTimer();
}

countdown( "countdown", 15, 0 );
</script>



            <!-- Tasks end-->
            <!-- Megamenu-->
            <div class="list-inline-item dropdown menu-large"><a href="#" data-toggle="dropdown" class="nav-link"> Operations <i class="fa fa-ellipsis-v"></i></a>
              <div class="dropdown-menu megamenu">
                <div class="row">
                 
                 
                 
                </div>
                <div class="row megamenu-buttons text-center">
                  <div class="col-lg-2 col-md-4"><a href="#" class="d-block megamenu-button-link dashbg-1"><i class="fa fa-clock-o"></i><strong> Demo 1 </strong></a></div>
                  <div class="col-lg-2 col-md-4"><a href="#" class="d-block megamenu-button-link dashbg-2"><i class="fa fa-clock-o"></i><strong>Demo 2</strong></a></div>
                  <div class="col-lg-2 col-md-4"><a href="#" class="d-block megamenu-button-link dashbg-3"><i class="fa fa-clock-o"></i><strong>Demo 3</strong></a></div>
                  <div class="col-lg-2 col-md-4"><a href="#" class="d-block megamenu-button-link dashbg-4"><i class="fa fa-clock-o"></i><strong>Demo 4</strong></a></div>
                  <div class="col-lg-2 col-md-4"><a href="#" class="d-block megamenu-button-link bg-danger"><i class="fa fa-clock-o"></i><strong>Demo 5</strong></a></div>
                  <div class="col-lg-2 col-md-4"><a href="#" class="d-block megamenu-button-link bg-info"><i class="fa fa-clock-o"></i><strong>Demo 6</strong></a></div>
                </div>
              </div>
            </div>
            <!-- Megamenu end     -->


            <!-- Log out               -->
            <div class="list-inline-item logout"><a id="logout" href="logout.php" class="nav-link"> <span class="d-none d-sm-inline"> Logout </span><i class="icon-logout"></i></a></div>
          </div>
        </div>
      </nav>
    </header>



    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="img/logo.png" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5"> Proxior </h1>
            <p> Lan Interception </p>
          </div>
        </div>



        <!-- Sidebar Navidation Menus--> <!-- <span class="heading"> MENU </span> -->
        <ul class="list-unstyled">
          <li class="active"><a href="desktop.php"> <i class="fa fa-desktop"></i></i> Desktop </a></li>
          <li><a href="server.php"> <i class="fa fa-server"></i> Server </a></li>
          <li><a href="ui_panel.php"> <i class="fa fa-window-restore"></i> UI Panel </a></li>
          <li><a href="router.php"> <i class="fa fa-fax"></i> Router </a></li>
          <li><a href="commands.php"> <i class="fa fa-terminal"></i> Commands </a></li>

           <li>

            <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> 
              <i class="fa fa-connectdevelop"></i> Remote Access 
            </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li> 
                <a href="remote_access.php"> <i class="fa fa-map-marker"></i> Device Locations </a>
              </li>
              <li class="active"> 
                <a href="remote_access2.php"> <i class="fa fa-map-pin"></i> Devices Radius </a>
            </li>
            </ul>

          </li>

        </ul>

       <!-- <span class="heading">Extras</span> -->
        <ul class="list-unstyled">
          <li> <a href="settings.php"> <i class="icon-settings"></i> Settings </a></li>
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->






     
      <div class="page-content">
       <!-- Page Header-->
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom"> Remote Access </h2>

          </div>
        </div>

<?php           

session_start();
        
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

$ses_login = $_SESSION['login'];


$sql_locations = "SELECT GROUP_CONCAT(CONCAT(all_info2))
                   AS 'combined_all_info2'
                   FROM prox_devices where user = '$ses_login'"; 


$result_locations = $conn->query($sql_locations); 

//$result->error;


echo'<div id="map"></div>';
        

while ($row_locations = $result_locations->fetch_array(MYSQLI_NUM))
           {

         $all_info2 = $row_locations[0];

        // echo $all_info;
         //echo"<br>";

         // View locations in map save to 9 locations
         // For view multiple locations 
        // INSERT into phpmyadmin from administrator account
        // go to home and go to variables tab
       // insert end find group_concat_max_len
       // press edit and change value
       //SET variables group_concat_max_len = 1000000;


//$all_info = htmlspecialchars($all_info);



//echo $all_info2;


echo"<script>
      // This example creates circles on the map, representing populations in North
      // America.

      // First, create an object containing LatLng and population for each city.
      var citymap = {{$all_info2},};



      function initMap() {
        // Create the map.
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
          center: {lat:38.000, lng: 25.000},
          mapTypeId: 'hybrid'
        });

        
        for (var city in citymap) {
          // Add the circle for this city to the map.
          var cityCircle = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 8,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            map: map,
            center: citymap[city].center,
            radius: Math.sqrt(citymap[city].population) * 15
          });
        }
      }
    </script>";

  } // end of while devices locations


 } // end of else connect



// $conn->close();

?>


      


<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>

      <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initMap"></script>


     
       <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <p class="no-margin-bottom"> Proxior </p>
            </div>
          </div>
        </footer>


      </div>
    </div>

    <!-- JavaScript files-->


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-custom.js"></script>
    <script src="js/front.js"></script>

  </body>
</html>
