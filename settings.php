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

</style>



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
              <li> 
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
            <h2 class="h5 no-margin-bottom"> Settings </h2>
          </div>
        </div>


        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
          
    <!-- Connection Form-->
              <div class="col-lg-12">
                <div class="block">

           <div class="title" align="center">
             <strong class="d-block"> Change Password <i class="fa fa-key"></i></strong>
             <span class="d-block"> Use the form below to change your password. </span>
           </div>

             <div class="block-body">
                <form action="" method="post">

               <div class="form-group">
                <input type="text" class="form-control" 
                       placeholder="Proxior User: <?php echo $_SESSION['login']; ?>" 
                       disabled>
                 </div>

              <div class="form-group">
                <input type="password" name="pass1" class="form-control" placeholder="Password"
                       pattern=".{8,}" required title="8 characters minimum">
                 </div>


                 <div class="form-group">
                <input type="password" name="pass2" class="form-control" placeholder="Password Retype"
                       pattern=".{8,}" required title="8 characters minimum">
                 </div>


               <div class="form-group">       
                 <button type="submit" name="submit_pass" class="btn btn-primary btn-block">
                  Change Password &nbsp; <i class="fa fa-lock"></i>
                 </button>
              </div>


                    </form>
                  </div>

                </div>
              </div>




<?php

if (isset($_POST['submit_pass']))
     {

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//require('__ROOT__/class_cn.php');
require('__DEV__/function.php');

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

    $username  = $_SESSION['login'];
    $pass1 = input($_POST['pass1']);
    $pass2 = input($_POST['pass2']);

       
      if (empty($pass1) || empty($pass2))
          {
         echo" <div class='col-lg-12' align='center'>
            <font size='5'> <i class='fa fa-exclamation-triangle'></i> These fields are required </font> 
              <hr style='height:30px; width:100%;'>
             <meta http-equiv='refresh' content='2; url=settings.php' />
         </div>";
           }

     
     else if (empty($pass1) && empty($pass2))
          {
         echo" <div class='col-lg-12' align='center'>
            <font size='5'> <i class='fa fa-exclamation-triangle'></i> These fields are required </font> 
              <hr style='height:30px; width:100%;'>
             <meta http-equiv='refresh' content='2; url=settings.php' />
         </div>";
           }

   else 
     {
       
        if ($pass1 == $pass2)
             {

              $password = md5($pass1);

              $sql = "update prox_login set password = '$password'
                      where username = '$username' 
                      and verification_code = 'ok' and verify = 'yes'";
              $result = $conn->query($sql);

        if ($result == true)
            {          
          echo" <div class='col-lg-12' align='center'>
            <font size='5'> <i class='fa fa-check'></i> Password changed successfully </font> 
              <hr style='height:30px; width:100%;'>
             <meta http-equiv='refresh' content='2; url=logout.php' />
         </div>";
            }

         else
           {          
          echo" <div class='col-lg-12' align='center'>
              <font size='5'> <i class='fa fa-exclamation-triangle'></i> 
                Something went wrong. Please try again 
              </font> 
              <hr style='height:30px; width:100%;'>
              <meta http-equiv='refresh' content='1; url=settings.php' />
         </div>";
            }


        } // end of result change pass


   
        else
           {          
          echo" <div class='col-lg-12' align='center'>
              <font size='5'> <i class='fa fa-exclamation-triangle'></i> 
                 The passwords does not match. <br> Enter the same password in both fields 
              </font> 
              <hr style='height:30px; width:100%;'>
              <meta http-equiv='refresh' content=5; url=settings.php' />
         </div>";
           }
  
   
      } // end of else for check empty fields      

 
     } // end else of connect

    $conn->close();

  } // end of isset submit


?>



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
    <script src="js/charts-custom.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>
