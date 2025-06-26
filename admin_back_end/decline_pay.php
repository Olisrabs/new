<?php
include('db_con.php');
if(isset($_REQUEST['order_id'])){
    $sql= "SELECT * FROM bill_details WHERE order_id='$_REQUEST[order_id]'";
    $result= mysqli_query($con, $sql);
    $row= mysqli_fetch_array($result);
?>

<?php
$sql="UPDATE bill_details SET pay_stat='Failed' WHERE order_id='$_REQUEST[order_id]'";

        $result = mysqli_query($con, $sql);

		if($result) {
      echo "<script>alert ('Payment declined.')
      </script>";
      echo "<script>window.open('transactions.php','_self')</script>";
}}
?>