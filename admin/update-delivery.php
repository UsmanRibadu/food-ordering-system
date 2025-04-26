<?php
include '../config/constants.php';

if (isset($_POST['delivered_orders'])) {
    foreach ($_POST['delivered_orders'] as $order_id) {
        $order_id = intval($order_id); // sanitize
        $sql = "UPDATE tbl_order SET delivered = 'Yes' WHERE id = $order_id";
        mysqli_query($conn, $sql);
    }
}

header('Location: manage-order.php');
exit;
?>
