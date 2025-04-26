
<?php include('partials/menu.php'); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>
                <br><br>
                <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>

                <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql = "SELECT * FROM tbl_category";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Categories
                </div>

                <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql2 = "SELECT * FROM tbl_food";
                        //Execute Query
                        $res2 = mysqli_query($conn, $sql2);
                        //Count Rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Items
                </div>
                <div class="col-4 text-center">

                <?php 
                        //Sql Query 
                    $sql2 = "SELECT * FROM tbl_order";
                         //Execute Query
                $res2 = mysqli_query($conn, $sql2);
                       //Count Rows
                    $count2 = mysqli_num_rows($res2);
                ?>

                <h1><?php echo $count2; ?></h1>
                    <br />
                    Orders-updates
            </div>
            <div class="col-4 text-center">

                <?php 
                        //Sql Query 
                    $sql2 = "SELECT * FROM tbl_admin";
                         //Execute Query
                $res2 = mysqli_query($conn, $sql2);
                       //Count Rows
                    $count2 = mysqli_num_rows($res2);
                ?>

                <h1><?php echo $count2; ?></h1>
                    <br />
                    Admins
            </div>

                
             
                    
                    <?php 
                        //Creat SQL Query to Get Total Revenue Generated
                        //Aggregate Function in SQL
                        $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

                        //Execute the Query
                        $res4 = mysqli_query($conn, $sql4);

                        //Get the VAlue
                        $row4 = mysqli_fetch_assoc($res4);
                        
                        //GEt the Total REvenue
                        $total_revenue = $row4['Total'];

                    ?>

                    
                    <br />
                    
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Main Content Setion Ends -->

<?php include('partials/footer.php') ?>
<style>
    /* Admin Dashboard Styling */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
}

.main-content {
    padding: 30px;
    background-color: #fff;
}

.wrapper {
    max-width: 1200px;
    margin: 0 auto;
}

h1 {
    font-size: 32px;
    color: #333;
    text-align: center;
    margin-bottom: 30px;
}

.col-4 {
    width: 23%;
    margin-right: 2%;
    display: inline-block;
    text-align: center;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    transition: all 0.3s ease;
}

.col-4:hover {
    transform: scale(1.05);
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
}

.dashboard-box {
    padding: 20px;
    background-color: #3498db;
    border-radius: 10px;
    color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 15px;
}

.dashboard-box h1 {
    font-size: 48px;
    margin-bottom: 10px;
}

.text-center {
    text-align: center;
}

.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

@media (max-width: 768px) {
    .col-4 {
        width: 48%;
        margin-right: 0;
        margin-bottom: 20px;
    }
}

@media (max-width: 480px) {
    .col-4 {
        width: 100%;
    }
}

</style>