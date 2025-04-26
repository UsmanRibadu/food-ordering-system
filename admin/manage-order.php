<?php include('partials/menu.php');

// Fetch all paid orders
$sql = "SELECT * FROM tbl_order WHERE status = 'Paid' AND delivered = 'No' ORDER BY order_date DESC";
$res = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Successful Orders</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9fb;
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
            padding: 12px;
            border: 1px solid #eee;
            text-align: center;
            vertical-align: middle;
            font-size: 11px;
        }

        th {
            background-color: #f5f5f5;
            font-weight: 600;
            font-size: 12px;
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
                font-size: 12px;
                padding: 10px 8px;
            }

            .container {
                padding: 15px;
            }
        }
        td:last-child{
            color:#0f0;
            font-weight:600;
        }
    </style>
</head>
<body>

<div class="success-banner">
    🎉 Payment Successful — Orders Overview
</div>

<div class="container">
    <h2 style="text-align: center;">List of Successful Orders</h2>

<?php
if ($res && mysqli_num_rows($res) > 0) {
    ?>
    <form action="update-delivery.php" method="POST">
    <table>
        <tr>
            <th>#</th>
            <th>Food</th>
            <th>Price (₦)</th>
            <th>Qty</th>
            <th>Total (₦)</th>
            <th>Customer</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Address</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delivered</th>
        </tr>

        <?php
        $sn = 1;
        while ($row = mysqli_fetch_assoc($res)) {
            ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo htmlspecialchars($row['food']); ?></td>
                <td><?php echo number_format($row['price'], 2); ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td><?php echo number_format($row['total'], 2); ?></td>
                <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
                <td><?php echo htmlspecialchars($row['customer_contact']); ?></td>
                <td><?php echo htmlspecialchars($row['customer_email']); ?></td>
                <td><?php echo htmlspecialchars($row['customer_address']); ?></td>
                <td><?php echo $row['order_date']; ?></td>
                <td><?php echo ($row['status'] == 'Paid') ? 'Paid✅' : 'NOT-PAID'; ?></td>
                <td>
                    <input 
                        type="checkbox" 
                        name="delivered_orders[]" 
                        value="<?php echo $row['id']; ?>"
                        <?php if($row['delivered'] == 'Yes') echo 'checked disabled'; ?>
                    >
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <div style="text-align:center; margin-top:20px;">
        <button type="submit" class="back-button">Update Delivered Status</button>
    </div>
    </form>
    <?php
} else {
    ?>
    <div class="no-orders">No successful orders found.</div>
    <?php
}
?>

</div>

</body>
</html>

<?php include('partials/footer.php'); ?>