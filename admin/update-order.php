<?php include('partials/menu.php'); ?>
<head>
    <style>
        .order-form {
    max-width: 600px;
    margin: auto;
    padding: 20px;
    background: #f8f8f8;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.order-form .form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
}

.order-form label {
    font-weight: bold;
    margin-bottom: 5px;
}

.order-form input[type="text"],
.order-form input[type="number"],
.order-form select,
.order-form textarea {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.btn-secondary {
    background-color: #5cb85c;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-secondary:hover {
    background-color: #4cae4c;
}

    </style>
</head>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>
        <?php 
        
            //CHeck whether id is set or not
            if(isset($_GET['id']))
            {
                //GEt the Order Details
                $id=$_GET['id'];

                //Get all other details based on this id
                //SQL Query to get the order details
                $sql = "SELECT * FROM tbl_order WHERE id=$id";
                //Execute Query
                $res = mysqli_query($conn, $sql);
                //Count Rows
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //Detail Availble
                    $row=mysqli_fetch_assoc($res);

                    $food = $row['food'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address= $row['customer_address'];
                }
                else
                {
                    //DEtail not Available/
                    //Redirect to Manage Order
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
            else
            {
                //REdirect to Manage ORder PAge
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        
        ?>
        
       <form action="" method="POST" class="order-form">

    <div class="form-group">
        <label>Food Name:</label>
        <div><strong><?php echo $food; ?></strong></div>
    </div>

    <div class="form-group">
        <label>Price:</label>
        <div><strong>₦ <?php echo $price; ?></strong></div>
    </div>

    <div class="form-group">
        <label for="qty">Qty:</label>
        <input type="number" id="qty" name="qty" value="<?php echo $qty; ?>">
    </div>

    <div class="form-group">
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
            <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
            <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
            <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
        </select>
    </div>

    <div class="form-group">
        <label for="customer_name">Customer Name:</label>
        <input type="text" id="customer_name" name="customer_name" value="<?php echo $customer_name; ?>">
    </div>

    <div class="form-group">
        <label for="customer_contact">Customer Contact:</label>
        <input type="text" id="customer_contact" name="customer_contact" value="<?php echo $customer_contact; ?>">
    </div>

    <div class="form-group">
        <label for="customer_email">Customer Email:</label>
        <input type="text" id="customer_email" name="customer_email" value="<?php echo $customer_email; ?>">
    </div>

    <div class="form-group">
        <label for="customer_address">Customer Address:</label>
        <textarea id="customer_address" name="customer_address" cols="30" rows="5"><?php echo $customer_address; ?></textarea>
    </div>

    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="price" value="<?php echo $price; ?>">

    <div class="form-group">
        <input type="submit" name="submit" value="Update Order" class="btn-secondary">
    </div>

</form>



        <?php 
            //CHeck whether Update Button is Clicked or Not
            if(isset($_POST['submit']))
            {
                //echo "Clicked";
                //Get All the Values from Form
                $id = $_POST['id'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];

                $total = $price * $qty;

                $status = $_POST['status'];

                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];

                //Update the Values
                $sql2 = "UPDATE tbl_order SET 
                    qty = $qty,
                    total = $total,
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'
                    WHERE id=$id
                ";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //CHeck whether update or not
                //And REdirect to Manage Order with Message
                if($res2==true)
                {
                    //Updated
                    $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
                else
                {
                    //Failed to Update
                    $_SESSION['update'] = "<div class='error'>Failed to Update Order.</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
        ?>


    </div>
</div>

<?php include('partials/footer.php'); ?>
