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
    <title>KmEmpire - ONL_SHOPPING || Register Page</title>
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
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-10 col-lg-8"><img class="big-logo" src="img/core-img/logo-white.png" alt="">
            <!-- Register Form-->
            <div class="register-form mt-5">
              <form action="" method="post" enctype="multipart/form-data">
                <?php
                include('db_con.php');
                $rand=rand(1000000, 9999999);
                $ID="KMEP/".$rand; 
                error_reporting(E_ALL);
                if(isset($_REQUEST['register'])){
                $user_id=trim(addslashes($_REQUEST["user_id"]));
                $fullname=trim(addslashes($_REQUEST["fullname"]));
                $username=trim(addslashes($_REQUEST["username"]));
                $mob_num=trim(addslashes($_REQUEST["mob_num"]));
                $emailreg=trim(addslashes($_REQUEST["email"])); 
                $passwordreg=trim(addslashes($_REQUEST["password"]));
                $address=trim(addslashes($_REQUEST["address"]));

                $passport=$rand.$_FILES["passport"]['name'];
                $target="passport/";
                $target=$target.$rand.$_FILES["passport"]['name'];

                // CHECKING FOR DUPLICATE RECORD
               $check=mysqli_query($con, "SELECT * FROM user WHERE email='$emailreg' OR mob_num='$mob_num' OR `password`='$passwordreg' OR user_id='$user_id'");
               $checkrows=mysqli_num_rows($check);
               if($checkrows>0){
               echo"<script> alert('Account already exist')</script>";
               }
               else{
                if(move_uploaded_file($_FILES["passport"]['tmp_name'], $target)>0){
                  
                $sql="INSERT INTO user(user_id, username, fullname, mob_num, email, `password`, `address`, otp_code, passport, `status`) VALUES ('$ID','$username','$fullname','$mob_num','$emailreg',PASSWORD('$passwordreg'),'$address','','$passport','Pending')";

               mysqli_query($con,$sql) or die (mysqli_error($con));
               $num=mysqli_insert_id($con);
               if(mysqli_affected_rows($con)!=1){
               $messagereg="Error inserting record into database";
               }
                echo "<script>alert ('Dear $fullname, Your have successfully completed your registration on our website. Please proceed to verify and login.')
                location.href='login.php'</script>";
                }}}
            ?>
                <div class="form-group text-start mb-4" hidden><span>User ID</span>
                  <label for="user_id"><i class="ti ti-user"></i></label>
                  <input class="form-control" name="user_id" type="text" value="<?php echo $ID ?>">
                </div>
                <div class="form-group text-start mb-4"><span>Fullname</span>
                  <label for="fullname"><i class="ti ti-user"></i></label>
                  <input class="form-control" name="fullname" type="text" placeholder="Input your fullname" required>
                </div>
                <div class="form-group text-start mb-4"><span>Username</span>
                  <label for="username"><i class="ti ti-user"></i></label>
                  <input class="form-control" name="username" type="text" placeholder="Input your desired username" required>
                </div>
                <div class="form-group text-start mb-4"><span>Mobile Number</span>
                  <label for="mob_num"><i class="ti ti-phone"></i></label>
                  <input class="form-control" name="mob_num" type="number" placeholder="Input your mobile number" required>
                </div>
                <div class="form-group text-start mb-4"><span>Email</span>
                  <label for="email"><i class="ti ti-at"></i></label>
                  <input class="form-control" name="email" type="email" placeholder="Input your email address" required>
                </div>
                <div class="form-group text-start mb-4"><span>Password</span>
                  <label for="password"><i class="ti ti-key"></i></label>
                  <input class="input-psswd form-control" name="password" type="password" placeholder="Input your desired password" required>
                </div>
                <div class="form-group text-start mb-4"><span>Home Address</span>
                  <label for="homeaddress"><i class="ti ti-loaction-pin"></i></label>
                  <input class="input-psswd form-control" name="address" type="text" placeholder="Input your home address" required>
                </div>
                <div class="form-group text-start mb-4"><span>Passport</span>
                  <label for="passport"><i class="ti ti-camera"></i></label>
                  <input class="input-psswd form-control" name="passport" type="file" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.PNG" required>
                </div>
                <button class="btn btn-warning btn-lg w-100" type="submit" name="register">Sign Up</button>
              </form>
            </div>
            <!-- Login Meta-->
            <div class="login-meta-data">
              <p class="mt-3 mb-0">Already have an account?<a class="mx-1" href="login.php">Sign In</a></p>
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