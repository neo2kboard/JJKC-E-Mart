<?php

    if(isset($_GET['delete_order'])){
        $delete_id = $_GET['delete_order'];
        
        //delete query 
        $delete_orders = "Delete from `user_orders` where order_id=$delete_id";
        $result_orders = mysqli_query($con, $delete_orders);
        if($result_orders){
            echo "<script>alert('Order Deleted Successfully!')</script>";
            echo "<script>window.open('./index.php?list_orders', '_self')</script>";
        }
    }

?>

