<?php
include('db_conn.php');
session_start();
if(isset($_REQUEST['uin'])){
$sql = "SELECT * FROM transaction WHERE uin='$_REQUEST[uin]'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);
	$commission = 100;
	//$actualvat = $commission * $row['amount'];
	$newpayment = $row['amount'] + $commission;
	
	$_SESSION['uin'] = $row['uin'];
	$_SESSION['fullname'] = $row['fullname'];
	$_SESSION['meter_type']=$row['meter_type'];
	$_SESSION['meter_name']=$row['meter_name'];
	$_SESSION['meter_no']=$row['meter_no'];
	$_SESSION['phone']=$row['phone'];
	$_SESSION['email']=$row['email'];
	$_SESSION['amount']=$row['amount'];
	
	
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from inspirothemes.com/polo/shop-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Sep 2020 14:07:51 GMT -->
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" /> <meta name="author" content="Wetin Dey Inc." />
<meta name="description" content="PowerPlug - Checkout">
<link rel="icon" type="image/png" href="images/favicon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>PowerPlug | Checkout</title>

<link href="css/plugins.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>
<body>

<div class="body-inner">

<header id="header" data-fullwidth="true">
            <div class="header-inner">
                <div class="container">

                <div id="logo"> <a href="../"><span class="logo-default"><img src="images/logo2.png" height="50"></span></a> </div>


                    <div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x"></i></a>

                    </div>





                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>


                    <div id="mainMenu">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li><a href="../">Home</a></li>
                                    <li><a href="../#contact">Contact Us</a></li>



                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </header>


<section id="page-title">
<div class="container">
<div class="page-title">
<h1><strong>BEDC Electricity Checkout</strong></h1>
<span>Checkout details</span>
</div>

</div>
</section>


<section id="shop-checkout">
<div class="container">
<div class="shop-cart">

<div class="seperator"><i class="fa fa-credit-card"></i>
</div>
	
	
	
	
<div class="row">

	
	
<div class="col-lg-6">
<div class="row">
<div class="col-lg-12">
<div class="table-responsive">
<h4>Your Order</h4>
<table class="table">
<tbody>
	<tr>
<td class="cart-product-name">
<strong>Fullname</strong>
</td>
<td class="cart-product-name text-right">
<span class="amount"><?php echo $row['fullname']; ?></span>
</td>
</tr>
<tr>
<td class="cart-product-name">
<strong>Meter Type</strong>
</td>
<td class="cart-product-name text-right">
<span class="amount"><?php echo $row['meter_type']; ?></span>
</td>
</tr>
<tr>
<td class="cart-product-name">
<strong>Meter Name:</strong>
</td>
<td class="cart-product-name  text-right">
<span class="amount"><?php echo $row['meter_name']; ?></span>
</td>
</tr>
<tr>
<td class="cart-product-name">
<strong>Meter/Account No</strong>
</td>
<td class="cart-product-name  text-right">
<span class="amount"><strong><?php echo $row['meter_no']; ?></strong></span>
</td>
</tr>
	
	<tr>
<td class="cart-product-name">
<strong>Phone No</strong>
</td>
<td class="cart-product-name  text-right">
<span class="amount"><?php echo $row['phone']; ?></span>
</td>
</tr>
	
	<tr>
<td class="cart-product-name">
<strong>Email Address</strong>
</td>
<td class="cart-product-name  text-right">
<span class="amount"><?php echo $row['email']; ?></span>
</td>
</tr>
	
	<tr>
<td class="cart-product-name">
<strong>Processing Fee</strong>
</td>
<td class="cart-product-name  text-right">
<span class="amount">&#8358;<?php echo number_format($commission, 2); ?></span>
</td>
</tr>
	
<tr>
<td class="cart-product-name">
<strong>Total Amount</strong>
</td>
<td class="cart-product-name text-right">
<span class="amount color lead"><strong>&#8358;<?php echo number_format($newpayment, 2); ?></strong></span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
<div class="col-lg-12">
<button type="button" class="btn icon-left float-right mt-3 btn-danger" onClick="payWithRave()" href="#"><span>Proceed to Payment</span></button>
</div>
</div>
</div>
	
	<script>
    const API_publicKey = "FLWPUBK-d23b30f495819668660ac252f0a218cf-X";

    function payWithRave() {
        var x = getpaidSetup({
            PBFPubKey: API_publicKey,
            customer_email: "<?php echo $row['email'] ?>",
            amount: <?php echo $newpayment; ?>,
            customer_phone: "<?php echo $row['phone'] ?>",
            currency: "NGN",
            txref: "rave-123456",
            meta: [{
                metaname: "flightID",
                metavalue: "AP1234"
            }],
            onclose: function() {},
            callback: function(response) {
                var txref = response.data.txRef; // collect txRef returned and pass to a 					server page to complete status check.
                console.log("This is the response returned after a charge", response);
                if (
                    response.data.chargeResponseCode == "00" ||
                    response.data.chargeResponseCode == "0"
                ) {
                    location.href = "failed.php";
                } else {
                    location.href = "process.php";
						
                }

                x.close(); // use this to close the modal immediately after payment.
            }
        });
    }
</script>
	
	<div class="col-lg-6">
<div class="row">
<div class="col-lg-12">
	
<div class="table-responsive">


	
	<div class="col-lg-12">
<div class="icon-box effect small clean">
<div class="icon">
<a href="#"><i class="fa fa-history"></i></a>
</div>
<h3>We help you save time and money!</h3>
<p>PowerPlug help take the stress off your shoulder!</p>
</div>
</div>
	
	<h4 align="center">Secure Payment Gateway</h4>
	
<table class="table">
<tbody>
<tr>
<td class="cart-product-name" align="center">
<img src="images/trusted.png">
</td>
</tr>

</tbody>
</table>
</div>
</div>

</div>
</div>
	
	
</div>
</div>
</div>
</section>





<footer id="footer">

	
<div class="copyright-content">
                <div class="container">
                    <div class="copyright-text text-center">&copy; <?php include('copyright.inc'); ?> <b>PowerPlug</b> | All Rights Reserved </div>
                </div>
            </div>
</footer>

</div> 

<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>

<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>

<script src="js/functions.js"></script>
</body>

<!-- Mirrored from inspirothemes.com/polo/shop-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Sep 2020 14:07:52 GMT -->
</html>