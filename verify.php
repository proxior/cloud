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

if (!isset($_SESSION['qrcode']))
    {
    header('Location:index.php');
    }

?>


<html>


<head>

<meta charset="UTF-8">

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

<link rel="shortcut icon" href="img/logo.png">    





<style>

html, body {margin: 0; height: 100%; overflow: hidden}


#qr
{
border: 0;
outline: 0;
background: transparent;
border-bottom: 1px solid white;
height:20px;
width:70px;
text-align:center;
}


.inputs
{
color:white;
    font-weight: bold;
}

::-webkit-input-placeholder {
    color: white;
    font-weight: bold;
}
::-moz-placeholder {
    color: white;
    font-weight: bold;
}
::-ms-input-placeholder {
    color: white;
    font-weight: bold;
} 
:-o-input-placeholder {
    color: white;
    font-weight: bold;
} 

</style>


<script language="JavaScript">
 history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>



<script src="qrcode/easy.qrcode.js" type="text/javascript" charset="utf-8"></script>


<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <Script>
        $(document).ready(function(){
            $(".inputs").keyup(function () {
                $this=$(this);
                if ($this.val().length >=$this.data("maxlength")) {
                  if($this.val().length>$this.data("maxlength")){
                    $this.val($this.val().substring(0,1));
                  }
                  $this.next(".inputs").focus();
                }
             });
        });
    </Script>

</script>



</head>

<body>



    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">

            <!-- Logo & Information Panel-->
            <div class="col-lg-6">

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
                    <p> Verify Account </p>
                    
                    <div id="qrcode"></div> 

                  <script type="text/javascript">
			function showQr() {
				new QRCode(document.getElementById("qrcode"), {
					text: "<?php echo $_SESSION['qrcode']; ?>",
					width: 250, 
					height: 200, 
					colorDark: "#000000", 
					colorLight: "#ffffff", 
					correctLevel: QRCode.CorrectLevel.H 
				});
			}
			
		
			showQr();
		</script>

     <form action="" method="post" class="text-left form-validate" style="background-color:transparent;">

                   <div class="form-group-material">

  <input type="text" name="qr1" class="inputs" id="qr" pattern="[0-9]{1}" data-maxlength="1" required autofocus >   
  <input type="text" name="qr2" class="inputs" id="qr" pattern="[0-9]{1}" data-maxlength="1" required> 

  <input type="text" name="qr3" class="inputs" id="qr" pattern="[0-9]{1}" data-maxlength="1" required> 
  <input type="text" name="qr4" class="inputs" id="qr" pattern="[0-9]{1}" data-maxlength="1" required> 
  <input type="text" name="qr5" class="inputs" id="qr" pattern="[0-9]{1}" data-maxlength="1" required>

                </div>

        <div class="form-group text-center">
         <input type="submit" name="submit" value="Verify" class="btn btn-primary btn-block">
         </div>
        
           </form>

                
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
  
  $obj_con =  new security;

  $host = $obj_con->connect[0];
  $user = $obj_con->connect[1];
  $pass = $obj_con->connect[2];
  $db   = $obj_con->connect[3]; 
    $conn = new mysqli($host,$user,$pass,$db);
      if($conn->connect_error)
         {
          die ("Cannto connect to server " .$conn->connect_error);
           }
 
    else
     { 
     $qrv1 = $_POST['qr1'];
     $qrv2 = $_POST['qr2'];
     $qrv3 = $_POST['qr3'];
     $qrv4 = $_POST['qr4'];
     $qrv5 = $_POST['qr5'];
    
     $qrcode_v = $qrv1.$qrv2.$qrv3.$qrv4.$qrv5;
      
    $sql = "select verification_code from prox_login where verification_code='".$_SESSION['qrcode']."'";
         $result = $conn->query($sql);
 
         while ($row = $result->fetch_assoc())
               {
              
                
            if ($row['verification_code'] == $qrcode_v)
                  {
                 $sql2 = "update prox_login set verify='yes' ,verification_code='ok' 
                          where verification_code='$qrcode_v'";
                 $result2 = $conn->query($sql2);
                   session_destroy();             
 
           echo '<script type="text/javascript">alert("Your registration has been completed successfully Welcome to Proxior");
           </script>';
           echo ("<script>location.href='/cloud'</script>");
 
                   } // end for verication code is same
               else if ($row['verification_code'] != $qrcode_v)
                  {
                echo '<script type="text/javascript">alert("Your registration failed: Re-type the verification code");
                 </script>';
                echo ("<script>location.href='verify.php'</script>");
                   } 
                 } // end fo while
      } // end of else connect
   } // end of isset
 
?>
