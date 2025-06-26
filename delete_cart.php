<?php
include('db_con.php');

if (isset($_REQUEST['id'])) {
    $cart_uin = $_REQUEST['id'];

    // Step 1: Get cart item details
    $stmt = mysqli_prepare($con, "SELECT * FROM cart WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $cart_uin);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $prod_uin = $row['prod_uin'];
        $quantity = $row['quantity'];

        // Step 2: Delete from cart
        $stmt_del = mysqli_prepare($con, "DELETE FROM cart WHERE id = ?");
        mysqli_stmt_bind_param($stmt_del, "i", $cart_uin);
        $del_success = mysqli_stmt_execute($stmt_del);

        // Step 3: Update product quantity
        $stmt_update = mysqli_prepare($con, "UPDATE add_product SET prod_quant = prod_quant + ? WHERE prod_uin = ?");
        mysqli_stmt_bind_param($stmt_update, "is", $quantity, $prod_uin);
        $update_success = mysqli_stmt_execute($stmt_update);

        if ($del_success && $update_success) {
            echo "<script>
                alert('Item has been successfully deleted from cart');
                window.location.href = 'cart.php';
            </script>";
        } else {
            echo "Error performing delete or update: " . mysqli_error($con);
        }
    } else {
        echo "Cart item not found.";
    }
}
?>
