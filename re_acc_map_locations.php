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
require('access_level.php'); 

// Government services (eg law enforcement services)
define("PROXIOR_PAGE_LEVEL", "3");


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
                           <h3> 1) Government services (eg law enforcement services) </h3>
                           <h3> 2) Armed Forces (Military Corps) </h3>  

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
            

            // class for access level
            require('access_level.php');
 
 
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
          <li><a href="commands.php"> <i class="fa fa-terminal"></i> Commands </a></li>
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
              <font color="brown"> '.$access_level.' </font>
           </span> 
        <ul class="list-unstyled">
          <li><a href="desktop.php"> <i class="fa fa-desktop"></i></i> Desktop </a></li>
          <li><a href="server.php"> <i class="fa fa-server"></i> Server </a></li>
          <li><a href="clone.php"> <i class="fa fa-clone"></i> Cloning </a></li>
          <li><a href="ui_panel.php"> <i class="fa fa-window-restore"></i> UI Panel </a></li>
          <li><a href="commands.php"> <i class="fa fa-terminal"></i> Commands </a></li>

          <li>

            <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> 
              <i class="fa fa-connectdevelop"></i> Remote Access 
            </a>

              <ul id="exampledropdownDropdown" class="collapse list-unstyled">

               <li class="active"> 
                <a href="re_acc_map_locations.php"> <i class="fa fa-map-marker"></i> Device Locations </a>
              </li>

              <li> 
                <a href="re_acc_map_radius.php"> <i class="fa fa-map-pin"></i> Device Radius </a>
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



           // Access for level 4
        if ($access_level == 'Level 4' )            
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
          <li><a href="commands.php"> <i class="fa fa-terminal"></i> Commands </a></li>

          <li>

            <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> 
              <i class="fa fa-connectdevelop"></i> Remote Access 
            </a>

              <ul id="exampledropdownDropdown" class="collapse list-unstyled">

               <li class="active"> 
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

         } // end access level 4


        ?>
 
      <!-- Sidebar Navigation end-->





     
      <div class="page-content">
       <!-- Page Header-->
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom"> Device Locations </h2>

          </div>
        </div>

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

$ses_login = $_SESSION['login'];


$sql_locations = "SELECT GROUP_CONCAT(CONCAT(all_info))
                   AS 'combined_all_info'
                   FROM prox_devices where user = '$ses_login'"; 


$result_locations = $conn->query($sql_locations); 

//$result->error;


echo'<div id="map"></div>';
        

while ($row_locations = $result_locations->fetch_array(MYSQLI_NUM))
           {

         $all_info = $row_locations[0];

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


//echo $all_info;



echo"
<script>
     
function initMap() {


  var map = new google.maps.Map(document.getElementById('map'), {
    mapTypeId: 'hybrid',
    zoom: 3,
    center: {
      lat: 32.000,
      lng: 32.000,
    }
  });

  var infoWin = new google.maps.InfoWindow();

  var markers = locations.map(function(location, i) {
    var marker = new google.maps.Marker({
      position: location
    });
    google.maps.event.addListener(marker, 'click', function(evt) {
      infoWin.setContent(location.info);
      infoWin.open(map, marker);
    })
    return marker;
  });

  // markerCluster.setMarkers(markers);
  // Add a marker clusterer to manage the markers.
  var markerCluster = new MarkerClusterer(map, markers, {
    imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
  });

}


var locations = [{$all_info},];


google.maps.event.addDomListener(window, 'load', initMap);

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
