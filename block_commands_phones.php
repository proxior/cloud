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


require('__ROOT__/class_cn.php');
require('access_level.php');

define("PROXIOR_PAGE_LEVEL", "2");

?>



<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> Proxior </title>

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
  display: inline-block;;
  height: 200px;
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
              <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary"> Prxorior </strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">Proxior</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>


          <div class="right-menu list-inline no-margin-bottom">    
    

<!-- GTranslate: https://gtranslate.io/ -->
<a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="gflag nturl" style="background-position:-0px -0px;"><img src="//gtranslate.net/flags/blank.png" height="24" width="24" alt="English" /></a> 
<a href="#" onclick="doGTranslate('en|el');return false;" title="Greek" class="gflag nturl" style="background-position:-400px -100px;"><img src="//gtranslate.net/flags/blank.png" height="24" width="24" alt="Greek" /></a>
<a href="#" onclick="doGTranslate('en|fr');return false;" title="French" class="gflag nturl" style="background-position:-200px -100px;"><img src="//gtranslate.net/flags/blank.png" height="24" width="24" alt="French" /></a>
<a href="#" onclick="doGTranslate('en|de');return false;" title="German" class="gflag nturl" style="background-position:-300px -100px;"><img src="//gtranslate.net/flags/blank.png" height="24" width="24" alt="German" /></a>
<a href="#" onclick="doGTranslate('en|it');return false;" title="Italian" class="gflag nturl" style="background-position:-600px -100px;"><img src="//gtranslate.net/flags/blank.png" height="24" width="24" alt="Italian" /></a>
<a href="#" onclick="doGTranslate('en|es');return false;" title="Spanish" class="gflag nturl" style="background-position:-600px -200px;"><img src="//gtranslate.net/flags/blank.png" height="24" width="24" alt="Spanish" /></a>
<a href="#" onclick="doGTranslate('en|pt');return false;" title="Portuguese" class="gflag nturl" style="background-position:-300px -200px;"><img src="//gtranslate.net/flags/blank.png" height="24" width="24" alt="Portuguese" /></a>
<a href="#" onclick="doGTranslate('en|ru');return false;" title="Russian" class="gflag nturl" style="background-position:-500px -200px;"><img src="//gtranslate.net/flags/blank.png" height="24" width="24" alt="Russian" /></a>


