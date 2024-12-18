<?php

    if(isset($_GET['edit_account'])){
        $user_session_name = $_SESSION['username'];
        $select_query = "SELECT * FROM `user_table` WHERE username = '$user_session_name'";
        $result_query = mysqli_query($con, $select_query);
        $row_fetch = mysqli_fetch_assoc($result_query);
        $user_id = $row_fetch['user_id'];
        $username = $row_fetch['username'];
        $user_email = $row_fetch['user_email'];
        $user_address = $row_fetch['user_address'];
        $user_mobile = $row_fetch['user_mobile'];
        $user_image = $row_fetch['user_image']; 
    }

    if(isset($_POST['user_update'])){
        $update_id = $user_id;
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];

        // Handle the image update (only if a new image is uploaded)
        if(!empty($_FILES['user_image']['name'])){
            $user_image = $_FILES['user_image']['name'];
            $user_image_tmp = $_FILES['user_image']['tmp_name'];
            move_uploaded_file($user_image_tmp, "./user_img/$user_image");
        } else {
            // If no new image is uploaded, use the existing image
            $user_image = $row_fetch['user_image'];
        }

        // Update query
        $update_data = "UPDATE `user_table` SET username='$username', user_email='$user_email',
                        user_image='$user_image', user_address='$user_address', 
                        user_mobile='$user_mobile' WHERE user_id=$update_id";
        $result_query_update = mysqli_query($con, $update_data);
        
        if($result_query_update){
            echo "<script>alert('Data Updated Successfully!')</script>";
            echo "<script>window.open('logout.php', '_self')</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <!-- Custom CSS -->
    <?php include('../styles_php/profile_style.php'); ?>
    <?php include('../styles_php/edit_acc_style.php'); ?>
</head>
<body>

<div class="container">
    <h3 class="edit_acc text-center text-success mb-4">Edit Account</h3>

    <!-- Form Container -->
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Username Input -->
            <div class="form-outline mb-4">
                <input type="text" class="form-control w-100" value="<?php echo $username ?>" name="username">
            </div>

            <!-- Email Input -->
            <div class="form-outline mb-4">
                <input type="email" class="form-control w-100" value="<?php echo $user_email ?>" name="user_email">
            </div>

            <!-- Image Upload and Preview -->
            <div class="form-outline mb-4 d-flex flex-column align-items-center">
                <div class="file-upload">
                    <input type="file" name="user_image" id="user_image" />
                    <label for="user_image">Choose Profile Picture</label>
                </div>
                <img src="./user_img/<?php echo $user_image ?>" alt="" class="edit_img" width="100" height="100"> 
            </div>

            <!-- Address Input -->
            <div class="form-outline mb-4">
                <input type="text" class="form-control w-100" value="<?php echo $user_address ?>" name="user_address">
            </div>

            <!-- Mobile Number Input -->
            <div class="form-outline mb-4">
                <input type="text" class="form-control w-100" value="<?php echo $user_mobile ?>" name="user_mobile">
            </div>

            <!-- Update Button -->
            <input type="submit" value="Update" class="btn btn-success" name="user_update">
        </form>
    </div>
</div>

<!-- Bootstrap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
</body>
</html>
