<?php
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
    <title>KmEmpire - ONL_SHOPPING || Otp Page</title>
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
              <h5 class="mb-1 text-white">Email Verification</h5>
              <p class="mb-4 text-white">We will send you an OTP code on this email address.</p>
            </div>
            <!-- OTP Send Form-->
            <div class="otp-form mt-5">
              <form action="" method="post">
              <?php
                include('db_con.php');  
                $rand=rand(1000, 9999);
                $ID=$rand; 
                error_reporting(E_ALL);
                if(isset($_REQUEST['submit'])){
                $otp_code=trim(addslashes($_REQUEST["otp_code"]));
                $emailreg=trim(addslashes($_REQUEST["email"])); 

                $check=mysqli_query($con, "SELECT * FROM user WHERE email='$emailreg'");
                $checkrows=mysqli_num_rows($check);
                if($checkrows!=1){
                echo"<script> alert('No user is registered with this email address')</script>";
                }
                else{
                $sql="UPDATE user SET otp_code='$otp_code' WHERE email='$_REQUEST[email]'";

               mysqli_query($con,$sql) or die (mysqli_error($con));
               $num=mysqli_insert_id($con);
               if(mysqli_affected_rows($con)!=1){
               $messagereg="Error inserting record into database";
               }
                echo "<script>alert ('OTP has been successfully sent.')
                location.href='otp_confirm.php?email=$emailreg'
                </script>";
                }}
            ?>
                <div class="mb-4 d-flex rtl-flex-d-row-r">
                  <input class="form-control ps-0" name="otp_code" type="hidden" value="<?php echo $ID ?>">
                </div>
                <div class="mb-4 d-flex rtl-flex-d-row-r">
                  <input class="form-control ps-0" name="email" type="text" placeholder="Enter email address">
                </div>
                <button class="btn btn-warning btn-lg w-100" type="submit" name="submit">Send OTP</button>
              </form>
            </div>
            <!-- Term & Privacy Info-->
            <div class="login-meta-data">
              <p class="mt-3 mb-0">By providing my phone number, I hereby agree the<a class="mx-1" href="#">Term of Services</a>and<a class="mx-1" href="#">Privacy Policy.</a></p>
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