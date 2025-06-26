<?php
include('db_con.php');
if(isset($_REQUEST['id'])){
    $sql= "SELECT * FROM sub_cat WHERE id='$_REQUEST[id]'";
    $result= mysqli_query($con, $sql);
    $row= mysqli_fetch_array($result);
?>

<?php
$sql="DELETE from sub_cat WHERE id='$_REQUEST[id]'";
if(mysqli_query($con, $sql)){
    echo "<script> alert('Sub-Category has been successfully deleted')
    location.href='sub-category.php'
    </script>";
}
else{
    echo "Error deleting record: ".mysqli_error($con);
}
}
?>