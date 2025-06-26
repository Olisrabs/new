<?php
include('session.php'); 
include('db_con.php');
$id = 1;
$sql="SELECT * FROM user WHERE id='$id'";
$result=mysqli_query($con,$sql)or die(mysqli_error($con));
$rows=mysqli_fetch_array($result);
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
    <link rel="apple-touch-icon" href="img/icons/icon-96x96.png" style="color: green;">
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
        <div class="back-button me-2"><a href="home.php"><i class="ti ti-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Contact page</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas">
          <div><span></span><span></span><span></span></div>
        </div>
      </div>
    </div>
    <?php include('sidebar.php');?>
    <div class="page-content-wrapper">
      <!-- Google Maps-->
        <div class="container">
        <img src="asset/images/vector-images/img14.png" alt="img14" style="display: block; margin-left: auto; margin-right: auto; width: 80%;"><br>
        <h2 class="hey-jessica account-created-text" style="text-align: center; font-weight: bolder;">Contact Us</h2>
            <p class="veri-text" style="text-align: center; font-weight: bolder; font-size: 20px;">If you face any trouble feel free to contact us</p> 
            <div class="contact-us-container">
    
    <div class="contact-info">
    <!-- Call Us -->
<a href="tel:+1223334455" class="contact-item">
    <div class="form-control border mb-3" id="username" type="text" style="font-size: 20px;">
        <i class="ti ti-phone"></i> Call us: +1223334455
    </div>
</a>

<!-- Email Us -->
<a href="mailto:someone@example.com" class="contact-item">
    <div class="form-control border mb-3" id="email" type="text" style="font-size: 20px;">
        <i class="ti ti-mail"></i> Email us: someone@example.com
    </div>
</a>

<!-- Visit Our Website -->
<a href="https://www.example.com" class="contact-item" target="_blank">
    <div class="form-control border mb-3" id="website" type="text" style="font-size: 20px;">
        <i class="ti ti-world"></i> Visit our website
    </div>
</a>

    </div>
    
    <p style="font-weight: bolder; font-size: 16px;">If you prefer to reach us through another method, feel free to use the form below:</p>
            <div class="card">
              <div class="card-body">
                <div class="rtl-text-right">
                  <p class="mb-4">Write to us. We will reply to you as soon as possible. But yes, it can take up to 24 hours.</p>
                </div>
                <!-- Contact Form-->
                <div class="contact-form mt-3">
                  <form action="#" method="">
                    <input class="form-control border mb-3" id="username" type="text" placeholder="Your Name">
                    <input class="form-control border mb-3" id="email" type="email" placeholder="Enter email">
                    <textarea class="form-control border mb-3" id="message" name="" cols="30" rows="10" placeholder="Write something..."></textarea>
                    <button class="btn btn-primary btn-lg w-100">Send Message</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="pb-3"></div>
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