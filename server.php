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

select option 
{
background: #22252a;
color: white;
font-size:20px;
}

#sel
{
height: 3.4em;
background-color:transparent;
color: white;
}


input 
{
text-align: center;
}


input[type="text"]
{
height: 2.1em;
font-size:26px;
}


#butt
{
height: 3.4em;
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
            <!-- Megamenu end -->  


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

        <!-- Sidebar Navidation Menus--> <!-- <span class="heading">Main</span> -->

        <ul class="list-unstyled">
          <li><a href="desktop.php"> <i class="fa fa-desktop"></i></i> Desktop </a></li>
          <li class="active"><a href="server.php"> <i class="fa fa-server"></i> Server </a></li>
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

        </ul>
        <ul class="list-unstyled">
          <li> <a href="settings.php"> <i class="icon-settings"></i> Settings </a></li>
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->


      <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom"> Server </h2>
          </div>
        </div>

        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
          </ul>
        </div>


        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">


               
              <!-- Connection Form-->
              <div class="col-lg-12">

               <div class='block col-lg-12'>
                  <strong class='title'> 
                    <font color="white" size="5">
                     Remote Commands Proxior &nbsp; <i class='fa fa-terminal'></i> 
                    </font>
                  </strong>
                </div>

                 <form action="" method="post">

                      <div class='form-group' style="width:100%;"> 
            <input type='text' name='prox_mac' class='form-control' 
                   placeholder=' &#9817;  <?php echo "User Proxior:" .$_SESSION["login"]; ?> ' disabled>
                </div> 

                   <div class='form-group' style="width:100%;">
                  <select class="form-control" id="sel" data-width="100%" name="prox_command" required>
                   <option value="server_connect"> &#9636;   Server Connect &#10004; </option>
                   <option value="server_clear"> &#9636; Server Clear &#10006; </option>
                   <option value="ui_panel_connect"> &#9705; UI Panel Connect &#10004; </option>
                   <option value="ui_panel_logout"> &#9705; UI Panel Logout &#10006; </option>
                   <option value="router_connect"> &#9990; Router Connect &#10004; </option>
                   <option value="router_logout"> &#9990; Router Logout &#10006; </option>
                 </select>
                </div> 

                   <div class='form-group' style="width:100%;">
            <input type='text' name='prox_ip' class='form-control' 
                   placeholder='&#9762; Device IP Address' pattern='^([0-9]{1,3}\.){3}[0-9]{1,3}$' required>
               </div>       

                      <div class="form-group">       
                  <button type="submit" name="submit_request" class="btn btn-primary btn-block" id="butt">
                   Request &nbsp; <i class="fa fa-connectdevelop"></i>
                  </button>
                      </div>

                    </form>
                  </div>

             <br><br>
              
    


       
            
        

              
<?php

function input($data)
       {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
        return $data;
           }
           


 if (isset($_POST['submit_request']))
      {

      $prox_command = input($_POST['prox_command']);
      $prox_ip = input($_POST['prox_ip']);

           
  // remote proxior connection      


 if ($prox_command == "server_connect")
     {

      $host="http://$prox_ip/?clear";

    echo" <h2 style='width:100%; color:green;' align='center'> ---------- </h2> 
           
        <div class='col-lg-12' align='center'>
    
        <font size='5'> <i class='fa fa-server'></i> Server Connect </font> 
             <hr style='width:100%;'>

<a href='$host' class='btn btn-primary'style='height:80px; width:300px;padding:27px;' target='_blank'>
    Connection <i class='fa fa-plug'></i>
</a>

<p></p>
 
         </div>";

      }



  // remote proxior clear       

 if ($prox_command == "server_clear")
     {

      $host="http://$prox_ip/clear.php";


   echo" <h2 style='width:100%; color:red;' align='center'> ---------- </h2> 

      <div class='col-lg-12' align='center'>
   
      <font size='5'> <i class='fa fa-server'></i> Server Clear </font> 
             <hr style='width:100%;'>

<a href='$host' class='btn btn-primary'style='height:80px; width:300px;padding:27px;' target='_blank'>
    Cleaning <i class='fa fa-eraser'></i>
</a>
 
 </p></p>
         </div>";


      }




 // remote ui panel        

   if ($prox_command == "ui_panel_connect")
       { 

      $host="http://$prox_ip/UI/index.php?username=proxior%40dns&password=proxior%40dns&submit=";


   echo"  <h2 style='width:100%; color:green;' align='center'> ---------- </h2>  

      <div class='col-lg-12' align='center'>
   
    <font size='5'> <i class='fa fa-window-restore'></i> UI Panel Connect </font> 
             <hr style='width:100%;'>

<a href='$host' class='btn btn-primary'style='height:80px; width:300px;padding:27px;' target='_blank'>
    Connection <i class='fa fa-plug'></i>
</a>

 <p></p>
 
         </div>";
       
      //echo ("<script>location.href='$host'</script>");

      }



// remote ui panel logout       

   if ($prox_command == "ui_panel_logout")
       {


      $host="http://$prox_ip/UI/logout.php";


   echo"  <h2 style='width:100%; color:red;' align='center'> ---------- </h2> 
 
           <div class='col-lg-12' align='center'>
   
       <font size='5'> <i class='fa fa-window-restore'></i> UI Panel Logout </font> 
             <hr style='width:100%;'>

<a href='$host' class='btn btn-primary'style='height:80px; width:300px;padding:27px;' target='_blank'>
    Logout <i class='fa fa-sign-out'></i>
</a>
  
   <p></p>
         </div>";
       
      //echo ("<script>location.href='$host'</script>");

      }




 // remote router         

   if ($prox_command == "router_connect")
      {

      $host="http://$prox_ip/login.cgi?username=proxior&psd=proxior";


   echo"  <h2 style='width:100%; color:green;' align='center'> ---------- </h2> 
          
          <div class='col-lg-12' align='center'>

         <font size='5'> <i class='fa fa-fax'></i> Router Connect </font> 
             <hr style='width:100%;'>

<a href='$host' class='btn btn-primary'style='height:80px; width:300px;padding:27px;' target='_blank'>
    Connection <i class='fa fa-plug'></i>
</a>
 
    <p></p>

         </div>";
       
      //echo ("<script>location.href='$host'</script>");

      }



// remote router logout       

  if ($prox_command == "router_logout")
      {

      $host="http://$prox_ip/logout.cgi";

   echo"  <h2 style='width:100%; color:red;' align='center'> ---------- </h2> 

           <div class='col-lg-12' align='center'>
    
         <font size='5'> <i class='fa fa-fax'></i> Router Logout </font> 
             <hr style='width:100%;'>

<a href='$host' class='btn btn-primary'style='height:80px; width:300px;padding:27px;' target='_blank'>
    Logout <i class='fa fa-sign-out'></i>
</a>
   
     <p></p>

         </div>";
       
      //echo ("<script>location.href='$host'</script>");

      }





 } // end if isset submit request      


?>


          
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
    <script src="js/front.js"></script>
  </body>
</html>
