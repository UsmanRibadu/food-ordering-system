<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <h4>Food Ordering App</h4>
                </a>
            </div>
            
            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>apply.php">Catering Training</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>view-orders.php">My Order</a>
                    </li>
                </ul>
            </div>
            <h2 style="font-size:40px; font-family: Arial, sans-serif text-align:center; margin: top 400px; text-shadow: #000; color:RED;"> 
            <marquee behavior="" direction="rtl">WELCOME TO RAUFAZ KITCHEN</marquee>
        </h2>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->