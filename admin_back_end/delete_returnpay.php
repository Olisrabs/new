<?php
include('db_con.php');
if(isset($_REQUEST['Pay_id'])){
    $sql= "SELECT * FROM bill_details WHERE Pay_id='$_REQUEST[Pay_id]'";
    $result= mysqli_query($con, $sql);
    $row= mysqli_fetch_array($result);
?>

<?php
$sql="DELETE from return_pay WHERE Pay_id='$_REQUEST[Pay_id]'";
if(mysqli_query($con, $sql)){
    echo "<script> alert('Payment has been successfully deleted')
    location.href='return_pay.php'
    </script>";
}
else{
    echo "Error deleting record: ".mysqli_error($con);
}
}
?>