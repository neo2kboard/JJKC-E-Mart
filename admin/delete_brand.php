<?php

    if(isset($_GET['delete_brand'])){
        $delete_id = $_GET['delete_brand'];
        
        //delete query 
        $delete_brands = "Delete from `brands` where brand_id=$delete_id";
        $result_brands = mysqli_query($con, $delete_brands);
        if($result_brands){
            echo "<script>alert('Brand Deleted Successfully!')</script>";
            echo "<script>window.open('./index.php?view_brands', '_self')</script>";
        }
    }

?>

