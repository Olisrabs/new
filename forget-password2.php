﻿<?php
 include('db_con.php');
 if(isset($_REQUEST['email'])){
    $sql= "SELECT * FROM user WHERE email='$_REQUEST[email]'";
    $result= mysqli_query($con, $sql);
    $row= mysqli_fetch_array($result);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Suha - Multipurpose Ecommerce Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#625AFA">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags -->
    <!-- Title -->
    <title>KmEmpire - ONL_SHOPPING || Reset Password Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="../css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="img/icons/icon-72x72.png">
    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/tabler-icons.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <!-- Web App Manifest -->
    <link rel="manifest" href="manifest.json">
  </head>
  <body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
      <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only"></div>
      </div>
    </div>
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">               
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-10 col-lg-8"><img class="big-logo" src="img/core-img/logo-white.png" alt="">
            <!-- Register Form-->
            <div class="register-form mt-5">
              <form action="" method="post">
              <?php
                            include('db_con.php');
                            error_reporting(E_ALL);
                            if(isset($_REQUEST['submit'])){
                            $newpw=trim(addslashes($_REQUEST['newpw']));
                            $retypepw=trim(addslashes($_REQUEST['retypepw']));
                            
                            if($newpw != $retypepw){
                                echo "<script>alert ('Password typed does not match.')</script>";
                            }
                            else{
                            $sql2="UPDATE user SET password=PASSWORD('$retypepw') WHERE email='$_REQUEST[email]'";
                                                            
                            $result=mysqli_query($conn, $sql2);
                            if($result){
                            echo "<script>alert ('Your password has been successfully resetted.')
                            location.href='forget-password-success.php'
                            </script>";
                            }}}
                        ?>
                <div class="form-group text-start mb-4"><span>New password</span>
                  <label for="password"><i class="ti ti-password"></i></label>
                  <input class="form-control" name="newpw" type="text" placeholder="Input Your Desired Password">
                </div>
                <div class="form-group text-start mb-4"><span>Confirmed password</span>
                  <label for="password"><i class="ti ti-password"></i></label>
                  <input class="form-control" name="retypepw" type="text" placeholder="Re-Input Your Desired Password">
                </div>
                <button class="btn btn-warning btn-lg w-100" name="submit" type="submit">Reset Password</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.passwordstrength.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/theme-switching.js"></script>
    <script src="js/active.js"></script>
    <script src="js/pwa.js"></script>
  </body>
</html>