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
        <div class="back-button me-2"><a href="checkout-payment.php?order_id=<?php echo $row['order_id'];?>"><i class="ti ti-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Credit Card Info</h6>
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
        <!-- Checkout Wrapper-->
        <div class="checkout-wrapper-area py-3">
          <!-- Credit Card Info-->
          <div class="credit-card-info-wrapper"><img class="d-block mb-4" src="img/bg-img/credit-card.png" alt="">
            <div class="pay-credit-card-form">
              <form action="" method="post">
              <p>Hi <span style="font-weight: bold; "><?php echo $row['fullname'];?></span>, Make your payment through your bank card(ATM). Please use your Order ID as the payment reference. Your order won’t be shipped until the payment has been successfully done and have cleared in our account.</p>
              <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between align-items-center border-0">Business Name<span><b>KMEMPIRE ONL_SHOPPING</b></span></li>
                <li class="list-group-item d-flex justify-content-between align-items-center border-0">Amount<span><b>&#8358;<?php echo number_format($row['grand_total'], 2);?></b></span></li>
              </ul><br>
                </div>
                <script src="https://checkout.flutterwave.com/v3.js"></script>
                <button class="btn btn-primary btn-lg w-100" type="button" onclick="makePayment()">Make Payment</button>
                <script>
        function makePayment() {
	FlutterwaveCheckout({
		public_key: 'FLWPUBK_TEST-63967619674c5e34c66c5d1a360b3e35-X', 
		tx_ref: '<?php echo $row['order_id']; ?>',
		amount: '<?php echo $row['grand_total']; ?>',
		currency: 'NGN',
		payment_options: 'card, mobilemoneyghana, ussd',
		redirect_url: 'https://glaciers.titanic.com/handle-flutterwave-payment',
		meta: {
			consumer_id: 23,
			consumer_mac: '92a3-912ba-1192a',
		},
		customer: {
			email: '<?php echo $row['email']; ?>',
			phone_number: '<?php echo $row['mob_num']; ?>',
			name: '<?php echo $row['fullname']; ?>',
		},
		customizations: {
			title: 'KMEMPIRE ONL_SHOPPING',
			description: 'Payment for products ordered',
			logo: 'https://wetindeycodeacademy.com.ng/wizzmartt/KmEmpire_onl_shop/assets/images/logo/logo.png',
		},
	});
}
    </script>
              </form>
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