﻿<?php
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
      <div class="spinner-grow text-secondary" role="status" style="color: whitesmoke;">
        <div class="sr-only"></div>
      </div>
    </div>
    <!-- Header Area -->
    <?php include('navbar.php');?>
    <?php include('sidebar.php');?>
    <div class="page-content-wrapper">
      <div class="container">
        <div class="settings-wrapper py-3">
          <!-- Single Setting Card-->
          <div class="card settings-card">
            <div class="card-body">
              <!-- Single Settings-->
              <div class="single-settings d-flex align-items-center justify-content-between">
                <div class="title"><i class="ti ti-moon"></i><span>Night Mode</span></div>
                <div class="data-content">
                  <div class="toggle-button-cover">
                    <div class="button r">
                      <input class="checkbox" id="darkSwitch" type="checkbox">
                      <div class="knobs"></div>
                      <div class="layer"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Single Setting Card-->
          <div class="card settings-card">
            <div class="card-body">
              <!-- Single Settings-->
              <div class="single-settings d-flex align-items-center justify-content-between">
                <div class="title"><i class="ti ti-pilcrow"></i><span>RTL Mode</span></div>
                <div class="data-content">
                  <div class="toggle-button-cover">
                    <div class="button r">
                      <input class="checkbox" id="rtlSwitch" type="checkbox">
                      <div class="knobs"></div>
                      <div class="layer"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Single Setting Card-->
          <div class="card settings-card">
            <div class="card-body">
              <!-- Single Settings-->
              <div class="single-settings d-flex align-items-center justify-content-between">
                <div class="title"><i class="ti ti-circle-check"></i><span>Availability</span></div>
                <div class="data-content">
                  <div class="toggle-button-cover">
                    <div class="button r">
                      <input class="checkbox" type="checkbox" checked="">
                      <div class="knobs"></div>
                      <div class="layer"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Single Setting Card-->
          <div class="card settings-card">
            <div class="card-body">
              <!-- Single Settings-->
              <div class="single-settings d-flex align-items-center justify-content-between">
                <div class="title"><i class="ti ti-bell-ringing"></i><span>Notifications</span></div>
                <div class="data-content">
                  <div class="toggle-button-cover">
                    <div class="button r">
                      <input class="checkbox" type="checkbox" checked="">
                      <div class="knobs"></div>
                      <div class="layer"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Single Setting Card-->
          <div class="card settings-card">
            <div class="card-body">
              <!-- Single Settings-->
              <div class="single-settings d-flex align-items-center justify-content-between">
                <div class="title"><i class="ti ti-language"></i><span>Language</span></div>
                <div class="data-content"><a href="language.html">English<i class="ti ti-arrow-right"></i></a></div>
              </div>
            </div>
          </div>
          <!-- Single Setting Card-->
          <div class="card settings-card">
            <div class="card-body">
              <!-- Single Settings-->
              <div class="single-settings d-flex align-items-center justify-content-between">
                <div class="title"><i class="ti ti-question-mark"></i><span>contact</span></div>
                <div class="data-content"><a href="contact.php">Get Help<i class="ti ti-arrow-right"></i></a></div>
              </div>
            </div>
          </div>
          <!-- Single Setting Card-->
          <div class="card settings-card">
            <div class="card-body">
              <!-- Single Settings-->
              <div class="single-settings d-flex align-items-center justify-content-between">
                <div class="title"><i class="ti ti-shield-lock"></i><span>Privacy Policy</span></div>
                <div class="data-content"><a href="privacy-policy.html">View<i class="ti ti-arrow-right"></i></a></div>
              </div>
            </div>
          </div>
          <!-- Single Setting Card-->
          <div class="card settings-card">
            <div class="card-body">
              <!-- Single Settings-->
              <div class="single-settings d-flex align-items-center justify-content-between">
                <div class="title"><i class="ti ti-key"></i><span>Password</span></div>
                <div class="data-content"><a href="change-password.html">Change<i class="ti ti-arrow-right"></i></a></div>
              </div>
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