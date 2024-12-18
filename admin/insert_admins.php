<?php 
    include('../includes/connect.php');

    if(isset($_POST['insert_admin'])){
        $admin_username = $_POST['admin_username'];
        $admin_password = $_POST['admin_password'];
        $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);

        // Select data from the database
        $select_query = "SELECT * FROM `admin_user` WHERE admin_username='$admin_username'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);
        if($number > 0){
            echo "<script>alert('Admin Already Exists!')</script>"; 
        } else { 
            $insert_query = "INSERT INTO `admin_user` (admin_username, admin_password) VALUES ('$admin_username', '$hash_password')";
            $result = mysqli_query($con, $insert_query);
            if($result){
                echo "<script>alert('Admin Inserted Successfully!')</script>";
            }
        }
    }
?>

<h3 class="text-center">Insert Admins</h3>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-users"></i></span>
        <input type="text" class="form-control" name="admin_username" placeholder="Insert Username" 
        aria-label="admins" aria-describedby="basic-addon1" autocomplete="off">
    </div>
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
        <input type="password" class="form-control" name="admin_password" id="admin_password" placeholder="Insert Password" 
        aria-label="admins" aria-describedby="basic-addon1">
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="user_password_checkbox" onclick="togglePasswordVisibility()">
        <label class="form-check-label" for="user_password_checkbox">
            Show password
        </label>
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="form-control bg-success" name="insert_admin" value="Insert Admin">
    </div>
</form>

<?php include('admincss/insert_brands_style.php'); ?>
