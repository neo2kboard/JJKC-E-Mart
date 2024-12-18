<?php

    if(isset($_GET['delete_category'])){
        $delete_id = $_GET['delete_category'];
        
        //delete query 
        $delete_categories = "Delete from `categories` where category_id=$delete_id";
        $result_categories = mysqli_query($con, $delete_categories);
        if($result_categories){
            echo "<script>alert('Category Deleted Successfully!')</script>";
            echo "<script>window.open('./index.php?view_categories', '_self')</script>";
        }
    }

?>

