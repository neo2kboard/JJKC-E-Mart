<?php

    if(isset($_GET['delete_admin'])){
        $delete_id = $_GET['delete_admin'];
        
        //delete query 
        $delete_admins = "Delete from `admin_user` where admin_id=$delete_id";
        $result_admin = mysqli_query($con, $delete_admins);
        if($result_admin){
            echo "<script>alert('Admin Deleted Successfully!')</script>";
            echo "<script>window.open('./index.php?list_admins', '_self')</script>";
        }
    }

?>

