<?php
// view-order.php
require __DIR__ . '/config/constants.php';

// Check if customer email is provided
if (isset($_GET['email'])) {
    $customer_email = mysqli_real_escape_string($conn, $_GET['email']);

    // Fetch orders for that email where status is 'Paid'
    $sql = "SELECT * FROM tbl_order WHERE customer_email = '$customer_email' AND status = 'Paid' ORDER BY order_date DESC";
    $res = mysqli_query($conn, $sql);
} else {
    $res = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Orders</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9fb;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #ff6600;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.3s ease;
        }
        .success-banner {
            background: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .container {
            width: 95%;
            max-width: 1100px;
            margin: 30px auto;
            background: #fff;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #eee;
            text-align: center;
        }

        th {
            background-color: #f5f5f5;
            font-weight: 600;
        }

        tr:hover {
            background-color: #f0f8ff;
        }

        .no-orders {
            text-align: center;
            margin-top: 40px;
            font-size: 1.2em;
            color: #555;
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .back-button:hover {
            background-color: #45a049;
        }

        @media (max-width: 768px) {
            th, td {
                font-size: 13px;
                padding: 10px 8px;
            }

            .container {
                padding: 15px;
            }
        }
        td:last-child {
            color: #0f0;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="success-banner">
    🎉 Payment Successful — Your Orders
</div>

<div class="container">
    <form action="" method="get">
        <input type="email" name="email" placeholder="Enter your email address to verify" class="form-control">
        <button type="submit">Verify Order</button>
    </form>
    <h2 style="text-align: center;">Here are your Paid Orders</h2>
<?php if ($res && mysqli_num_rows($res) > 0): ?>
    <table>
        <tr>
            <th>#</th>
            <th>Food</th>
            <th>Price (₦)</th>
            <th>Qty</th>
            <th>Total (₦)</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delivered</th>
        </tr>

        <?php
        $sn = 1;
        while ($row = mysqli_fetch_assoc($res)):
        ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo htmlspecialchars($row['food']); ?></td>
                <td><?php echo number_format($row['price'], 2); ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td><?php echo number_format($row['total'], 2); ?></td>
                <td><?php echo $row['order_date']; ?></td>
                <td><?php echo ($row['status'] == 'Paid') ? 'Success' : 'Failed'; ?></td>
                <td>
                    <?php echo ($row['delivered'] == 'Yes') ? '✅' : '❌'; ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <div class="no-orders">No successful orders found for your email.</div>
<?php endif; ?>
</div>

<div class="text-center">
 <p style="text-align:center;"><a href="index.php" class="back-button">Back to home</a></p>
</div>

</body>
</html>
