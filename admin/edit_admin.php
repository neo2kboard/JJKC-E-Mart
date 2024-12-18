<?php include('admincss/insert_brands_style.php'); ?>

<?php

    if(isset($_GET['edit_admin'])){
        $edit_admin = $_GET['edit_admin'];
        
        $get_admins = "Select * from `admin_user` where admin_id = $edit_admin";
        $result = mysqli_query($con, $get_admins);
        $row = mysqli_fetch_assoc($result);
        $admin_username = $row['admin_username'];
    }

    if(isset($_POST['edit_admin'])){
        $admin_username = $_POST['admin_username'];

        $update_query = "update `admin_user` set admin_username = '$admin_username'
                            where admin_id = $edit_admin";
        $result_admin = mysqli_query($con, $update_query);
        if($result_admin){
            echo "<script>alert('Admin Updated Successfully!')</script>";
            echo "<script>window.open('./index.php?list_admins','_self')</script>";
        }

    }

?>


<h3 class="text-center">Edit Admin</h3>

<form action="" method="post" class="mb-2">
    <label for="admin_username" class="form-label" style= "font-family: 'Poppins', sans-serif">Admin Username</label>
        <div class="input-group w-90 mb-2">
            <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-users"></i></span>
            <input type="text" class="form-control" name="admin_username" name="admin_username" aria-label="Admin" 
                aria-describedby="basic-addon1" required value='<?php echo $admin_username; ?>'>
        </div>

        <div class="input-group w-10 mb-2 m-auto">
            <input type="submit" class="form-control bg-success" name="edit_admin" 
                value="Update Admin">
        </div>
</form>