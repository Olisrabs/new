﻿<!DOCTYPE html>
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
    <title>KmEmpire - ONL_SHOPPING || Login Page</title>
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
    <link rel="stylesheet" href="assets/sweetalert2/sweetalert2.min.css">
    <script src="assets/sweetalert2/sweetalert2.min.js"></script>
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
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-10 col-lg-8"><img class="big-logo" src="img/core-img/logo-white.png" alt="">
            <!-- Register Form-->
             <div style="margin-top: 30px;">
              <h5 style="font-size: 25px;">Welcome Back.</h5>
              <h5 style="color: white;">Login or Signup to shop with us.</h5>
             </div>
            <div class="register-form mt-5">
              <form action="" method="post">
              <?php
  session_start();
	require('db_con.php');
	// If form submitted, insert values into the database.
    if (isset($_POST['email'])){

		$email = stripslashes($_REQUEST['email']); // removes backslashes
		$email = mysqli_real_escape_string($con,$email); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

	//Checking is user existing in the database or not
        $query = "SELECT * FROM user WHERE email='$email' AND password=PASSWORD('$password')";
        // $query2 = "SELECT * FROM user WHERE email='$email' AND password=PASSWORD('$password') AND `status`='Verified'";
		$result = mysqli_query($con,$query) or die(mysqli_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['email'] = $email;
			 // Redirect to the dashboard with a success message using SweetAlert
             echo '<script type="text/javascript">
             Swal.fire({
                 title: "Success!",
                 text: "Login successful. Redirecting...",
                 icon: "success",
                 timer: 4000,
                 showConfirmButton: false
             }).then(function() {
                 window.location.href = "home.php";
             });
           </script>';
 } else {
     // If login fails, show error with SweetAlert
     echo '<script type="text/javascript">
             Swal.fire({
                 title: "Error!",
                 text: "Invalid Member Login Credentials",
                 icon: "error",
                 confirmButtonText: "Try Again"
             });
           </script>';
 }
}
?>
                <div class="form-group text-start mb-4"><span>Email Address</span>
                  <label for="email"><i class="ti ti-user"></i></label>
                  <input class="form-control" name="email" type="text" placeholder="Input your Email Address">
                </div>
                <div class="form-group text-start mb-4"><span>Password</span>
                  <label for="password"><i class="ti ti-key"></i></label>
                  <input class="form-control" name="password" type="password" placeholder="Password">
                </div>
                <button class="btn btn-warning btn-lg w-100" name="login" type="submit">Log In</button>
              </form>
            </div>
            <!-- Login Meta-->
            <div class="login-meta-data"><a class="forgot-password d-block mt-3 mb-1" href="forget-password.php">Forgot Password?</a>
              <p class="mb-0">Didn't have an account?<a class="mx-1" href="register.php">Register Now</a></p>
            </div>
            <!-- View As Guest-->
            <!-- <div class="view-as-guest mt-3"><a class="btn btn-primary btn-sm" href="home.php">View as guest<i class="ps-2 ti ti-arrow-right"></i></a></div> -->
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