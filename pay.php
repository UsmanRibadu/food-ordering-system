<?php
require __DIR__ . '/keys.php'; // contains $secret_key

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    // Collect order details
    $food = $_POST['food'];
    $price = floatval($_POST['price']);
    $qty = intval($_POST['qty']);
    $total = $price * $qty;

    $customer_name = $_POST['full-name'];
    $customer_contact = $_POST['contact'];
    $customer_email = $_POST['email'];
    $customer_address = $_POST['address'];

    // Save details to session (for use after payment)
    $_SESSION['checkout_data'] = compact('food', 'price', 'qty', 'total', 'customer_name', 'customer_contact', 'customer_email', 'customer_address');

    // Flutterwave payment setup
    $tx_ref = 'TX-' . time();
    $redirect_url = 'http://localhost/raufaz/payment-success.php'; // change if deployed

    $data = [
        'tx_ref' => $tx_ref,
        'amount' => $total,
        'currency' => 'NGN',
        'redirect_url' => $redirect_url,
        'customer' => [
            'email' => $customer_email,
            'name' => $customer_name
        ],
        'customizations' => [
            'title' => 'Food Order Payment',
            'description' => $food
        ]
    ];

    // cURL to Flutterwave
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.flutterwave.com/v3/payments",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer $secret_key",
            "Content-Type: application/json"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        echo "cURL Error: " . $err;
        exit;
    }

    $result = json_decode($response, true);

    if ($result && $result['status'] === 'success') {
        header("Location: " . $result['data']['link']);
        exit;
    } else {
        echo "<pre>Payment failed to initialize:\n" . print_r($result, true) . "</pre>";
        exit;
    }
} else {
    echo "Invalid access.";
}
