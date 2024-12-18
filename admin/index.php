<?php
include('../includes/connect.php');
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['admin_username'])) {
    // Redirect to the login page if not logged in
    header("Location: ../user_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Google Fonts Link (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS File -->
    <link rel="stylesheet" href="style.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-success">
            <div class="container-fluid">
                <img src="../img/trolley.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">Welcome <?php echo $_SESSION['admin_username']; ?></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- Admin Dashboard -->
        <div class="bg-light">
            <br><h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- Admin Buttons and Actions -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5">
                    <a href="#"><img src="../img/pj.png" alt="" class="admin_img"></a>
                    <p class="text-light text-center"><?php echo $_SESSION['admin_username']; ?></p>
                </div>

                <div class="button text-center">
                    <button class="btn btn-success my-3 mx-2">
                        <a href="insert_product.php" class="text-light">Insert Products</a>
                    </button>

                    <button class="btn btn-success my-2 mx-2">
                        <a href="index.php?view_products" class="text-light">View Products</a>
                    </button>
                    
                    <button class="btn btn-success my-2 mx-2">
                        <a href="index.php?insert_category" class="text-light">Insert Categories</a>
                    </button>

                    <button class="btn btn-success my-2 mx-2">
                        <a href="index.php?view_categories" class="text-light">View Categories</a>
                    </button>

                    <button class="btn btn-success my-2 mx-2">
                        <a href="index.php?insert_brand" class="text-light">Insert Brands</a>
                    </button>

                    <button class="btn btn-success my-2 mx-2">
                        <a href="index.php?view_brands" class="text-light">View Brands</a>
                    </button>
                    
                    <button class="btn btn-success my-2 mx-2">
                        <a href="index.php?list_orders" class="text-light">All Orders</a>
                    </button>

                    <button class="btn btn-success my-2 mx-2">
                        <a href="index.php?list_payments" class="text-light">All Payments</a>
                    </button>

                    <button class="btn btn-success my-2 mx-2">
                        <a href="index.php?list_users" class="text-light">Users List</a>
                    </button>

                    <button class="btn btn-success my-2 mx-2">
                        <a href="index.php?insert_admin" class="text-light">Insert Admins</a>
                    </button>

                    <button class="btn btn-success my-2 mx-2">
                        <a href="index.php?list_admins" class="text-light">Admin List</a>
                    </button>

                    <!-- Logout Button -->
                    <button class="btn btn-danger my-2 mx-2" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <a href="#" class="text-light">Logout</a>
                    </button>
                </div>
            </div>

            <!-- Modal for Logout Confirmation -->
            <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to log out?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="../users/logout.php" class="btn btn-danger">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Content Sections -->
        <div class="container my-4">
            <?php
                if(isset($_GET['insert_category'])){
                    include('insert_categories.php');
                }
            
                if(isset($_GET['insert_brand'])){
                    include('insert_brands.php');
                }

                if(isset($_GET['insert_admin'])){
                    include('insert_admins.php');
                }

                if(isset($_GET['view_products'])){
                    include('view_products.php');
                }

                if(isset($_GET['edit_products'])){
                    include('edit_products.php');
                }

                if(isset($_GET['view_categories'])){
                    include('view_categories.php');
                }

                if(isset($_GET['view_brands'])){
                    include('view_brands.php');
                }

                if(isset($_GET['edit_category'])){
                    include('edit_category.php');
                }

                if(isset($_GET['edit_brand'])){
                    include('edit_brand.php');
                }

                if(isset($_GET['delete_category'])){
                    include('delete_category.php');
                }

                if(isset($_GET['delete_brand'])){
                    include('delete_brand.php');
                }

                if(isset($_GET['delete_product'])){
                    include('delete_product.php');
                }


                if(isset($_GET['list_orders'])){
                    include('list_orders.php');
                }

                if(isset($_GET['list_payments'])){
                    include('list_payments.php');
                }

                if(isset($_GET['list_users'])){
                    include('list_users.php');
                }

                if(isset($_GET['list_admins'])){
                    include('list_admins.php');
                }

                if(isset($_GET['edit_admin'])){
                    include('edit_admin.php');
                }

                if(isset($_GET['delete_order'])){
                    include('delete_order.php');
                }

                if(isset($_GET['delete_payment'])){
                    include('delete_payment.php');
                }

                if(isset($_GET['delete_user'])){
                    include('delete_user.php');
                } 
                
                if(isset($_GET['delete_admin'])){
                    include('delete_admin.php');
                } 

            ?>
            
        </div>
    </div>

    <!-- Bootstrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>
</html>
