<?php
//  ini_set('display_errors', '1');
//  require 'includes/PHPMailer.php';
//  require 'includes/SMTP.php';
//  require 'includes/Exception.php';
//  //Define name spaces
//  use PHPMailer\PHPMailer\PHPMailer;
//  use PHPMailer\PHPMailer\SMTP;
//  use PHPMailer\PHPMailer\Exception;
?>

<?php
include('db_con.php');
if(isset($_REQUEST['order_id'])){
$sql = "SELECT * FROM bill_details WHERE order_id='$_REQUEST[order_id]'";
$result = mysqli_query($con, $sql); 
$row=mysqli_fetch_array($result);
	// $commission = 100;
	// //$actualvat = $commission * $row['amount'];
	// $newpayment = $row['amount'] + $commission;

	$commission = 50;
	$vat = 0.075;
	
	$actualvat = $vat * $row['grand_total'];
	$newpayment = $row['grand_total'] + $commission + $actualvat;

	$_SESSION['user_id'] = $row['user_id'];
	$_SESSION['order_id'] = $row['order_id'];
	// $_SESSION['user_ip'] = $row['user_ip'];
	$_SESSION['fullname'] = $row['fullname'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['mob_num'] = $row['mob_num'];
	$_SESSION['address'] = $row['address'];
	$_SESSION['ship_meth'] = $row['ship_meth'];
	$_SESSION['grand_total'] = $row['grand_total'];
	$_SESSION['order_stat'] = $row['order_stat'];
	$_SESSION['date'] = $row['date'];
	


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Wetin Dey Inc." />
<meta name="description" content="Àdìrẹ Èkìtì Hub - Checkout">
<link rel="icon" type="image/png" href="images/favicon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>Payment Page || KmEmpire_onlshopping</title>


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
                                    <li><a href="../contact.php">Contact Us</a></li>



                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </header>





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
<h4>Your Order Checkout</h4>
<form method="post">
<?php
                    include("db_con.php");
                    error_reporting(E_ALL);
                    if (isset($_REQUEST['proceed'])) {
						//$newpayment = $row['amount'] + $commission;
						$grand_total = $_REQUEST['grand_total'];
						$order_id = $_REQUEST['order_id'];


		$sql="UPDATE bill_details SET grand_total='$grand_total' WHERE order_id='$_REQUEST[order_id]'";
		$sql2="UPDATE cart SET grand_total='$grand_total' WHERE order_id='$_REQUEST[order_id]'";

        $result = mysqli_query($con, $sql);
        $result2 = mysqli_query($con, $sql2);

		if($result && $result2) {
      echo "<script>window.open('../checkout-payment.php?order_id=$order_id','_self')</script>";
    }}
?>
<table class="table">
<tbody>
	<tr>
<td class="cart-product-name">
<strong>User ID</strong>
</td>
<td class="cart-product-name text-right">
<span class="amount"><?php echo $row['user_id']; ?></span>
</td>
</tr>

	<tr>
<td class="cart-product-name">
<strong>Order ID</strong>
</td>
<td class="cart-product-name text-right">
<span class="amount"><?php echo $row['order_id']; ?></span>
</td>
</tr>

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
<strong>Email Address</strong>
</td>
<td class="cart-product-name  text-right">
<span class="amount"><?php echo $row['email']; ?></span>
</td>
</tr>


	<tr>
<td class="cart-product-name">
<strong>Phone No.</strong>
</td>
<td class="cart-product-name  text-right">
<span class="amount"><?php echo $row['mob_num']; ?></span>
</td>
</tr>

<tr>
<td class="cart-product-name">
<strong>Address</strong>
</td>
<td class="cart-product-name  text-right">
<span class="amount"><?php echo $row['address']; ?></span>
</td>
</tr>

	<tr>
<td class="cart-product-name">
<strong>Shipping Method</strong>
</td>
<td class="cart-product-name  text-right">
<span class="amount"><?php echo $row['ship_meth']; ?></span>
</td>
</tr>

<tr>
<td class="cart-product-name">
<strong>Date Ordered</strong>
</td>
<td class="cart-product-name  text-right">
<span class="amount"><?php echo date('jS-F-Y',strtotime($row['date']));?></span>
</td>
</tr>

<tr>
<td class="cart-product-name">
<strong>Commission</strong>
</td>
<td class="cart-product-name  text-right">
<span class="amount"><?php echo $commission; ?></span>
</td>
</tr>

<tr>
<td class="cart-product-name">
<strong>VAT</strong>
</td>
<td class="cart-product-name  text-right">
<span class="amount"><?php echo $vat; ?></span>
</td>
</tr>

<tr>
<td class="cart-product-name">
<strong>Price</strong>
</td>
<td class="cart-product-name text-right">
<span class="amount "><strong>&#8358;<?php echo number_format($row['grand_total'], 2);?></strong></span>
</td>
</tr>

<tr>
<td class="cart-product-name">
<strong>Total Price</strong>
</td>
<td class="cart-product-name  text-right">
<span class="amount color lead"> <strong> &#8358;<?php echo number_format ($newpayment, 2); ?> </strong></span>
</td>
</tr>
</tbody>
</table>
</div>
</div>

<div class="col-lg-12">
	<input type="hidden" name="order_id" value="<?php echo $row['order_id'];?>">
	<input type="hidden" name="grand_total" value="<?php echo $newpayment; ?>">
<a class="btn mt-3 btn-danger" href="cancel_order.php?order_id=<?php echo $row['order_id'];?>">Cancel Order
</a>
<button type="submit" name="proceed" class="btn mt-3 btn-info">Proceed to Payment
</form>

<script src="https://dropin.vpay.africa/"></script>

</div>
</div>


<div class="table-responsive">

<div class="col-lg-12">
<!-- <button type="button" class="btn mt-3 btn-primary btn-block" onClick="payWithRave()" href="#"><span>Online Payment</span></button> -->
</div>

<table class="table">
<tbody>
<!-- <tr>
<td class="cart-product-name" align="center">
<img src="images/trusted.png">
</td>
</tr> -->

</tbody>
</table>

	

</div>
</div>
</div>


</div>
</div>

</div>
</div>


</div>
</div>
</div>
</section>



<div class="modal fade" id="manualpayment" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true" style="display: none;">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="modal-label" align="center"><img src="images/favicon.png"> KmEmpire_onlshopping || Transfer Payment</h4>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-12">
<p>
	 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="donate-form default-form" enctype="multipart/form-data">
                    <?php
                    include("db_con.php");

                    error_reporting(E_ALL);
                    if (isset($_REQUEST['submit'])) {
						$today = date("Y-m-d");
						//$newpayment = $row['amount'] + $commission;
						$date = $row['date'];
						$order_id = $row['order_id'];
						$user_id = $row['user_id'];
						$firstname = $row['firstname'];
						$lastname = $row['lastname'];
						$email=$row['email'];
						$number=$row['number'];
						$address=$row['address'];
						$comment=$row['comment'];
						$total_price=$row['total_price'];
						$payment="Transfer";
						$status="Pending";

						$year = date('Y');


                        $emailreg = "info@adireekitihub.com";

				$receipt = $_FILES["receipt"]['name'];
		$target="receipt/";
		$target=$target.$_FILES["receipt"]['name'];


if(move_uploaded_file($_FILES["receipt"]['tmp_name'], $target)>0){


		$sql="UPDATE bill_details SET pay_meth='$payment', `status`='$status', receipt='$receipt' WHERE user_id='$_REQUEST[user_id]'";


        $result = mysqli_query($con, $sql);



		if($result) {

    //                     //Create instance of PHPMailer
	// $mail = new PHPMailer();
	// //Set mailer to use smtp
	// 	$mail->isSMTP();
	// //Define smtp host
	// 	$mail->Host = "mail.adireekitihub.com";
	// //Enable smtp authentication
	// 	$mail->SMTPAuth = true;
	// //Set smtp encryption type (ssl/tls)
	// 	$mail->SMTPSecure = "tls";
	// //Port to connect smtp
	// 	$mail->Port = "587";
	// //Set gmail username
	// 	$mail->Username = "info@adireekitihub.com";
	// //Set gmail password
	// 	$mail->Password = "adire@ekiti";
	// //Email subject
	// 	$mail->Subject = "New Customer Payment - $payment(N$total_amount)";
	// //Set sender email
	// 	$mail->setFrom('info@adireekitihub.com', 'Àdìrẹ Èkìtì Hub');
	// //Enable HTML
	// 	$mail->isHTML(true);
	// //Attachment

	// //Email body
	// 	$mail->Body = "<style>

	// 		html,
	// 		body {
	// 			margin: 0 auto !important;
	// 			padding: 0 !important;
	// 			height: 100% !important;
	// 			width: 100% !important;
	// 			font-family: 'Roboto', sans-serif !important;
	// 			font-size: 14px;
	// 			margin-bottom: 10px;
	// 			line-height: 24px;
	// 			color: #8094ae;
	// 			font-weight: 400;
	// 		}
	// 		* {
	// 			-ms-text-size-adjust: 100%;
	// 			-webkit-text-size-adjust: 100%;
	// 			margin: 0;
	// 			padding: 0;
	// 		}
	// 		table,
	// 		td {
	// 			mso-table-lspace: 0pt !important;
	// 			mso-table-rspace: 0pt !important;
	// 		}
	// 		table {
	// 			border-spacing: 0 !important;
	// 			border-collapse: collapse !important;
	// 			table-layout: fixed !important;
	// 			margin: 0 auto !important;
	// 		}
	// 		table table table {
	// 			table-layout: auto;
	// 		}
	// 		a {
	// 			text-decoration: none;
	// 		}
	// 		img {
	// 			-ms-interpolation-mode:bicubic;
	// 		}
	// 	</style>

	// 	<center style='width: 100%; background-color: #f5f6fa;'>
	// 		<table width='100%' border='0' cellpadding='0' cellspacing='0' bgcolor='#f5f6fa'>
	// 			<tr>
	// 			   <td style='padding: 40px 0;'>
	// 					<table style='width:100%;max-width:620px;margin:0 auto;'>
	// 						<tbody>

	// 						</tbody>
	// 					</table>
	// 					<table style='width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;'>
	// 						<tbody style='text-align:center;'>
	// 							<tr>
	// 								<td style='padding: 30px 30px 15px 30px;'>
	// 								<a href='#'><img style='height: 60px' src='https://adireekitihub.com/logo.png' alt='logo'></a>
	// 								</td>
	// 							</tr>


	// 							<tr>
	// 								<td style='padding: 0 30px 20px;'>
	// 								<p style='margin-bottom: 10px;'><b>OrderID: $uin</b></p>
	// 									<p style='margin-bottom: 10px;'><b> name: $name</b></p>
    //                                     <p style='margin-bottom: 10px;'>Phone No: <b>$phone</b></p>
    //                                     <p style='margin-bottom: 10px;'>Email Address: <b>$email</b></p>
    //                                     <p style='margin-bottom: 10px;'>Address: <b>$address</b></p>
    //                                     <p style='margin-bottom: 10px;'>Order Comments: <b>$order_comments</b></p>
	// 									<p style='margin-bottom: 10px;'><b>Total Amount: &#8358;". number_format($total_amount, 2)."</b></p>
    //                                     <p style='margin-bottom: 10px;'>Status: <b>$status</b></p>
    //                                     <p style='margin-bottom: 10px;'>Payment: <b>$payment</b></p>
	// 									<p style='margin-bottom: 10px;'>Receipt: <b><img src='https://adireekitihub.com/checkout/receipt/$receipt'></b></p>


	// 									<p style='margin-bottom: 10px;'><em>Please confirm payment, Thank You!</em><br><br>




	// 								</td>
	// 							</tr>

	// 						</tbody>
	// 					</table>
	// 					<table style='width:100%;max-width:620px;margin:0 auto;'>
	// 						<tbody>
	// 							<tr>
	// 								<td style='text-align: center; padding:25px 20px 0;'>
	// 									<p style='font-size: 13px;'>Copyright © $year <a style='color: #15134A; text-decoration:none;' href='https://adireekitihub.com'>Àdìrẹ Èkìtì Hub</a>. All rights reserved. <br> </p>
	// 								</td>
	// 							</tr>
	// 						</tbody>
	// 					</table>
	// 			   </td>
	// 			</tr>
	// 		</table>
	// 	</center>";
	// //Add recipient
	// 	$mail->addAddress("$emailreg");
	// //Finally send email
	// 	if ( $mail->send() ) {

            echo "<script type='text/javascript'> window.open('out2.php','_self');</script>";
		}


                    }

					}
				



                    ?>


                                    <div class="h5 mb-4" align="center"><strong style="font-size: 12px; mtext">Hi <span style="color: #15134A; "><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></span>, make payment into the account below and upload prove of Payment (Teller or Receipt).<br><font color="#15134A">Account Number: 0702526099
<br>Name: KMEMPIRE ONL_SHOPPING
<br>Bank: Access Bank</font></br></strong></div>

                                    <div class="form-row">

                                            <input class="form-control" value="<?php echo $row['user_id'] ?>" type="hidden" name="user_id" placeholder="user_id" readonly required>



                                        <div class="form-group col-md-12">
                                            <label for="name" style="color: #15134A; font-size: 12px; font-weight: bold; mtext">Upload Receipt(jpg, jpeg, png files only)</label>
                                            <input type="file" class="form-control" name="receipt" placeholder="Upload Receipt" required title="Upload Receipt" accept=".jpg,.jpeg,.png,.PNG,.JPEG,.JPG" onChange="readURL(this);">
                                        </div>

										 <div class="form-group col-md-12">
			<style>
/*
img{
max-width:100px; max-height:100px; text-align: center
}
*/
input[type=file]{
padding:10px;}
</style>

<script>
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$('#blah')
.attr('src', e.target.result);
};

reader.readAsDataURL(input.files[0]);
}
}
</script>

<img id="blah" class="img-circle" style="max-width:100px; max-height:100px; text-align: center" />
		</div>





										<div class="form-group col-md-12" align="center">

<input type="submit" name="submit"  value="Submit" class="btn btn-b btn-success" onclick="return confirm('Are you sure to Upload Receipt?')">
<button type="button" class="btn btn-b btn-danger" data-dismiss="modal">Close</button>
                                        </div>


                                    </div>
	</form>

	</p>
</div>
</div>
</div>

</div>
</div>
</div>

<footer id="footer">


<div class="copyright-content">
                <div class="container">
                    <div class="copyright-text text-center">&copy; <?php include('copyright.inc'); ?> <b>Àdìrẹ Èkìtì Hub</b> | All Rights Reserved </div>
                </div>
            </div>
</footer>

</div>

<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>

<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>

<script src="js/functions.js"></script>
</body>

</html>