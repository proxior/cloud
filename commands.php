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

require('os_block.php');
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

@media (min-width: 768px) {
    .form-inline .form-control {
        width: 280px;
    }
}


table {
  display: inline-block;
  height: 150px;
  width: 100%;
  overflow-y: scroll;
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
          <li><a href="desktop.php"> <i class="fa fa-desktop"></i></i> Desktop </a></li>
          <li><a href="server.php"> <i class="fa fa-server"></i> Server </a></li>
          <li><a href="ui_panel.php"> <i class="fa fa-window-restore"></i> UI Panel </a></li>
          <li><a href="router.php"> <i class="fa fa-fax"></i> Router </a></li>
          <li class="active"><a href="commands.php"> <i class="fa fa-terminal"></i> Commands </a></li>

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



      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom"> Commands </h2>
          </div>
        </div>


        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
          </ul>

     <?php

       $protocol = $_SERVER['SERVER_PORT'];

     if ($protocol == '443')
        {
       $protocol = 'https://';
        }

else if ($protocol == '80')
         {
         $protocol = 'http://';
         }


$url = $_SERVER['SERVER_NAME'];

$admin = $_SESSION['login'];

$link_url = $protocol .$url ."/cloud/view.php?=$admin"; 
$link_url = str_replace(" ","",$link_url);

          echo "<div class='col-md-12'>
                   <div class='card'>
                        <p></p>
                       <h4 class='title' align='center'> 
                         <i class='fa fa-link'></i> Links for find the location 
                       </h4>

                  <p align='center'>
                     <i class='fa fa-external-link'></i>
                     Link on url: &nbsp;
                     <a href='' id='a' onclick='copy(this)'> $link_url </a>
                  </p>

             </div>
           </div>";
            
            ?>

        </div>





        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
<?php

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


   $ses_login = $_SESSION['login'];
   $ses_mail = $_SESSION['mail'];

  $sql ="select id, user, ip_addr, mac_addr from prox_data 
         where user='$ses_login' order by instant desc";

  $result=$conn->query($sql);

 // $rows = $result->num_rows;

   //if ($rows == 1) 
    //{  


         echo"
             <div class='col-lg-12'>
               <div class='block'>
                <div class='title'>
                  <strong> Remote Commands Proxior &nbsp; <i class='fa fa-terminal'></i> </strong>
                </div>


         <form action='' method='post' class='form-inline'>

                 <div class='form-group'> 
            <input type='text' name='prox_mac' class='form-control' 
                   placeholder='User Proxior: $ses_login ' disabled>
                </div> 


          <div class='checkbox'>
               &nbsp; &nbsp;
            </div>
 

                 <div class='form-group'>
            <input type='text' name='prox_mac' class='form-control' placeholder='Device Mac Address' pattern='^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$' required>
                </div> 


          <div class='checkbox'>
               &nbsp; &nbsp;
            </div>

       
               <div class='form-group'>
            <input type='text' name='prox_ip' class='form-control' placeholder='Device IP Address' pattern='^([0-9]{1,3}\.){3}[0-9]{1,3}$' required>
               </div>          


            <div class='checkbox'>
             &nbsp; &nbsp;
            </div>

        
            <div class='form-group'>
            <button type='submit' name='submit_insert' class='btn btn-primary'>
                 insert Data &nbsp; <i class='fa fa-keyboard-o'></i>
               </button>
               </div>

               </form>

              
              <br><br>


              <div class='table-responsive'> 


                  &nbsp; 
                <i class='fa fa-microchip'></i> <b> MAC ADDRESS </b>
                   &nbsp; &nbsp; &nbsp;

                <i class='fa fa-globe'></i> <b> IP ADDRESS </b>
                    &nbsp; &nbsp; &nbsp;

                <i class='fa fa-server'></i> <b> SERVER COMMANDS </b>
                   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 

                <i class='fa fa-window-restore'></i> <b> UI PANEL COMMANDS </b>
                   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 

                <i class='fa fa-fax'></i> <b> ROUTER MANAGEMENT </b>
                                      



              <table class='table table-striped table-hover'>
 
                      <!--
                      <thead>
                        <tr>
                          <th> <i class='fa fa-microchip'></i> MAC ADDRESS </th>
                          <th> <i class='fa fa-globe'></i> IP ADDRESS </th>
                          <th> <i class='fa fa-server'></i> SERVER COMMANDS </th> 
                          <th> <i class='fa fa-window-restore'></i> UI PANEL COMMANDS </th>
                          <th> <i class='fa fa-fax'></i> ROUTER MANAGEMENT </th>
                        </tr>
                      </thead> --> ";

   
     while ($row=$result->fetch_assoc())
       {

        $id = $row['id'];
        $user = $row['user'];
        $ip_addr = $row['ip_addr'];
        $mac_addr = $row['mac_addr'];


                      echo" <tbody>

                        <tr>
                          <th scope='row'> $mac_addr </th>
                          <td> $ip_addr </td>
                         

                       <td> 

                    <form action='' method='post'>
                    <div class='form-group'>       
               <button type='submit' name='submit_req_connect' value='$ip_addr' class='btn btn-primary'>
                 Connect &nbsp; <i class='fa fa-plug'></i>
               </button>

               <button type='submit' name='submit_req_clear' value='$ip_addr' class='btn btn-primary'>
                 Clear &nbsp; <i class='fa fa-eraser'></i>
               </button>
                      </div>
                    </form>

                   </td>


               <td> 
              
                <form action='' method='post'>
                  <div class='form-group'>
     
                  <button type='submit' name='submit_ui_connect' value='$ip_addr' class='btn btn-primary'>
                   Connect &nbsp; <i class='fa fa-plug'></i>
                  </button>
               
                    <button type='submit' name='submit_ui_logout' value='$ip_addr' class='btn btn-primary'> 
                      Logout &nbsp; <i class='fa fa-sign-out'></i> 
                    </button>

                      </div>
                    </form>

               </td>



              <td>  

               <form action='' method='post'>
               <div class='form-group'>
     
           <button type='submit' name='submit_rout_connect' value='192.168.2.1' class='btn btn-primary'>
                  Connect &nbsp; <i class='fa fa-plug'></i>
                </button>
               
            <button type='submit' name='submit_rout_logout' value='192.168.2.1' class='btn btn-primary'>
                 Logout &nbsp; <i class='fa fa-sign-out'></i>
               </button>

               </div>
               </form>

             </td>
          
              </tr>


                      </tbody>";

                     } // end of while  

              echo"</table>

                  </div>
                </div>
              </div>";


       
 

  //  } // end if

  


 // insert mac,ip addr         

 if (isset($_POST['submit_insert']))
     {

      $mac_addr = input($_POST['prox_mac']);
      $ip_addr = input($_POST['prox_ip']);

      $sql_addr = "insert into prox_data (user,email,mac_addr,ip_addr)
                   values ('$ses_login','$ses_mail','$mac_addr','$ip_addr')";
      $result_addr = $conn->query($sql_addr);


      $sql_addr_backup = "insert into prox_backup_data (user,email,mac_addr,ip_addr)
                   values ('$ses_login','$ses_mail','$mac_addr','$ip_addr')";
      $result_addr_backup = $conn->query($sql_addr_backup);

  
       if ($result_addr == true && $result_addr_backup == true)
           {          
          echo" <div class='col-lg-12' align='center'>
            <font size='5'> <i class='fa fa-check'></i> Successful data entry </font> 
              <hr style='height:30px; width:100%;'>
             <meta http-equiv='refresh' content=1; url=commands.php' />
         </div>";
            }

         else
           {          
          echo" <div class='col-lg-12' align='center'>
              <font size='5'> <i class='fa fa-exclamation-triangle'></i> Failed data entry </font> 
              <hr style='height:30px; width:100%;'>
         </div>";
            }
 

      } // end of insert 




           
  // remote proxior connection        

 if (isset($_POST['submit_req_connect']))
     {

      $device_ip = input($_POST['submit_req_connect']);

      $host="http://$device_ip/?clear";


    echo" <div class='col-lg-12' align='center'>

            <font size='5'> <i class='fa fa-server'></i> Server Connect </font> 
             <hr style='width:100%;'>

<a href='$host' class='btn btn-primary'style='height:80px; width:300px;padding:27px;' target='_blank'>
    Connection <i class='fa fa-plug'></i>
</a>

  <p></p>
 
         </div>";

      }



  // remote proxior clear       

 if (isset($_POST['submit_req_clear']))
     {

      $device_ip = input($_POST['submit_req_clear']);

      $host="http://$device_ip/clear.php";


   echo" <div class='col-lg-12' align='center'>

        <font size='5'> <i class='fa fa-server'></i> Server Clear </font> 
             <hr style='width:100%;'>

<a href='$host' class='btn btn-primary'style='height:80px; width:300px;padding:27px;' target='_blank'>
    Cleaning <i class='fa fa-eraser'></i>
</a>

<p></p>
 
         </div>";


      }


 // remote ui panel connect

if (isset($_POST['submit_ui_connect']))
       {

      $device_ip = input($_POST['submit_ui_connect']);

      $host="http://$device_ip/UI/index.php?username=proxior%40dns&password=proxior%40dns&submit=";



   echo" <div class='col-lg-12' align='center'>
   
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

   if (isset($_POST['submit_ui_logout']))
       {

      $device_ip = input($_POST['submit_ui_logout']);

      $host="http://$device_ip/UI/logout.php";


   echo" <div class='col-lg-12' align='center'>

       <font size='5'> <i class='fa fa-window-restore'></i> UI Panel Logout </font> 
             <hr style='width:100%;'>

<a href='$host' class='btn btn-primary'style='height:80px; width:300px;padding:27px;' target='_blank'>
    Logout <i class='fa fa-sign-out'></i>
</a>
 
<p></p>
         </div>";
       
      //echo ("<script>location.href='$host'</script>");

      }





// remote router conect        

   if (isset($_POST['submit_rout_connect']))
     {

      $device_ip = input($_POST['submit_rout_connect']);

      $host="http://$device_ip/login.cgi?username=proxior&psd=proxior";

     //$host="http://$device_ip/login.cgi?username=admin&psd=admin";

   echo" <div class='col-lg-12' align='center'>
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

  if (isset($_POST['submit_rout_logout']))
      {

      $device_ip = input($_POST['submit_rout_logout']);

      $host="http://$device_ip/logout.cgi";


   echo" <div class='col-lg-12' align='center'>
           <font size='5'> <i class='fa fa-fax'></i> Router Logout </font> 
             <hr style='width:100%;'>
 

<a href='$host' class='btn btn-primary'style='height:80px; width:300px;padding:27px;' target='_blank'>
    Logout <i class='fa fa-sign-out'></i>
</a>

<p></p>
 
         </div>";
       
      //echo ("<script>location.href='$host'</script>");

      }




} // end of else connect


$conn->close();


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
    <script src="js/front.js"></script>
 

    <script>
           function copy(that)
           {
            var inp =document.createElement('input');
            document.body.appendChild(inp)
            inp.value =that.textContent
            inp.select();
            document.execCommand('copy',false);
            alert("Copy link: " + inp.value);
            inp.remove();
             }

       </script>


  </body>
</html>
