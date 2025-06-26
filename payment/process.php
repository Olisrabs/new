<?php
ini_set('display_errors', '1');
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include('db_conn.php');
session_start();

	$uin=$_SESSION['uin'];
	$date=$_SESSION['date'];
	$user_ip=$_SESSION['user_ip'];
	$fullname = $_SESSION['fullname'];
	$phone=$_SESSION['phone'];
	$email=$_SESSION['email'];
	$address=$_SESSION['address'];
	$order_comments=$_SESSION['order_comments'];
	$total_amount=$_SESSION['total_amount'];

	$payment="Online";
	$status="Approved";

$emailreg = "otaligodspower@gmail.com";

$sql="UPDATE customers SET payment='$payment', `status`='$status' WHERE uin='$uin'";
$result = mysqli_query($conn, $sql);
if($result) {

							//Create instance of PHPMailer
	$mail = new PHPMailer();
	//Set mailer to use smtp
		$mail->isSMTP();
	//Define smtp host
		$mail->Host = "mail.agsmotor.ng";
	//Enable smtp authentication
		$mail->SMTPAuth = true;
	//Set smtp encryption type (ssl/tls)
		$mail->SMTPSecure = "tls";
	//Port to connect smtp
		$mail->Port = "587";
	//Set gmail username
	$mail->Username = "agsmotors@agsmotor.ng";
	//Set gmail password
		$mail->Password = "agsmotor@2023";
	//Email subject
		$mail->Subject = "New Customer Payment - $payment(N$total_amount)";
	//Set sender email
		$mail->setFrom('ASGMOTORS@agsmotor.ng');
	//Enable HTML
		$mail->isHTML(true);
	//Attachment

	//Email body
		$mail->Body = "<style>

			html,
			body {
				margin: 0 auto !important;
				padding: 0 !important;
				height: 100% !important;
				width: 100% !important;
				font-family: 'Roboto', sans-serif !important;
				font-size: 14px;
				margin-bottom: 10px;
				line-height: 24px;
				color: #8094ae;
				font-weight: 400;
			}
			* {
				-ms-text-size-adjust: 100%;
				-webkit-text-size-adjust: 100%;
				margin: 0;
				padding: 0;
			}
			table,
			td {
				mso-table-lspace: 0pt !important;
				mso-table-rspace: 0pt !important;
			}
			table {
				border-spacing: 0 !important;
				border-collapse: collapse !important;
				table-layout: fixed !important;
				margin: 0 auto !important;
			}
			table table table {
				table-layout: auto;
			}
			a {
				text-decoration: none;
			}
			img {
				-ms-interpolation-mode:bicubic;
			}
		</style>

		<center style='width: 100%; background-color: #f5f6fa;'>
			<table width='100%' border='0' cellpadding='0' cellspacing='0' bgcolor='#f5f6fa'>
				<tr>
				   <td style='padding: 40px 0;'>
						<table style='width:100%;max-width:620px;margin:0 auto;'>
							<tbody>

							</tbody>
						</table>
						<table style='width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;'>
							<tbody style='text-align:center;'>
							<tr>
							<td style='padding: 30px 30px 15px 30px;'>
							<a href='#'><img style='height: 60px' src='https://agsmotor.ng/logo.png' alt='logo'></a>
							</td>
						</tr>


						<tr>
						<td style='padding: 0 30px 20px;'>
						<p style='margin-bottom: 10px;'><b>OrderID: $uin</b></p>
							<p style='margin-bottom: 10px;'><b> Fullname: $fullname</b></p>
							<p style='margin-bottom: 10px;'>Phone No: <b>$phone</b></p>
							<p style='margin-bottom: 10px;'>Email Address: <b>$email</b></p>
							<p style='margin-bottom: 10px;'>Address: <b>$address</b></p>
							<p style='margin-bottom: 10px;'>Order Comments: <b>$order_comments</b></p>
							<p style='margin-bottom: 10px;'><b>Total Amount: &#8358;". number_format($total_amount, 2)."</b></p>
							<p style='margin-bottom: 10px;'>Status: <b>$status</b></p>
							<p style='margin-bottom: 10px;'>Payment: <b>$payment</b></p>


							<p style='margin-bottom: 10px;'><em>Please confirm payment, Thank You!</em><br><br>




						</td>
						</tr>

							</tbody>
						</table>
						<table style='width:100%;max-width:620px;margin:0 auto;'>
							<tbody>
								<tr>
									<td style='text-align: center; padding:25px 20px 0;'>
										<p style='font-size: 13px;'>Copyright © 2023 <a style='color: #4C0066; text-decoration:none;' href='https://agsmotor.ng'>AGS MOTORS</a>. All rights reserved. <br> </p>
									</td>
								</tr>
							</tbody>
						</table>
				   </td>
				</tr>
			</table>
		</center>";
	//Add recipient
		$mail->addAddress("$emailreg");
	//Finally send email
		if ( $mail->send() ) {

			echo "<script type='text/javascript'> window.open('out.php','_self');</script>";

		}
	}






						?>