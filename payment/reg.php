<?php
//ini_set('display_errors', '1'); 
//	require 'includes/PHPMailer.php';
//	require 'includes/SMTP.php';
//	require 'includes/Exception.php';
////Define name spaces
//	use PHPMailer\PHPMailer\PHPMailer;
//	use PHPMailer\PHPMailer\SMTP;
//	use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="VLWC2021" />
    <meta name="description" content="Victory Life World Convention">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>PowerPlug | Buy Electricity</title>

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


       <section id="page-content">
            <div class="container">
                <div class="row">
                    <div class="content col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="mb-5" align="center"><img src="images/bedclogo.png"> <br><br>
									BEDC Electricity Payment Platform</h3>
								
								<h4>Prepaid and Postpaid BEDC payment.</h4>
								
								<h5 class="mb-5" style="margin-left:30px;">
								
									<li>Select <strong>"PREPAID"</strong> if you load token on your meter.</li>
									<li>Select <strong>"POSTPAID"</strong> if you get a bill at the end of the month.</li>
													
								</h5>
								
                                <form id="form1" class="form-validate" method="POST" enctype="multipart/form-data">
                                <?php

                                include('db_conn.php');

$rand = rand(1000,9999);
		$today = date("dmy");
		$time = date("His");
		$ID = $today.$time.$rand;

	error_reporting(E_ALL);
	if(isset($_REQUEST['submit'])){
        $uin=trim(addslashes($_REQUEST['uin']));
		$fullname=trim(addslashes($_REQUEST['fullname']));
		$gender=trim(addslashes($_REQUEST['gender']));
		$phone=trim(addslashes($_REQUEST['phone']));
		$emailreg=trim(addslashes($_REQUEST['email']));
        $location=trim(addslashes($_REQUEST['location']));
        $category=trim(addslashes($_REQUEST['category']));
        $church=trim(addslashes($_REQUEST['church']));
        $attendance=trim(addslashes($_REQUEST['attendance']));
		



                            //Check for duplicate record in database before inserting New Record
    $check=mysqli_query($conn, "SELECT * FROM vlwc2021 WHERE uin='$uin' OR fullname='$fullname' OR email='$emailreg'");
    $checkrows=mysqli_num_rows($check);

   if($checkrows>0) {
    echo "<script>alert('Participant Already Exist in VLWC2021 Database')
    location.href='reg.php'</script>";
   } else {
	   
	   $email = "otaligodspower@gmail.com"; 
		$password = "Chukwu25@2015"; 
		
		$message= "Dear $fullname, thanks for registering to participate $attendance at the VLWC2021. May your life experience New Waves of Exploit IJN. Bishop Mike Bamidele";
		
		$sender_name = "VLWC 2021"; 
		$recipients = $phone; 
		$forcednd = "1"; 
		$data = array("email" => $email, "password" => $password,"message"=>$message, "sender_name"=>$sender_name,"recipients"=>$recipients,"forcednd"=>$forcednd); 
		$data_string = json_encode($data); 
		$ch = curl_init('https://api.bulksmslive.com/v2/app/sms'); curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string))); $result = curl_exec($ch); $res_array = json_decode($result); 
	   //print_r($res_array);
	   
    //insert results from the form input
    $sql="INSERT INTO vlwc2021 (uin, fullname, gender, phone, email, location, category, church, attendance, confirm) VALUES ('$uin','$fullname','$gender','$phone','$emailreg','$location','$category','$church','$attendance','Not Confirmed')";

    mysqli_query($conn,$sql) or die (mysqli_error($conn));
    $num=mysqli_insert_id($conn);
                        if(mysqli_affected_rows($conn)!=1){
                            $message= "Error inserting the application information.";
                            }
	   
	   //Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "mail.wetindey.xyz";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "vlwc2021@wetindey.xyz";
//Set gmail password
	$mail->Password = "Chukwu25@2015";
//Email subject
	$mail->Subject = "Welcome to VLWC 2021";
//Set sender email
	$mail->setFrom('VLWC2021@wetindey.xyz');
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
                            <tr>
                                <td style='text-align: center; padding-bottom:25px'>
                                    <a href='#'><img style='height: 60px' src='https://vlwc2021.wetindey.xyz/convention/logo.png' alt='logo'></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style='width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;'>
                        <tbody>
                            <tr>
                                <td style='padding: 30px 30px 15px 30px;'>
                                    <h2 style='font-size: 28px; color: #003196; font-weight: 600; margin: 0; text-align:center'>Successful Registration</h2>
                                </td>
                            </tr>
                            <tr>
                                <td style='padding: 0 30px 20px;'>
                                    <p style='margin-bottom: 10px; font-size: 18px;'>Hi <b>$fullname,</b></p>
                                    <p style='margin-bottom: 10px; font-size: 18px;'>Thanks for registering to participate $attendance at the <span style='color: #003196;'>Victory Life World Convention 2021</span>. May your life experience <b>New Waves of Exploit</b> in Jesus name.<br><br>
									
								
