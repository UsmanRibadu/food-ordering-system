<?php include('partials/menu.php'); ?>

<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food-order";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch applicants from database
$sql = "SELECT * FROM catering_applications ORDER BY application_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Applicants List</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f6f6f6;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .no-data {
            text-align: center;
            font-size: 18px;
            margin-top: 40px;
            color: #777;
        }
    </style>
</head>
<body>

<h2>Catering Training Applicants</h2>

<?php if ($result->num_rows > 0): ?>
    <table>
        <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Experience</th>
            <th>Reason</th>
            <th>Applied On</th>
        </tr>
        <?php $sn = 1; while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                <td><?php echo htmlspecialchars($row['experience_level']); ?></td>
                <td><?php echo htmlspecialchars($row['reason_for_applying']); ?></td>
                <td><?php echo date('d M Y, h:i A', strtotime($row['application_date'])); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <div class="no-data">No applicants found.</div>
<?php endif; ?>

<?php
$conn->close();
?>

</body>
</html>

<?php include('partials/footer.php'); ?>
