<?php
require __DIR__ . '/config/constants.php';
date_default_timezone_set('Africa/Lagos');

if (!isset($_SESSION['checkout_data'])) {
    echo "No order data found.";
    exit;
}

$order = $_SESSION['checkout_data'];

// Simulate payment gateway response (since it's test mode)
$tx_ref = $_GET['tx_ref'] ?? 'N/A';
$transaction_id = 'TRX-' . time(); // You can fetch the real transaction_id via Flutterwave API if needed
$amount = $order['total'];
$currency = 'NGN';
$payment_status = 'successful'; // In live mode, verify this
$response_data = json_encode($_GET); // For debugging or tracking

// 1. Insert order into tbl_order
$order_date = date("Y-m-d H:i:s");
$status = "Paid";

$sql_order = "INSERT INTO tbl_order SET
    food = '{$order['food']}',
    price = {$order['price']},
    qty = {$order['qty']},
    total = {$order['total']},
    order_date = '$order_date',
    status = '$status',
    customer_name = '{$order['customer_name']}',
    customer_contact = '{$order['customer_contact']}',
    customer_email = '{$order['customer_email']}',
    customer_address = '{$order['customer_address']}'";

$res_order = mysqli_query($conn, $sql_order);
$order_id = mysqli_insert_id($conn); // get the new order ID

// 2. Log the transaction
$sql_tx = "INSERT INTO tbl_transaction SET
    transaction_id = '$transaction_id',
    tx_ref = '$tx_ref',
    amount = $amount,
    currency = '$currency',
    payment_status = '$payment_status',
    customer_email = '{$order['customer_email']}',
    customer_name = '{$order['customer_name']}',
    order_id = $order_id,
    response_data = '$response_data',
    created_at = NOW()";

$res_tx = mysqli_query($conn, $sql_tx);

// 3. Cleanup
unset($_SESSION['checkout_data']);

// 4. Display confirmation
if ($res_order && $res_tx) {
    // Redirect to view orders with email as identifier
    $email = urlencode($order['customer_email']);
    header("Location: view-orders.php?email=$email");
    exit();
} else {
    echo "<h2>Something went wrong saving your order. Please contact support.</h2>";
}

?>
