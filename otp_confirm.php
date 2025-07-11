﻿<?php
 include('db_con.php');
 if(isset($_REQUEST['email'])){
    $sql= "SELECT * FROM user WHERE email='$_REQUEST[email]'";
    $result= mysqli_query($con, $sql);
    $row= mysqli_fetch_array($result);

    $email= $row['email'];
    $otp_code= $row['otp_code'];
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
    <title>KmEmpire - ONL_SHOPPING || Otp Confirmation Page</title>
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
          <div class="col-10 col-lg-8">
            <div class="text-start rtl-text-right">
              <h5 class="mb-1 text-white">Verify Email Address</h5>
              <p class="mb-4 text-white">Enter the OTP code sent to<span class="mx-1"><?php echo $email ?></span></p>
            </div>
            <!-- OTP Verify Form-->
            <div class="otp-verify-form mt-5">
              <form action="" method="post">
                        <?php
                            include('db_con.php');
                            error_reporting(E_ALL);
                            if(isset($_REQUEST['submit'])){
                            $num1=trim(addslashes($_REQUEST['num1']));
                            $num2=trim(addslashes($_REQUEST['num2']));
                            $num3=trim(addslashes($_REQUEST['num3']));
                            $num4=trim(addslashes($_REQUEST['num4']));
                            $otp_code=trim(addslashes($_REQUEST['otp_code']));
                            $confirmotp= $num1.$num2.$num3.$num4;

                            if($otp_code != $confirmotp){
                                echo "<script>alert ('Otp code is incorrect.')</script>";
                            }
                            else{      
                              $sql="UPDATE user SET `status`='Verified' WHERE email='$_REQUEST[email]'";

                            $result=mysqli_query($con, $sql);
                            if($result){  
                            echo "<script>alert ('Your verification is completed.')
                            location.href='login.php'
                            </script>";
                            }}}
                      ?>
                    <div class="mb-4 d-flex rtl-flex-d-row-r">
                  <input class="form-control ps-0" name="otp_code" type="hidden" value="<?php echo $otp_code ?>">
                </div>
                <div class="d-flex justify-content-between mb-5 rtl-flex-d-row-r">
                  <input class="single-otp-input form-control" type="text" value="" name="num1" maxlength="1">
                  <input class="single-otp-input form-control" type="text" value="" name="num2" maxlength="1">
                  <input class="single-otp-input form-control" type="text" value="" name="num3" maxlength="1">
                  <input class="single-otp-input form-control" type="text" value="" name="num4" maxlength="1">
                </div>
                <button class="btn btn-warning btn-lg w-100" type="submit" name="submit">Verify &amp; Proceed</button>
              </form>
            </div>
            <!-- Term & Privacy Info-->
            <div class="login-meta-data">
              <p class="mt-3 mb-0">Don't received the OTP?<span class="otp-sec mx-1 text-white" id="resendOTP"></span></p>
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
    <script src="js/otp-timer.js"></script>
    <script src="js/active.js"></script>
    <script src="js/pwa.js"></script>
  </body>
</html>