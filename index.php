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


  </head>
  <body>


    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center" style="background-color:transparent;">
                <div class="content">
                  <div class="logo">    
                  </div>

                  <div class="avatar">
                   <img src="img/logo.png" height="400" width="400">
                 </div>
     
                </div>
              </div>
            </div>

            <!-- Form Panel    -->
            <div class="col-lg-6">
              <div class="form d-flex align-items-center" style="background-color:transparent;">
                <div class="content">

                  <h1> Proxior </h1>
                  <p> Lan and Wifi Interception </p>

                  <form action="" method="post" class="form-validate mb-4">
                    <div class="form-group">
                      <input id="login-username" type="text" name="username" required data-msg="Please enter your username" class="input-material">
                      <label for="login-username" class="label-material">User Name</label>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                      <label for="login-password" class="label-material">Password</label>
                    </div>

         <button type="submit" name="submit" class="btn btn-primary btn-block"> Login </button>

                  </form>

<a href="#" class="forgot-pass">Forgot Password?</a><br><small>Do not have an account? </small><a href="register.php" class="signup">Signup</a>

                </div>
              </div>
            </div>
          </div>
        </div>
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





<?php

if (isset($_POST['submit']))
   {

require('__ROOT__/class_cn.php');
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
 
   if(empty($_POST['username'] || $_POST['password']))
     {
     echo '<script type="text/javascript">alert("This fields are requireds");
         </script>';
     echo ("<script>location.href='index.php'</script>");
      }

else
{



$username=input($_POST['username']);
$password=md5(input($_POST['password']));

$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password); 


  $sql ="select username,password,email,verify from prox_login 
         where binary username='$username' and password='$password'  
         and verification_code='ok' and verify='yes'";
  $result=$conn->query($sql);
  $rows = $result->num_rows;



   if ($rows == 1) 
    {

    //$sql2="update profile set is_inside='yes' where username='$username'";
    //$result2=$conn->query($sql2);

       $ip_addr = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];

    $sql3="insert log_file (username,ip_addr,path,connect) values('$username','$ip_addr','$path',NOW())";
    $result3=$conn->query($sql3);    

    

     $finger = substr(str_shuffle(str_repeat("0123456789ABCDEF", 32)), 0, 32);
    
/*

    $length = 30;
   $cookie_id= substr(str_shuffle
   ("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+|-=[]{};./:?>< "),0, $length);
   
     $cookie_name="user_prox";

     setcookie($name,$cookie_id,time() + (3600),"/",false,true);


     require ('browser_user.php');

     $sql4="insert into users_activities (username,ip_addr,browser,log_in_time,fingerprint,cookies)
           values('$username','$ip_addr','$yourbrowser',NOW(),'$finger','$cookie_id')";
     $result4=$conn->query($sql4);

*/

   
     //all sessions
    $_SESSION['fingerprint']=$finger;

   // $_SESSION['timestamp'] = time();

    //$_SESSION['expire'] = $_SESSION['timestamp'] + (3600);


   $_SESSION['login']=$username;



  while ($row=$result->fetch_assoc())
         {
          $_SESSION['mail'] = $row['email'];
          }


      $rand = 64;
      $redirect= substr(str_shuffle
   ("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+|-=[]{};./:?>< "),0, $rand);   
 
     echo ("<script>location.href='desktop.php'</script>");
 
    } // end id




  // log file for login error atempts
  else 
   { 

       require ('browser_user.php');
       $ip_addr2 = $_SERVER['REMOTE_ADDR'];


    $sql5="insert prox_login_error_attempts (ip_addr,browser,username,password) 
           values('$ip_addr2','$yourbrowser','$username','$password')";
    $result5=$conn->query($sql5);   
   echo ("<script>location.href='index.php'</script>");

   } 



  }//kleisimo ths else gia ton elenxo

 }// kleisimo ths else gia ta dedomena

 $conn->close(); 

}// kleisimo ths megalhs if


?>
