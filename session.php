<?php
session_start();
include('db_con.php');

$user_check=$_SESSION['email'];

$sql = mysqli_query($con, "SELECT * FROM user WHERE email='$user_check' ");

$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);

$session_user_id =$row['user_id'];
$session_fullname =$row['fullname'];
$session_username =$row['username'];
$session_mob_num = $row['mob_num'];
$session_email = $row['email'];
$session_address = $row['address'];
$session_passport = $row['passport'];

if(!isset($user_check))
{
header("Location: ../");
}
?>




