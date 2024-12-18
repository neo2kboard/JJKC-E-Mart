<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <?php include('../styles_php/delete_account_style.php') ?>
</head>
<body>
    <div class="container">
        <h3 class="del text-danger mb-4">Delete Account</h3>
        <form id="deleteForm" action="" method="post" class="mt-5">
            <div class="form-outline mb-4">
                <!-- Button to trigger confirmation modal -->
                <button type="button" class="btn_del btn-danger w-100" onclick="showConfirmationModal()">Delete Account</button>
            </div>
            <div class="form-outline mb-4">
                <input type="submit" class="btn_del btn-secondary w-100" name="dont_delete" value="Don't Delete Account">
            </div>
        </form>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmationModal" style="display:none;" class="modal">
        <div class="modal-content">
            <h4>Are you sure you want to delete your account?</h4>
            <p>This action cannot be undone.</p>
            <button onclick="confirmDelete()" class="btn btn-danger">Yes, Delete Account</button>
            <button onclick="closeModal()" class="btn btn-secondary">Cancel</button>
        </div>
    </div>

</body>
</html>

<?php
   
    if (isset($_POST['delete'])) {

        $username_session = $_SESSION['username'];

        $query = "SELECT user_image FROM user_table WHERE username = '$username_session'";
        $result = mysqli_query($con, $query);
        
        if ($result) {
            $user = mysqli_fetch_assoc($result);
            $user_image = $user['user_image']; 

            
            $image_path = './user_img/' . $user_image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        $delete_query = "DELETE FROM user_table WHERE username = '$username_session'";

        $delete_result = mysqli_query($con, $delete_query);

        if ($delete_result) {
            session_destroy();
            echo "<script>alert('Account Deleted Successfully!')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        } else {
            echo "<script>alert('Error deleting account. Please try again.')</script>";
        }
    }

    if (isset($_POST['dont_delete'])) {
        echo "<script>window.open('profile.php','_self')</script>";
    }
?>

<script>
    function showConfirmationModal() {
        document.getElementById('confirmationModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('confirmationModal').style.display = 'none';
    }

    function confirmDelete() {
        var form = document.getElementById('deleteForm');
        
        var hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'delete';  
        form.appendChild(hiddenInput);

        form.submit();
    }
</script>
