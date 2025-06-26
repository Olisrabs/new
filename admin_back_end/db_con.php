<?php
$con=new mysqli("localhost", "wetinde2_kmep_us", "kmempire@3655", "wetinde2_adreg_db");
if(mysqli_connect_errno()){
    printf("connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>