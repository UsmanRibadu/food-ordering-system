<?php 
    //Include COnstants Page
    include('../config/constants.php');

    //echo "Delete Food Page";

     
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
            $path = "../images/food/".$image_name;
            //REmove the Image
            $remove = unlink($path);

            //IF failed to remove image then add an error message and stop the process
            if($remove==false)
            {
                //Set the SEssion Message
                $_SESSION['remove'] = "<div class='error'>Failed to Remove food Image.</div>";
                //REdirect to Manage food page
                header('location:'.SITEURL.'admin/manage-food.php');
                //Stop the Process
                die();
            }
        }

        //Delete Data from Database
        //SQL Query to Delete Data from Database
        $sql = "DELETE FROM tbl_food WHERE id=$id";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the data is delete from database or not
        if($res==true)
        {
            //SEt Success MEssage and REdirect
            $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully.</div>";
            //Redirect to Manage food
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            //SEt Fail MEssage and Redirecs
            $_SESSION['delete'] = "<div class='error'>Failed to Delete food.</div>";
            //Redirect to Manage food
            header('location:'.SITEURL.'admin/manage-food.php');
        }

 

    }
    else
    {
        //redirect to Manage food Page
        header('location:'.SITEURL.'admin/manage-food.php');
    }

?>