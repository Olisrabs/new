<?php 
include('db_conn.php');
session_start();

$uin=$_SESSION['uin'];
	$fullname = $_SESSION['fullname'];
	$meter_type = $_SESSION['meter_type'];
	$meter_name=$_SESSION['meter_name'];
	$meter_no=$_SESSION['meter_no'];
	$phone=$_SESSION['phone'];
	$email=$_SESSION['email'];
	$amount=$_SESSION['amount'];
$state=$_SESSION['state'];
	$commission=$_SESSION['commission'];
$today = date("Y-m-d");
						
						$sql="INSERT INTO approved (date, uin, fullname, state, meter_type, meter_name, meter_no, phone, email, amount, commission, payment, method, status) VALUES ('$today','$uin','$fullname','$state','$meter_type','$meter_name','$meter_no','$phone','$email','$amount','$commission','Pending','Manual','Pending')";

    mysqli_query($conn,$sql) or die (mysqli_error($conn));
    $num=mysqli_insert_id($conn);
                        if(mysqli_affected_rows($conn)!=1){
                            $message= "Error inserting the application information.";
                            }
	    

 			echo '<script type="text/javascript"> window.open("out.php","_self");</script>'; // Redirect user to index.php



						
						
						?>