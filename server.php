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

input 
{
text-align: center;
}

input[type="text"]
{
height: 2em;
font-size:26px;
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

        <!-- Sidebar Navidation Menus--> <!-- <span class="heading">Main</span> -->

        <ul class="list-unstyled">
          <li><a href="desktop.php"> <i class="fa fa-desktop"></i></i> Desktop </a></li>
          <li class="active"><a href="server.php"> <i class="fa fa-server"></i> Server </a></li>
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
              <div class="col-lg-7">
                <div class="block">

      <div class="title"><strong class="d-block"> Remote Connect <i class="fa fa-plug"></i></strong>
                  <span class="d-block"> Remote connection to your server </span></div>

                  <div class="block-body">
                    <form action="" method="post">
                      <div class="form-group">
                        <label class="form-control-label"> Proxior Server IP </label>
                        <input type="text" name="prox_ip" class="form-control" placeholder="Proxior Server IP" pattern="^([0-9]{1,3}\.){3}[0-9]{1,3}$" required>
                      </div>
                      <div class="form-group">       
                        <button type="submit" name="submit_req_prox" class="btn btn-primary btn-block">
                          Request &nbsp; <i class="fa fa-paper-plane"></i>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>


       
              <!-- Clear Form-->
              <div class="col-lg-5">
                <div class="block">

     <div class="title"><strong class="d-block"> Remote Cleaning <i class="fa fa-eraser"></i> </strong>
                  <span class="d-block"> Remote clear to your server </span></div>

                  <div class="block-body">
                    <form action="" method="post">

                    <div class="form-group">
                        <label class="form-control-label"> Proxior Server IP </label>
                        <input type="text" name="prox_clear" class="form-control" placeholder="Proxior Server IP" pattern="^([0-9]{1,3}\.){3}[0-9]{1,3}$" required>
                      </div>


                    <div class="form-group">       
               <button type="submit" name="submit_req_clear" class="btn btn-primary btn-block">
                 Request &nbsp; <i class="fa fa-paper-plane"></i>
               </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
        

              
<?php

function input($data)
       {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
        return $data;
           }
           
           
  // remote proxior connection        

 if (isset($_POST['submit_req_prox']))
     {

      $device_ip = input($_POST['prox_ip']);

      $host="http://$device_ip/?clear";


    echo "<hr style='height:30px; width:100%;'>";


    echo" <div class='col-lg-12' align='center'>

<a href='$host' class='btn btn-primary'style='height:80px; width:300px;padding:27px;' target='_blank'>
    Connection <i class='fa fa-plug'></i>
</a>
 
         </div>";

      }



  // remote proxior clear       

 if (isset($_POST['submit_req_clear']))
     {

      $device_ip = input($_POST['prox_clear']);

      $host="http://$device_ip/clear.php";


    echo "<hr style='height:30px; width:100%;'>";

   echo" <div class='col-lg-12' align='center'>

<a href='$host' class='btn btn-primary'style='height:80px; width:300px;padding:27px;' target='_blank'>
    Cleaning <i class='fa fa-eraser'></i>
</a>
 
         </div>";


      }


      

?>




              <!-- Inline Form-->
              <!--
              <div class="col-lg-8">                           
                <div class="block">
                  <div class="title"><strong>Inline Form</strong></div>
                  <div class="block-body">
                    <form class="form-inline">
                      <div class="form-group">
                        <label for="inlineFormInput" class="sr-only">Name</label>
                        <input id="inlineFormInput" type="text" placeholder="Jane Doe" class="mr-sm-3 form-control">
                      </div>
                      <div class="form-group">
                        <label for="inlineFormInputGroup" class="sr-only">Username</label>
                        <input id="inlineFormInputGroup" type="text" placeholder="Username" class="mr-sm-3 form-control form-control">
                      </div>
                      <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-primary">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              -->


              <!-- Modal Form-->
              <!--
              <div class="col-lg-4">
                <div class="block">
                  <div class="title"><strong>Modal Form</strong></div>
                  <div class="block-body text-center">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Form in simple modal </button>
                   
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Signin Modal</strong>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Lorem ipsum dolor sit amet consectetur.</p>
                            <form>
                              <div class="form-group">
                                <label>Email</label>
                                <input type="email" placeholder="Email Address" class="form-control">
                              </div>
                              <div class="form-group">       
                                <label>Password</label>
                                <input type="password" placeholder="Password" class="form-control">
                              </div>
                              <div class="form-group">       
                                <input type="submit" value="Signin" class="btn btn-primary">
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
               -->


              <!-- Form Elements -->
              <!--
              <div class="col-lg-12">
                <div class="block">
                  <div class="title"><strong>All form elements</strong></div>
                  <div class="block-body">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Normal</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Help text</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control"><small class="help-block-none">A block of help text that breaks onto a new line and may extend beyond one line.</small>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Password</label>
                        <div class="col-sm-9">
                          <input type="password" name="password" class="form-control">
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Placeholder</label>
                        <div class="col-sm-9">
                          <input type="text" placeholder="placeholder" class="form-control">
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Disabled</label>
                        <div class="col-sm-9">
                          <input type="text" disabled="" placeholder="Disabled input here..." class="form-control">
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Checkboxes and radios <br><small class="text-primary">Normal Bootstrap elements</small></label>
                        <div class="col-sm-9">
                          <div>
                            <input id="option" type="checkbox" value="">
                            <label for="option">Option one is this and that—be sure to include why it's great</label>
                          </div>
                          <div>
                            <input id="optionsRadios1" type="radio" checked="" value="option1" name="optionsRadios">
                            <label for="optionsRadios1">Option one is this and that be sure to include why it's great</label>
                          </div>
                          <div>
                            <input id="optionsRadios2" type="radio" value="option2" name="optionsRadios">
                            <label for="optionsRadios2">Option two can be something else and selecting it will deselect option one</label>
                          </div>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Inline checkboxes</label>
                        <div class="col-sm-9">
                          <label class="checkbox-inline">
                            <input id="inlineCheckbox1" type="checkbox" value="option1"> a
                          </label>
                          <label class="checkbox-inline">
                            <input id="inlineCheckbox2" type="checkbox" value="option2"> b
                          </label>
                          <label class="checkbox-inline">
                            <input id="inlineCheckbox3" type="checkbox" value="option3"> c
                          </label>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Checkboxes &amp; radios <br><small class="text-primary">Custom elements</small></label>
                        <div class="col-sm-9">
                          <div class="i-checks">
                            <input id="checkboxCustom1" type="checkbox" value="" class="checkbox-template">
                            <label for="checkboxCustom1">Option one</label>
                          </div>
                          <div class="i-checks">
                            <input id="checkboxCustom2" type="checkbox" value="" checked="" class="checkbox-template">
                            <label for="checkboxCustom2">Option two checked</label>
                          </div>
                          <div class="i-checks">
                            <input id="checkboxCustom" type="checkbox" value="" disabled="" checked="" class="checkbox-template">
                            <label for="checkboxCustom">Option three checked and disabled</label>
                          </div>
                          <div class="i-checks">
                            <input id="checkboxCustom3" type="checkbox" value="" disabled="" class="checkbox-template">
                            <label for="checkboxCustom3">Option four disabled</label>
                          </div>
                          <div class="i-checks">
                            <input id="radioCustom1" type="radio" value="option1" name="a" class="radio-template">
                            <label for="radioCustom1">Option one</label>
                          </div>
                          <div class="i-checks">
                            <input id="radioCustom2" type="radio" checked="" value="option2" name="a" class="radio-template">
                            <label for="radioCustom2">Option two checked</label>
                          </div>
                          <div class="i-checks">
                            <input id="radioCustom3" type="radio" disabled="" checked="" value="option2" class="radio-template">
                            <label for="radioCustom3">Option three checked and disabled</label>
                          </div>
                          <div class="i-checks">
                            <input id="radioCustom4" type="radio" disabled="" name="a" class="radio-template">
                            <label for="radioCustom4">Option four disabled</label>
                          </div>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Select</label>
                        <div class="col-sm-9">
                          <select name="account" class="form-control mb-3 mb-3">
                            <option>option 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                          </select>
                        </div>
                        <div class="col-sm-9 ml-auto">
                          <select multiple="" class="form-control">
                            <option>option 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                          </select>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row has-success">
                        <label class="col-sm-3 form-control-label">Input with success</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control is-valid">
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row has-danger">
                        <label class="col-sm-3 form-control-label">Input with error</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control is-invalid">
                          <div class="invalid-feedback">Please provide your name.</div>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Control sizing</label>
                        <div class="col-sm-9">
                          <div class="form-group">
                            <input type="text" placeholder=".input-lg" class="form-control form-control-lg">
                          </div>
                          <div class="form-group">
                            <input type="text" placeholder="Default input" class="form-control">
                          </div>
                          <div class="form-group">
                            <input type="text" placeholder=".input-sm" class="form-control form-control-sm">
                          </div>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Column sizing</label>
                        <div class="col-sm-9">
                          <div class="row">
                            <div class="col-md-3">
                              <input type="text" placeholder=".col-md-3" class="form-control">
                            </div>
                            <div class="col-md-4">
                              <input type="text" placeholder=".col-md-4" class="form-control">
                            </div>
                            <div class="col-md-5">
                              <input type="text" placeholder=".col-md-5" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="line"> </div>
                      <div class="row">
                        <label class="col-sm-3 form-control-label">Material Inputs</label>
                        <div class="col-sm-9">
                          <div class="form-group-material">
                            <input id="register-username" type="text" name="registerUsername" required class="input-material">
                            <label for="register-username" class="label-material">Username</label>
                          </div>
                          <div class="form-group-material">
                            <input id="register-email" type="email" name="registerEmail" required class="input-material">
                            <label for="register-email" class="label-material">Email Address      </label>
                          </div>
                          <div class="form-group-material">
                            <input id="register-password" type="password" name="registerPassword" required class="input-material">
                            <label for="register-password" class="label-material">Password        </label>
                          </div>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Input groups</label>
                        <div class="col-sm-9">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                              <input type="text" placeholder="Username" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <input type="text" class="form-control">
                              <div class="input-group-append"><span class="input-group-text">.00</span></div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                              <input type="text" class="form-control">
                              <div class="input-group-append"><span class="input-group-text">.00</span></div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input type="checkbox">
                                </div>
                              </div>
                              <input type="text" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input type="checkbox" class="checkbox-template">
                                </div>
                              </div>
                              <input type="text" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input type="radio">
                                </div>
                              </div>
                              <input type="text" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input type="radio" class="radio-template">
                                </div>
                              </div>
                              <input type="text" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Button addons</label>
                        <div class="col-sm-9">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <button type="button" class="btn btn-primary">Go!</button>
                              </div>
                              <input type="text" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <input type="text" class="form-control">
                              <div class="input-group-append">
                                <button type="button" class="btn btn-primary">Go!</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">With dropdowns</label>
                        <div class="col-sm-9">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <button data-toggle="dropdown" type="button" class="btn btn-outline-secondary dropdown-toggle">Action <span class="caret"></span></button>
                              <div class="dropdown-menu"><a href="#" class="dropdown-item">Action</a><a href="#" class="dropdown-item">Another action</a><a href="#" class="dropdown-item">Something else here</a>
                                <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Separated link</a>
                              </div>
                            </div>
                            <input type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <div class="col-sm-9 ml-auto">
                          <button type="submit" class="btn btn-secondary">Cancel</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              -->


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
  </body>
</html>
