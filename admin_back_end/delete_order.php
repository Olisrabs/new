<?php
include('db_con.php');
if(isset($_REQUEST['order_id'])){
    $sql= "SELECT * FROM bill_details WHERE order_id='$_REQUEST[order_id]'";
    $result= mysqli_query($con, $sql);
    $row= mysqli_fetch_array($result);
?>

<?php
$sql="DELETE from bill_details WHERE order_id='$_REQUEST[order_id]'";
if(mysqli_query($con, $sql)){
    echo "<script> alert('Order has been successfully deleted')
    location.href='transactions.php'
    </script>";
}
else{
    echo "Error deleting record: ".mysqli_error($con);
}
}
?>