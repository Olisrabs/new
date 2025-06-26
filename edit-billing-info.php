<?php
include('session.php'); 
include('db_con.php');
$id = 1;
$sql="SELECT * FROM user WHERE id='$id'";
$result=mysqli_query($con,$sql)or die(mysqli_error($con));
$rows=mysqli_fetch_array($result);
?>

<?php
 include('db_con.php');
 if(isset($_REQUEST['user_id'])){
    $sql= "SELECT * FROM user WHERE user_id='$_REQUEST[user_id]'";
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
    <title>KmEmpire - ONL_SHOPPING || Edit Profile Page</title>
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
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between rtl-flex-d-row-r">
        <!-- Back Button-->
        <div class="back-button me-2 me-2"><a href="profile.php"><i class="ti ti-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Edit Profile</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas">
          <div><span></span><span></span><span></span></div>
        </div>
      </div>
    </div>
    <?php include('sidebar.php')?>
    <div class="page-content-wrapper">
      <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
          <!-- User Information-->
          <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
             
                <div class="change-user-thumb">  
                   
                </div>
              </div>
              <div class="user-info">
                <p class="mb-0 text-white"><?php echo $session_username;?></p>
                <h5 class="mb-0 text-white"><?php echo $session_fullname;?></h5>
              </div>
            </div>
          </div>
          <!-- User Meta Data-->
          <div class="card user-data-card">
            <div class="card-body">
            <form method="post">
                <?php
                include('db_con.php');
                $rand=rand(1000000, 9999999);
                error_reporting(E_ALL);
                if(isset($_REQUEST['submit'])){
                $fullname=trim(addslashes($_REQUEST["fullname"]));
                $mob_num=trim(addslashes($_REQUEST["mob_num"]));
                $emailreg=trim(addslashes($_REQUEST["email"])); 
                $address=trim(addslashes($_REQUEST["address"]));
              
                $sql="UPDATE user SET fullname='$fullname', mob_num='$mob_num', email='$emailreg', `address`='$address' WHERE user_id='$_REQUEST[user_id]'";
                                                            
                $result=mysqli_query($con, $sql);
                if($result){
                echo "<script>alert ('Record has been successfully updated.')
                location.href='checkout.php?user_id=$session_user_id'
                </script>";
                }
                }
              ?>
                <div class="mb-3">
                  <div class="title mb-2"><i class="ti ti-user"></i><span>Full Name</span></div>
                  <input class="form-control" type="text" name="fullname" value="<?php echo $session_fullname;?>">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="ti ti-phone"></i><span>Phone Number</span></div>
                  <input class="form-control" type="text" name="mob_num" value="<?php echo $session_mob_num;?>">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="ti ti-mail"></i><span>Email Address</span></div>
                  <input class="form-control" type="email" name="email" value="<?php echo $session_email;?>">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="ti ti-location"></i><span>Shipping Address</span></div>
                  <input class="form-control" type="text" name="address" value="<?php echo $session_address;?>">
                </div>
                <button class="btn btn-primary btn-lg w-100" type="submit" name="submit">Save All Changes</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <?php include('footer_bar.php')?>
    <!-- All JavaScript Files-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.passwordstrength.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/theme-switching.js"></script>
    <script src="js/no-internet.js"></script>
    <script src="js/active.js"></script>
    <script src="js/pwa.js"></script>
  </body>
</html>