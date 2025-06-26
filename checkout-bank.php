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
          <h6 class="mb-0">Bank Info</h6>
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
          <div class="credit-card-info-wrapper"><img class="d-block mb-4" src="img/bg-img/credit-card.png" alt="">
            <div class="bank-ac-info">
            <form method="post" class="donate-form default-form" enctype="multipart/form-data">
                    <?php
                    include("db_con.php");
                    error_reporting(E_ALL);
                    if (isset($_REQUEST['order'])) {
						$today = date("Y-m-d");
						//$newpayment = $row['amount'] + $commission;
						$date = $row['date'];
            $user_id = $row['user_id'];
						$order_id = $row['order_id'];
						$prod_name = $row['prod_name'];
						$pay_id = $_REQUEST['pay_id'];
						$fullname = $row['fullname'];
						$email=$row['email'];
						$mob_num=$row['mob_num'];
						$address=$row['address'];
						$grand_total=$row['grand_total'];
						$pay_meth="Bank Transfer";
						$pay_stat="Awaiting Authentification";
						$order_stat="Ordered";
            $prod_image=$row['prod_image'];

						$year = date('Y');

				$receipt = $_FILES["receipt"]['name'];
		$target="receipt/";
		$target=$target.$_FILES["receipt"]['name'];


if(move_uploaded_file($_FILES["receipt"]['tmp_name'], $target)>0){


		$sql="UPDATE bill_details SET pay_id='$pay_id', pay_meth='$pay_meth', pay_stat='$pay_stat', order_stat='$order_stat', receipt='$receipt' WHERE order_id='$_REQUEST[order_id]'";
    
		$sql2="UPDATE cart SET `status`='Ordered', pay_stat='$pay_stat' WHERE order_id='$_REQUEST[order_id]'";


        $result = mysqli_query($con, $sql);
        $result2 = mysqli_query($con, $sql2);



		if($result && $result2) {
      echo "<script>alert ('Your order has been Successfully placed. We will notify you shortly. Thanks')
      </script>";
      echo "<script>window.open('payment-success.php','_self')</script>";
    }}}
?>
              <p>Hi <span style="color: #15134A; "><?php echo $row['fullname'];?></span>, Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
              <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 border-bottom">Bank Name<span><b>Access</b></span></li>
                <li class="list-group-item d-flex justify-content-between align-items-center border-0">Account Number<span><b>0702526099</b></span></li>
                <li class="list-group-item d-flex justify-content-between align-items-center border-0">Account Name<span><b>KMEMPIRE ONL_SHOPPING</b></span></li>
                <li class="list-group-item d-flex justify-content-between align-items-center border-0">Amount<span><b>&#8358;<?php echo number_format($row['grand_total'], 2);?></b></span></li>
              </ul><br>
              <ul class="list-group mb-3">
                <input type="hidden" name="pay_id" id="" value="<?php echo $row['order_id'];?>">
              </ul>
              <p><b>Upload Receipt(jpg, jpeg, png files only)</b></p>
              <ul class="list-group mb-3">
                <input type="file" name="receipt" id="" required title="Upload Receipt" accept=".jpg,.jpeg,.png,.PNG,.JPEG,.JPG" onChange="readURL(this)";>
              </ul>
            </div><button type="submit" name="order" class="btn btn-primary btn-lg w-100">Order Now</a>
          </div>
        </form>
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