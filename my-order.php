﻿<?php
include('session.php'); 
include('db_con.php');
$id = 1;
$sql="SELECT * FROM user WHERE id='$id'";
$result=mysqli_query($con,$sql)or die(mysqli_error($con));
$rows=mysqli_fetch_array($result);
?>

<?php
include('db_con.php');
if(isset($_REQUEST['order_id'])){
    $sql= "SELECT * FROM bill_details WHERE order_id='$_REQUEST[order_id]'";
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
    <title>Suha - Multipurpose Ecommerce Mobile HTML Template</title>
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
        <div class="back-button me-2"><a href="dashboard.php?user_id=<?php echo $session_user_id;?>"><i class="ti ti-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Order Status</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas">
          <div><span></span><span></span><span></span></div>
        </div>
      </div>
    </div>
    
    <div class="my-order-wrapper" style="background-image: url('img/bg-img/21.jpg')">
      <div class="container">
        <div class="card">
          <div class="card-body p-4">
            <!-- Single Order Status-->
            <div class="single-order-status active">
              <div class="order-icon"><i class="ti ti-basket"></i></div>
              <div class="order-text">
                <h6>Order placed</h6><span>2 Feb 2024 - 12:38 PM</span>
              </div>
              <div class="order-status"><i class="ti ti-circle-check"></i></div>
            </div>
            <!-- Single Order Status-->
            <div class="single-order-status active">
              <div class="order-icon"><i class="ti ti-box"></i></div>
              <div class="order-text">
                <h6>Product packaging</h6><span>3 Feb 2024</span>
              </div>
              <div class="order-status"><i class="ti ti-circle-check"></i></div>
            </div>
            <!-- Single Order Status-->
            <div class="single-order-status active">
              <div class="order-icon"><i class="ti ti-trolley"></i></div>
              <div class="order-text">
                <h6>Ready for shipment</h6><span>3 Feb 2024</span>
              </div>
              <div class="order-status"><i class="ti ti-circle-check"></i></div>
            </div>
            <!-- Single Order Status-->
            <div class="single-order-status">
              <div class="order-icon"><i class="ti ti-truck-delivery"></i></div>
              <div class="order-text">
                <h6>On the way</h6><span>Estimate: 4 Feb 2024</span>
              </div>
              <div class="order-status"><i class="ti ti-circle-check"></i></div>
            </div>
            <!-- Single Order Status-->
            <div class="single-order-status">
              <div class="order-icon"><i class="ti ti-building-store"></i></div>
              <div class="order-text">
                <h6>Dropped in the delivery station</h6><span>Estimate: 6 Feb 2024</span>
              </div>
              <div class="order-status"><i class="ti ti-circle-check"></i></div>
            </div>
            <!-- Single Order Status-->
            <div class="single-order-status">
              <div class="order-icon"><i class="ti ti-heart-check"></i></div>
              <div class="order-text">
                <h6>Delivered</h6><span>Estimate: 7 Feb 2024</span>
              </div>
              <div class="order-status"><i class="ti ti-circle-check"></i></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <?php include('footer_bar.php');?>
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