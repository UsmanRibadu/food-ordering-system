<?php
require 'config/constants.php';
require 'keys.php';

if (isset($_GET['transaction_id'])) {
    $transactionId = $_GET['transaction_id']; // Extract the transaction ID
    $status = $_GET['status']; // Extract the status

    // Now you can use the transaction ID to verify the payment
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$transactionId}/verify",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $secret_key"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $response_data = json_decode($response, true);
        if ($response_data['status'] == "success" && $response_data['data']['status'] == "successful") {
            // Payment is successful, update your database

            $transactionId = $response_data['data']['id'];
            $amount = $response_data['data']['amount'];
            $currency = $response_data['data']['currency'];
            $customerEmail = $response_data['data']['customer']['email'];

            $sql = "INSERT INTO tbl_transactions (transaction_id, amount, currency, customer_email, status) VALUES ('$transactionId', '$amount', '$currency', '$customerEmail', 'paid')";

            if ($conn->query($sql) === TRUE) {
                // Display success message and redirect to dashboard.php after 5 seconds
                echo "<h2 style='color:green';'text-align:center';>Payment successful! Redirecting to your dashboard...</h2>";
                echo "<script>
                        setTimeout(function() {
                            window.location.href = 'dashboard.php';
                        }, 3000); // 3 seconds
                      </script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        } else {
            // Payment is not successful
            echo "Payment verification failed! Response: " . print_r($response_data, true);
        }
    }
} else {
    echo "Transaction ID not found!";
}
