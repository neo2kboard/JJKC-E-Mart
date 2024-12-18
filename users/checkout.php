<!-- connect file -->
<?php
include('../includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website-Checkout page</title>
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
    <style>
    .navbar-nav .nav-link:hover {
        background-color: transparent !important;  
    }
    </style>
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
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../display_all.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_registration.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

     <!-- Second Child -->
     <nav class="navbar navbar-expand-lg navbar-light bg-secondary ">
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
                    
                    if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                                <a class='nav-link btn btn-outline-light text-white px-2 mx-2 rounded-3' 
                                href='user_login.php'>Login</a>
                                </li>";
                    }else{
                        echo "<li class='nav-item'>
                                <a class='nav-link btn btn-outline-light text-white px-2 mx-2 rounded-3' 
                                href='logout.php'>Logout</a>
                                </li>"; 
                    }
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
        <div class="col-md-12">
            <!-- Products Section -->
            <div class="row px-3">
                <?php
                    if(!isset($_SESSION['username'])){
                        include('user_login.php');
                    }else{
                        include('payment.php');
                    }
                ?>
            </div>
        </div>

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
