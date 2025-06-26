<?php
// Ensure session is started to access user information
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please log in to add items to your cart');</script>";
    echo "<script>window.location.href = 'login.php';</script>";
    exit();
};
?>