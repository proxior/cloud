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

     <form action="" method="post" class="text-left form-validate" style="background-color:transparent;">

                    <div class="form-group-material">
                      <input id="register-username" type="text" name="username" required data-msg="Please enter your username" class="input-material">
                      <label for="register-username" class="label-material">Username</label>
                    </div>

                    <div class="form-group-material">
                      <input id="register-email" type="email" name="email" required data-msg="Please enter a valid email address" class="input-material">
                      <label for="register-email" class="label-material">Email Address      </label>
                    </div>

                    <div class="form-group-material">

            <input id="register-password" type="password" name="password" required data-msg="Please enter your password" class="input-material">

                      <label for="register-password" class="label-material">Password        </label>
                    </div>
                    <div class="form-group terms-conditions text-center">
                      <input id="register-agree" name="agree" type="checkbox" required value="true" data-msg="Your agreement is required" class="checkbox-template">
                      <label for="register-agree">I agree with the terms and policy</label>
                    </div>
                    <div class="form-group text-center">
                      <input id="register" type="submit" name="submit" value="Register" class="btn btn-primary btn-block">
                    </div>
                  </form><small>Already have an account? </small><a href="index.php" class="signup">Login</a>
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

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

 //elenxos gia tuxon kena pedia
  if (empty($_POST['username'] || $_POST['password'] || $_POST['email']))
     {
 echo '<script type="text/javascript">alert("The fields are requireds");
         </script>';
     echo ("<script>location.href='register.php'</script>");
      }



   if (strlen($_POST['password']) <6)
       {       
       echo '<script type="text/javascript">alert("Passwords need to be 6 characters or longer");
             </script>';
       echo ("<script>location.href='register.php'</script>");
         exit;
          }


  else
    {


  $username = input($_POST['username']);
  $password = md5(input($_POST['password']));
  $email = input($_POST['email']);


$sql1="SELECT * FROM prox_login WHERE username='$username'";
$result1=$conn->query($sql1);
$sql2="SELECT * FROM prox_login WHERE email='$email'";
$result2=$conn->query($sql2);

  if($result1->num_rows>0)
     {
    echo '<script type="text/javascript">alert("This name exists. Please choose an another name");
         </script>';
     echo ("<script>location.href='register.php'</script>");
       }

    else if($result2->num_rows>0)
     {
    echo '<script type="text/javascript">alert("This email exists. Please isnert an another email");
         </script>';
     echo ("<script>location.href='register.php'</script>");
       }


   else
    {


   $rand_qr = 5;
   $qrcode  = substr(str_shuffle("0123456789"),0, $rand_qr);
             

$sql3 = "INSERT INTO prox_login (username,password,email,verification_code) VALUES ('$username','$password','$email','$qrcode')";
$result3=$conn->query($sql3);

if (($result3) === TRUE) 
      {
 
      // back up account
     $sql4="insert into prox_backup_login (username,password,email) values ('$username','$password','$email')";
     $result4=$conn->query($sql4);

 
       //insert api key  
    // $api_key_user="12DEAA2209001287AB00EDFA9902111C";
     //$length_sec_key = 32;
    // $secret_key_user= substr(str_shuffle("ABCDEF0123456789ABCDEF0123456789"),0, $length_sec_key);
   

    // $sql_api="insert into modules_details (user_login,api_key,secret_key)
    //           values ('$username','$api_key_user','$secret_key_user')";
    // $result_api=$conn->query($sql_api);
    


       // verify acount using email
 

   $_SESSION['qrcode'] = $qrcode;



    echo "<script language='javascript'>alert('Please Verify your account');
          </script>";
    echo ("<script>location.href='verify.php'</script>");

 }        
      


    else 
     {
      echo '<script type="text/javascript">alert("Something was error. Please try again");
         </script>';
     echo ("<script>location.href='register.php'</script>");
     }

   }

  
 }// kleisimo ths else gia tis eggrafes


} // kleisimo ths megalhs else

  $conn->close();
 
 
}// kleisimo tis megalhs if
 

?>
