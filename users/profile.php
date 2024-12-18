<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
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
    <link rel="stylesheet" href="../style.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- Custom CSS -->
     <?php include('../styles_php/profile_style.php'); ?>
</head>
<body>

<!-- Navbar -->
<div class="container--fluid p-0">
    <!-- First child -->
    <nav class="navbar navbar-expand-lg bg-success">
        <div class="container-fluid">
            <img src="../img/trolley.png" alt="" class="logo">&ensp;
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../display_all.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="profile.php">My Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup> <?php
                            cart_item(); ?></sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
                    </li>
                </ul>
                <form class="d-flex" action="../search_product.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" 
                        aria-label="Search" name="search_data">
                     <input type="submit" value="Search" class="btn btn-outline-light"
                        name="search_data_product">
                </form>
            </div>
        </div>
    </nav>

    <!-- calling cart function -->
    <?php
        cart();
    ?>

    <!-- Second Child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary py-2">
        <div class="container-fluid justify-content-between">
            <!-- Left-aligned Links -->
            <ul class="navbar-nav d-flex flex-row">
                <?php
                    if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                                <a class='nav-link btn btn-outline-light text-white px-2 mx-2 rounded-3' 
                                href='#'>Welcome</a>
                                </li>";
                    }else{
                        echo "<li class='nav-item'>
                                <a class='nav-link btn btn-outline-light text-white px-2 mx-2 rounded-3' 
                                href='#'>Welcome ".$_SESSION['username']."</a>
                                </li>"; 
                    }

                    // if(!isset($_SESSION['username'])){
                    //     echo "<li class='nav-item'>
                    //             <a class='nav-link btn btn-outline-light text-white px-2 mx-2 rounded-3' 
                    //             href='user_login.php'>Login</a>
                    //             </li>";
                    // }else{
                    //     echo "<li class='nav-item'>
                    //             <a class='nav-link btn btn-outline-light text-white px-2 mx-2 rounded-3' 
                    //             href='logout.php'>Logout</a>
                    //             </li>"; 
                    // }
                ?>
            </ul>

        </div>
    </nav>

    <!-- Third Child -->
    <div class="bg-light">
        <h3 class="text-center">JJKC E-Mart</h3>
        <p class="text-center">All Goods are Here, In House and Online</p>
    </div>

    <!-- Fourth Child -->
     <div class="row">
        <div class="col-md-2 p-0">
            <ul class="navbar-nav bg-secondary text-center">
                <li class="nav-item bg-success ">
                    <a class="nav-link text-light" href="#"><h4>Your Profile</h4></a>
                </li>

                <?php

                    $username = $_SESSION['username'];
                    $user_image = "Select * from `user_table` where username = '$username'";
                    $result_image = mysqli_query($con, $user_image);
                    $row_image = mysqli_fetch_array($result_image);
                    $user_images = $row_image['user_image'];
                    echo "<li class='nav-item'>
                            <img src='./user_img/$user_images' class='profile_img' alt=''>
                            </li>";

                ?>

                <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php"><h4>Pending Orders</h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php?edit_account"><h4>Edit Account</h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php?my_orders"><h4>My Orders</h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php?delete_account"><h4>Delete Account</h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-light text-white px-2 mx-2 rounded-3" 
                        style="font-family: 'Poppins', sans-serif; font-size: 18px" 
                        href="#" onclick="showLogoutModal()">Logout</a>
                </li>
                <?php include('../styles_php/profile_logout_modal.php'); ?>

            </ul>
        </div>
        <div class="col-md-10 text-center">
            <?php 
                get_user_order_details();
                if(isset($_GET['edit_account'])){
                    include('edit_account.php');
                }
                if(isset($_GET['my_orders'])){
                    include('user_orders.php');
                }
                if(isset($_GET['delete_account'])){
                    include('delete_account.php');
                }
            ?>
        </div>
     </div>

    <!-- Last Child -->
    <?php include('../includes/footer.php'); ?>

</div>

<!-- Bootstrap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
</body>
</html>


