<?php
session_start();
include('db_con.php');
$user_check=$_SESSION['username'];

$sql = mysqli_query($con,"SELECT * FROM personal WHERE username='$user_check' ");

$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);

$session_admin_id=$row['admin_id'];
$session_fullname =$row['fullname'];
$session_username = $row['username'];
$session_email = $row['email'];
$session_mobile = $row['mobile'];
$session_gender = $row['gender'];
$session_dob = $row['dob'];
$session_role = $row['role'];
$session_passportt = $row['passportt'];

if(!isset($user_check))
{
header("Location: ../");
}
?>




