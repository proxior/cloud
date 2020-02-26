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

   $sql2 = "insert into prox_users_activities
            (username,fingerprint,ip_addr,os,browser,log_in_time,log_out_time) 
            values('$ses_login','$user_finger','$ip_addr','$os_user','$browser_user',NOW(),'')";


   $result = $conn->query($sql);  
   $result2 = $conn->query($sql2);  


} // end of else connection

$conn->close();

} // end else session

?>


<!DOCTYPE html>
<html>
  <head> 

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
                
                
                  <div class="col-lg-2 col-md-4">
                    <a href="operations/install_linux.html" target="_blank" class="d-block megamenu-button-link dashbg-1">
                     <i class="fa fa-linux"></i>
                     <strong> Install Linux </strong>
                    </a>
                  </div>
                  
                  
                  <div class="col-lg-2 col-md-4">
                    <a href="#" target="_blank" class="d-block megamenu-button-link dashbg-2">
                     <i class="fa fa-windows"></i>
                     <strong> Install Windows </strong>
                    </a>
                  </div>
                  
                  
                  <div class="col-lg-2 col-md-4">
                    <a href="operations/install_android.html" target="_blank" class="d-block megamenu-button-link dashbg-3">
                     <i class="fa fa-android"></i>
                     <strong> Install Android </strong>
                    </a>
                  </div>
                  
                  
                  <div class="col-lg-2 col-md-4">
                    <a href="#" target="_blank" class="d-block megamenu-button-link dashbg-4">
                     <i class="fa fa-clock-o"></i>
                     <strong>Demo 4</strong>
                    </a>
                  </div>
                  
                  
                  <div class="col-lg-2 col-md-4">
                    <a href="#" target="_blank" class="d-block megamenu-button-link bg-danger">
                     <i class="fa fa-clock-o"></i>
                     <strong>Demo 5</strong>
                    </a>
                  </div>
                  
                  
                  <div class="col-lg-2 col-md-4">
                    <a href="#" target="_blank" class="d-block megamenu-button-link bg-info">
                     <i class="fa fa-clock-o"></i>
                     <strong>Demo 6</strong>
                    </a>
                  </div>
                  
                  
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
          <li><a href="clone.php"> <i class="fa fa-clone"></i> Cloning </a></li>
          <li><a href="ui_panel.php"> <i class="fa fa-window-restore"></i> UI Panel </a></li>
          <li><a href="commands.php"> <i class="fa fa-terminal"></i> Commands </a></li>

          <li>

            <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> 
              <i class="fa fa-connectdevelop"></i> Remote Access 
            </a>

              <ul id="exampledropdownDropdown" class="collapse list-unstyled">

               <li> 
                <a href="re_acc_map_locations.php"> <i class="fa fa-map-marker"></i> Device Locations </a>
              </li>

              <li> 
                <a href="re_acc_map_radius.php"> <i class="fa fa-map-pin"></i> Device Radius </a>
            </li>

            <li> 
                <a href="re_acc_sms_spoof.php"> <i class="fa fa-comment"></i> Sms Spoof </a>
            </li>
 
            </ul>

          </li>

            <!--
            <a href="remote_access.php"> <i class="fa fa-connectdevelop"></i> Remote Access </a>
             <ul> 
              <a href="remote_access.php"> <i class="fa fa-connectdevelop"></i> Remote Access </a>
              <a href="remote_access2.php"> <i class="fa fa-connectdevelop"></i> Remote Access </a>
             </ul>
               -->

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
            <h2 class="h5 no-margin-bottom"> Desktop </h2>
          </div>
        </div>

        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon">
                        <i class="fa fa-object-ungroup"></i>
                        <i class="fa fa-copy"></i>
                      </div><strong> Clone Methods </strong>
                    </div>
                    <div class="number dashtext-1">2</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                  <div class="icon">
                     <i class="fa fa-tv"></i>
                     <i class="fa fa-desktop"></i> 
                     <i class="fa fa-laptop"></i>
                     <i class="fa fa-tablet"></i>
                     <i class="fa fa-mobile"></i>
                    </div><strong> Attack Methods </strong>
                    </div>
                    <div class="number dashtext-2">3</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                   <div class="icon">
                     <i class="fa fa-battery-half"></i>
                     <i class="fa fa-globe"></i>
                     <i class="fa fa-wifi"></i>
                     <i class="fa fa-bluetooth"></i>
                     </div><strong> Campatible Devices </strong>
                    </div>
                    <div class="number dashtext-3">7</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon">
                        <i class="fa fa-microchip"></i>
                        <i class="fa fa-server"></i>
                      </div><strong> OS Systems </strong>
                    </div>
                    <div class="number dashtext-4">3</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-4">
                <div class="bar-chart block no-margin-bottom">
                  <canvas id="barChartExample1"></canvas>
                </div>
                <div class="bar-chart block">
                  <canvas id="barChartExample2"></canvas>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="line-cahrt block">
                  <canvas id="lineCahrt"></canvas>
                </div>
              </div>
            </div>
          </div>
        </section>


        <section class="no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-4">
                <div class="user-block block text-center">
                  <div class="avatar"><img src="img/dns.png" alt="..." class="img-fluid">
                    <div class="order dashbg-2">1st</div>
                  </div><a class="user-title">
                    <h3 class="h5">Dns Spoof</h3><span>Spoofing and poisoning DNS</span></a>
                  <div class="contributions"> 7 Campatible Devices </div>
                  <div class="details d-flex">
                    <div class="item"><i class="icon-info"></i><strong>Yes</strong></div>
                    <div class="item"><i class="fa fa-gg"></i><strong>Yes</strong></div>
                    <div class="item"><i class="icon-flow-branch"></i><strong>Yes</strong></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="user-block block text-center">
                  <div class="avatar"><img src="img/gm.png" alt="..." class="img-fluid">
                    <div class="order dashbg-1">2nd</div>
                  </div><a href="#" class="user-title">
                    <h3 class="h5">Email phishing</h3><span>Ngrok Link or IP</span></a>
                  <div class="contributions">1 Default Dettings </div>
                  <div class="details d-flex">
                    <div class="item"><i class="icon-info"></i><strong>Yes</strong></div>
                    <div class="item"><i class="fa fa-gg"></i><strong>Yes</strong></div>
                    <div class="item"><i class="icon-flow-branch"></i><strong>Yes</strong></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="user-block block text-center">
                  <div class="avatar"><img src="img/os.jpg" alt="..." class="img-fluid">
                    <div class="order dashbg-4">3rd</div>
                  </div><a href="#" class="user-title">
                    <h3 class="h5">OS Systems</h3><span>Gnu/linux systems</span></a>
                  <div class="contributions">3 / Kali-Ubuntu-Mint</div>
                  <div class="details d-flex">
                    <div class="item"><i class="icon-info"></i><strong>Yes</strong></div>
                    <div class="item"><i class="fa fa-gg"></i><strong>Yes</strong></div>
                    <div class="item"><i class="icon-flow-branch"></i><strong>Yes</strong></div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </section>

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
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>
