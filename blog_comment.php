<?php
    include('db_con.php');
    if($_POST){
    $blog_uin=$_REQUEST['blog_uin'];
    $name=$_REQUEST['name'];
    $comment=$_REQUEST['comment'];

    if (!empty($blog_uin) && !empty($name) && !empty($comment)) {

    $sql="INSERT INTO blog_comm(blog_uin, `name`, comment) VALUES ('$blog_uin','$name','$comment')";

    mysqli_query($con,$sql) or die (mysqli_error($con));
    $num=mysqli_insert_id($con);
    if(mysqli_affected_rows($con)!=1){
    $messagereg="Error inserting record into database";
    }
    echo "<script>alert ('Your comment has been submitted!')
    location.href='blog-details.php?blog_uin=$blog_uin'</script>";

    }else {
        echo "All fields are required!";
    }}
?>

