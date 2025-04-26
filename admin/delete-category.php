<?php 
    //Include Constants File
    include('../config/constants.php');

    //echo "Delete Page";
    //Check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //Get the Value and Delete
        //echo "Get Value and Delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //Remove the physical image file is available
        if($image_name != "")
        {
            //Image is Available. So remove it
            $path = "../images/category/".$image_name;
            //REmove the Image
            $remove = unlink($path);

            //IF failed to remove image then add an error message and stop the process
            if($remove==false)
            {
                //Set the SEssion Message
                $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image.</div>";
                //REdirect to Manage Category page
                header('location:'.SITEURL.'admin/manage-food.php');
                //Stop the Process
                die();
            }
        }

        //Delete Data from Database
        //SQL Query to Delete Data from Database
        $sql = "DELETE FROM tbl_category WHERE id=$id";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the data is delete from database or not
        if($res==true)
        {
            //SEt Success MEssage and REdirect
            $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
            //Redirect to Manage Category
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            //SEt Fail MEssage and Redirecs
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Category.</div>";
            //Redirect to Manage Category
            header('location:'.SITEURL.'admin/manage-category.php');
        }

 

    }
    else
    {
        //redirect to Manage Category Page
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>
<style>
    /* Admin panel general styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f7f9;
    margin: 0;
    padding: 0;
}

/* Wrapper for the admin content */
.wrapper {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Page title */
h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
    font-size: 24px;
}

/* Success and error messages */
.success, .error {
    color: white;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
    font-size: 16px;
}

.success {
    background-color: #28a745;
}

.error {
    background-color: #dc3545;
}

/* Table for displaying category details */
.tbl-30 {
    width: 100%;
    margin-top: 30px;
    border-collapse: collapse;
}

.tbl-30 td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
    font-size: 16px;
    color: #555;
}

.tbl-30 input[type="text"], .tbl-30 input[type="file"] {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
}

.tbl-30 input[type="submit"] {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.tbl-30 input[type="submit"]:hover {
    background-color: #0056b3;
}

/* For the form fields (radio buttons for featured and active) */
input[type="radio"] {
    margin-right: 10px;
}

/* For the buttons under the table */
input[type="submit"].btn-secondary {
    background-color: #28a745;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"].btn-secondary:hover {
    background-color: #218838;
}

/* Footer styling */
footer {
    text-align: center;
    padding: 10px;
    background-color: #333;
    color: white;
    margin-top: 40px;
}

/* Responsive design */
@media (max-width: 768px) {
    .wrapper {
        width: 90%;
        padding: 15px;
    }

    .tbl-30 {
        font-size: 14px;
    }

    h1 {
        font-size: 22px;
    }
}

</style>