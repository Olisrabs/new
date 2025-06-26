<?php
include('db_con.php');
if(isset($_REQUEST['id'])){
    $sql= "SELECT * FROM cart WHERE id='$_REQUEST[id]'";
    $result= mysqli_query($con, $sql);
    $row= mysqli_fetch_array($result);
?>

<?php
$sql="UPDATE cart SET `status`='Pending' WHERE id='$_REQUEST[id]'";
if(mysqli_query($con, $sql)){
    echo "<script> alert('Item has been successfully moved to cart')
    location.href='cart.php'
    </script>";
}
else{
    echo "Error deleting record: ".mysqli_error($con);
}
}
?>