<style>
a.gflag {vertical-align:middle;font-size:16px;padding:0px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/24.png);}
a.gflag img {border:0;}
a.gflag:hover {background-image:url(//gtranslate.net/flags/24a.png);}
#goog-gt-tt {display:none !important;}
.goog-te-banner-frame {display:none !important;}
.goog-te-menu-value:hover {text-decoration:none !important;}
body {top:0 !important;}
#google_translate_element2 {display:none!important;}
</style>


<div id="google_translate_element2"></div>
<script type="text/javascript">
function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


<script type="text/javascript">
/* <![CDATA[ */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
/* ]]> */
</script>


    &nbsp; &nbsp;


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



     
         <?php

       if (PROXIOR_PAGE_LEVEL > $access_level_num)
           {
          
           require('browser_user.php');
           require('os_user.php');

            $ses_log_err = $_SESSION['login'];
            $ses_mail_err = $_SESSION['mail'];
            $ses_fing_err =  $_SESSION['fingerprint'];
            $acc_lev_err = $access_level;
            $deny_lev_err = 'Level ' .PROXIOR_PAGE_LEVEL;
            $ip_addr = $_SERVER['REMOTE_ADDR'];
            $os_err = $os; 
            $browser_err = $yourbrowser;

            $conn = new mysqli($host,$user,$pass,$db);

          $sql_err = "insert into prox_deny_level (user,email,access_level,error_level,
                                                   ip_addr,os,browser,fingerprint)
                      values('$ses_log_err','$ses_mail_err','$acc_lev_err','$deny_lev_err',
                             '$ip_addr','$os_err','$browser_err','$ses_fing_err')";


         $sql_sus = "update prox_login set verification_code = 'errno', verify = 'suspended' 
              where username='$ses_log_err' and email='$ses_mail_err'";


        $result_err = $conn->query($sql_err);
        $result_sus = $conn->query($sql_sus);


        $conn->close();

       echo" <div class='col-lg-12' align='center' style='height:auto; width=100%; background-color:black;'>
                        <br>

                         <br>
                   
                     <font color='white'>
                      <h2>  
                    Your Level is <font color='yellow'> Level $access_level_num </font> 
                    </h2> 
                     <h2>  Access to this service is denied at this level </h2> 
                       <i class='fa fa-universal-access fa-5x'></i> 
                       </font> <br><br>

                         <font color='white'>
                           <h2> This level only can be accessed at: </h2> 
                           <h3> 1) Educational institutions </h3>
                           <h3> 2) Government services (eg law enforcement services) </h3>

                                 <br>                     

                      <font color='red'> <h2> Caution </h2> </font>  
                      <font color='red'> <h2> <i class='fa fa-exclamation-triangle fa-5x'></i> </h2> </font>

                          <font color='red'>
                            <h2> Your account has been suspended for security reasons. </h2>
                          </font>

                       <font color='red'>
                        <h2>
                 Do not try to enter this level again because there is a serious risk of criminal penalties. 
                        </h2>    
                          </font>

                      </font>                      
                        <br>
                    </div>";

                    session_unset();
                    session_destroy();
                      exit;

                       }

             ?> 




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

        <?php 
            
 
            // Access for level 1
           if ($access_level == 'Level 1' )            
               {

          echo'
            <span class="heading"> 
              <font color="#babcaa"> Access Level: </font>
              <font color="yellow"> '.$access_level.' </font>
           </span> 
        <ul class="list-unstyled">
          <li><a href="desktop.php"> <i class="fa fa-desktop"></i></i> Desktop </a></li>
          <li><a href="server.php"> <i class="fa fa-server"></i> Server </a></li>
          <li><a href="clone.php"> <i class="fa fa-clone"></i> Cloning </a></li>
          <li><a href="ui_panel.php"> <i class="fa fa-window-restore"></i> UI Panel </a></li>
        </ul>

       <!-- <span class="heading">Extras</span> -->
        <ul class="list-unstyled">
          <li> <a href="settings.php"> <i class="icon-settings"></i> Settings </a></li>
        </ul>
      </nav> ';

         } // end access level 1





        // Access for level 2
        if ($access_level == 'Level 2' )            
               {

          echo'
            <span class="heading"> 
              <font color="#babcaa"> Access Level: </font>
              <font color="orange"> '.$access_level.' </font>
           </span> 
        <ul class="list-unstyled">
          <li><a href="desktop.php"> <i class="fa fa-desktop"></i></i> Desktop </a></li>
          <li><a href="server.php"> <i class="fa fa-server"></i> Server </a></li>
          <li><a href="clone.php"> <i class="fa fa-clone"></i> Cloning </a></li>
          <li><a href="ui_panel.php"> <i class="fa fa-window-restore"></i> UI Panel </a></li>
          <li class="active"><a href="commands.php"> <i class="fa fa-terminal"></i> Commands </a></li>
        </ul>

       <!-- <span class="heading">Extras</span> -->
        <ul class="list-unstyled">
          <li> <a href="settings.php"> <i class="icon-settings"></i> Settings </a></li>
        </ul>
      </nav> ';

         } // end access level 2





        // Access for level 3
        if ($access_level == 'Level 3' )            
            {

          echo'
            <span class="heading"> 
              <font color="#babcaa"> Access Level: </font>
              <font color="green"> '.$access_level.' </font>
           </span> 
        <ul class="list-unstyled">
          <li><a href="desktop.php"> <i class="fa fa-desktop"></i></i> Desktop </a></li>
          <li><a href="server.php"> <i class="fa fa-server"></i> Server </a></li>
          <li><a href="clone.php"> <i class="fa fa-clone"></i> Cloning </a></li>
          <li><a href="ui_panel.php"> <i class="fa fa-window-restore"></i> UI Panel </a></li>
          <li class="active"><a href="commands.php"> <i class="fa fa-terminal"></i> Commands </a></li>

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


          </li>

        </ul>

       <!-- <span class="heading">Extras</span> -->
        <ul class="list-unstyled">
          <li> <a href="settings.php"> <i class="icon-settings"></i> Settings </a></li>
        </ul>
      </nav> ';

         } // end access level 3


         ?>
 
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
                         <br>

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


             <div class='col-lg-12'>
               <div class='block'>
                <div class='title'>
                  <strong> Block Commands from phone devices &nbsp; <i class='fa fa-terminal'></i> </strong>
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
    <script src="js/front.js"></script>
  </body>
</html>