I will be expecting you $attendance on Wednesday 8th September, 2021!<br><br>
Victory is your in Jesus Name. Amen!<br><br>

<b>Bishop Mike Bamidele</b></p>

                                    
                                
                                </td>
                            </tr>
							
							<tr>
                                <td style='padding: 5px 30px 15px 30px;'>
                                    <h2 style='text-align:center'><img style='height: 380px; ' src='https://vlwc2021.wetindey.xyz/convention/handbill.jpg' alt='Handbill'></h2>
                                </td>
                            </tr>
                           
                           
                        </tbody>
                    </table>
                    <table style='width:100%;max-width:620px;margin:0 auto;'>
                        <tbody>
                            <tr>
                                <td style='text-align: center; padding:25px 20px 0;'>
                                    <p style='font-size: 13px;'>Copyright © 2021 ~ Powered by <a style='color: #003196; text-decoration:none;' href='https://wetindey.space' target='_blank'>Wetin Dey Inc.</a> <br> </p>
                                    
                                    <p style='padding-top: 15px; font-size: 12px;'>This email was sent to you as a registered participant on <a style='color: #003196; text-decoration:none;' href='#'><b>VLWC2021</b></a>.</p>
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
	    echo "<script>alert('Thanks $fullname, your registration for Victory Life World Convention 2021 was successful')
        location.href='../'</script>";
	
	}
	   

}
}

	mysqli_close($conn);
	


?>
                                   

                                    <div class="form-row">
                                            <input type="hidden" value="<?php echo $ID; ?>" class="form-control" name="uin" required title="uin" readonly>
										
										 <div class="form-group col-md-6">
                                            <label for="meter_type">Meter Type</label>
                                            <select class="form-control" name="meter_type" required title="Meter Type Required">
                                                <option value="">Select your Meter Type</option>
												<option value="Prepaid">Prepaid</option>
                                                <option value="Postpaid">Postpaid</option>
                                            </select>
                                        </div>
										
										 <div class="form-group col-md-6">
                                            <label for="meter_name">Meter Name</label>
                                            <input class="form-control" type="text" name="meter_name" placeholder="Enter Meter Name" required title="Meter Name is Required">
                                        </div>
										<div class="form-group col-md-6">
                                            <label for="meter_no">Meter Number</label>
                                            <input class="form-control" type="text" name="meter_no" placeholder="Enter Meter Number" required title="Meter No is Required">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="telephone">Phone No</label>
                                            <input class="form-control" type="number" name="phone" placeholder="Enter your Phone number" required title="Phone No Required">
                                        </div>
										
										 <div class="form-group col-md-6">
                                            <label for="email">Email Address</label>
                                            <input class="form-control" type="email" name="email" placeholder="Enter Valid Email Address" required title="Email Address is Required">
                                        </div>
										

										
										
										
										
										
										 <div class="form-group col-md-6">
                                            <label for="amount">Amount</label>
                                            <input type="number" class="form-control" name="amount" placeholder="Enter Amount" required title="Amount is Required">
                                        </div>
										
										

                                    </div>
                                   

                                    <div class="form-row">



                                    <div class="form-group col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="terms_conditions" id="terms_conditions" class="custom-control-input" value="1" required title="">
                                            <label class="custom-control-label" for="terms_conditions">By checking
                                                this
                                                option, you agree that all information supplied are correct and true.</label>
                                        </div>
                                    </div>
										
										<div class="form-group col-md-12">
                                    <input type="submit" name="submit" value="Continue" class="btn m-t-30 mt-3 col-lg-12 btn-danger">
											
										</div>
                                </form>
                            </div>
                        </div>

                    </div>



                </div>
            </div>
        </section>


        <footer id="footer">

            <div class="copyright-content">
                <div class="container">
                    <div class="copyright-text text-center">&copy; <?php include('copyright.inc'); ?> <b>VLWC2021</b> | All Rights Reserved </div>
                </div>
            </div>
        </footer>

    </div>


    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>

    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>

    <script src="js/functions.js"></script>

    <script src="plugins/validate/validate.min.js"></script>
    <script src="plugins/validate/valildate-rules.js"></script>
</body>


</html>