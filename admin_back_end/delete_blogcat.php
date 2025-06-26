<?php
include('db_con.php');
if(isset($_REQUEST['id'])){
    $sql= "SELECT * FROM blog_cat WHERE id='$_REQUEST[id]'";
    $result= mysqli_query($con, $sql);
    $row= mysqli_fetch_array($result);
?>

<?php
$sql="DELETE from blog_cat WHERE id='$_REQUEST[id]'";
if(mysqli_query($con, $sql)){
    echo "<script> alert('Blog category has been successfully deleted')
    location.href='blog_category.php'
    </script>";
}
else{
    echo "Error deleting record: ".mysqli_error($con);
}
}
?>