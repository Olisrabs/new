<?php
include('db_con.php');

if (isset($_REQUEST['order_id'])) {
    $order_id = $_REQUEST['order_id'];

    // Step 1: Fetch all cart items for the order
    $stmt = mysqli_prepare($con, "SELECT prod_uin, quantity FROM cart WHERE order_id = ?");
    mysqli_stmt_bind_param($stmt, "s", $order_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if any cart items exist
    if (mysqli_num_rows($result) > 0) {
        // Step 2: Loop through each cart item and restore product quantities
        while ($row = mysqli_fetch_assoc($result)) {
            $prod_uin = $row['prod_uin'];
            $quantity = $row['quantity'];

            $update_product = mysqli_prepare($con, "UPDATE add_product SET prod_quant = prod_quant + ? WHERE prod_uin = ?");
            mysqli_stmt_bind_param($update_product, "is", $quantity, $prod_uin);
            mysqli_stmt_execute($update_product);
        }

        // Step 3: Update order status to 'Cancelled'
        $cancel_order = mysqli_prepare($con, "UPDATE bill_details SET order_stat = 'Cancelled' WHERE order_id = ?");
        mysqli_stmt_bind_param($cancel_order, "s", $order_id);
        $order_result = mysqli_stmt_execute($cancel_order);

        // Step 4: Update cart items status to 'Cancelled'
        $cancel_cart = mysqli_prepare($con, "UPDATE cart SET status = 'Cancelled' WHERE order_id = ?");
        mysqli_stmt_bind_param($cancel_cart, "s", $order_id);
        $cart_result = mysqli_stmt_execute($cancel_cart);

        if ($order_result && $cart_result) {
            echo "<script>
                alert('Your order has been cancelled. We hope to see you next time. Thanks');
                window.location.href = '../cart.php';
            </script>";
        } else {
            echo "Error cancelling order: " . mysqli_error($con);
        }

    } else {
        echo "No cart items found for this order.";
    }
}
?>
