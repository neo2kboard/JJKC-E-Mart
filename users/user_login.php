<?php 
include('../includes/connect.php'); 
include('../functions/common_function.php'); 
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Google Fonts Link (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body>

    <?php include('../styles_php/user_login_style.php'); ?>

    <div class="container-fluid">
        <div class="login-container">
            <h2 class="text-center mt-2 mb-6">Login</h2>
            
            <form action="" method="post">
                <div class="mb-4 form-group">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter your username" 
                        autocomplete="off" required="required" name="user_username">
                </div>

                <div class="mb-4 form-group">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password" 
                        autocomplete="off" required="required" name="user_password">
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="user_password_checkbox" onclick="togglePasswordVisibility('user_password')">
                        <label class="form-check-label" for="user_password_checkbox">
                            Show password
                        </label>
                    </div>
                </div>

                <div class="mt-3">
                    <input type="submit" value="Login" class="btn py-2" name="user_login">
                    <p class="small fw-bold mt-2 pt-1 mb-4 text-center">Don't have an account? 
                            <a href="user_registration.php" class="text-danger"> Register</a></p>
                </div>

            </form>
        </div>
    </div>

</body>
</html>

<?php

    if(isset($_POST['user_login'])){
        $user_username = $_POST['user_username'];
        $user_password = $_POST['user_password'];

        // Check if the login attempt is for admin user
        $select_admin_query = "SELECT * FROM `admin_user` WHERE admin_username = '$user_username'";
        $result_admin = mysqli_query($con, $select_admin_query);
        $row_admin = mysqli_fetch_assoc($result_admin);
        $admin_row_count = mysqli_num_rows($result_admin);

        // Check if the login attempt is for regular user
        $select_user_query = "SELECT * FROM `user_table` WHERE username = '$user_username'";
        $result_user = mysqli_query($con, $select_user_query);
        $row_user = mysqli_fetch_assoc($result_user);
        $user_row_count = mysqli_num_rows($result_user);

        $user_ip = getIPAddress();

        // Check if the cart is not empty for user
        $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address = '$user_ip'";
        $select_cart = mysqli_query($con, $select_query_cart);
        $row_count_cart = mysqli_num_rows($select_cart);

        if ($admin_row_count > 0) {
            // If it's an admin, check hashed password
            if (password_verify($user_password, $row_admin['admin_password'])) {
                $_SESSION['admin_username'] = $user_username;
                echo "<script>alert('Admin Login Successful!')</script>";
                echo "<script>window.open('../admin/index.php','_self')</script>"; 
            } else {
                echo "<script>alert('Invalid Admin Credentials!')</script>";
            }
        } elseif ($user_row_count > 0) {
            // If it's a regular user, check hashed password
            if (password_verify($user_password, $row_user['user_password'])) {
                // For user with cart items or without
                $_SESSION['username'] = $user_username;
                if ($user_row_count == 1 && $row_count_cart == 0) {
                    echo "<script>alert('Login Successful!')</script>";
                    echo "<script>window.open('profile.php','_self')</script>"; 
                } else {
                    echo "<script>alert('Login Successful!')</script>";
                    echo "<script>window.open('payment.php','_self')</script>"; 
                }
            } else {
                echo "<script>alert('Invalid User Credentials!')</script>";
            }
        } else {
            echo "<script>alert('Invalid Username or Password!')</script>";
        }
    }

?>
  
