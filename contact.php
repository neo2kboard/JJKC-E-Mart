<?php
    include('includes/connect.php');
    include('functions/common_function.php');
    session_start();
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - JJKC Mini Mart</title>
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
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .contact-container {
            padding: 50px 0;
            max-width: 1200px;
            margin: 0 auto;
        }
        .contact-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .contact-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .contact-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 30%;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        .contact-card:hover {
            transform: translateY(-5px);
        }
        .contact-icon {
            font-size: 2rem;
            color: #28a745;
            margin-bottom: 15px;
        }
        .contact-info p {
            font-size: 1.1rem;
            color: #333;
        }
        .developer-info {
            margin-top: 50px;
            text-align: center;
            background-color: #28a745;
            color: white;
            padding: 40px;
            border-radius: 8px;
        }
        .developer-info h4 {
            margin-bottom: 15px;
        }
        .developer-info p {
            font-size: 1.2rem;
        }
        .social-icons a {
            color: white;
            margin: 0 10px;
            font-size: 1.5rem;
            text-decoration: none;
        }
        .social-icons a:hover {
            color: #f1f1f1;
        }
        /* Developer Profile Section */
        .developer-profile {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 30px;
        }
        .developer-profile .profile-card {
            text-align: center;
            width: 150px;
            transition: transform 0.3s ease;
        }
        .developer-profile .profile-card:hover {
            transform: scale(1.1);
        }
        .developer-profile img {
            width: 100%;
            border-radius: 50%;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }
        .developer-profile img:hover {
            transform: scale(1.1);
        }
        .developer-profile h5 {
            margin-bottom: 10px;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<div class="container--fluid p-0">
    <!-- First child -->
    <nav class="navbar navbar-expand-lg bg-success">
        <div class="container-fluid">
            <img src="./img/trolley.png" alt="" class="logo">&ensp;
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="display_all.php">Products</a>
                    </li>
                    <?php
                        if(isset($_SESSION['username'])){
                           echo "<li class='nav-item'>
                                <a class='nav-link' href='./users/profile.php'>My Account</a>
                                </li>"; 
                        }else{
                            echo "<li class='nav-item'>
                                <a class='nav-link' href='./users/user_registration.php'>Register</a>
                                </li>";  
                        } 
                    ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup> <?php
                            cart_item(); ?></sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
                    </li>
                </ul>
                <form class="d-flex" action="search_product.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" 
                        aria-label="Search" name="search_data">
                     <input type="submit" value="Search" class="btn btn-outline-light"
                        name="search_data_product">
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="contact-container">
        <div class="contact-header">
            <h1>Contact Us</h1>
            <p>We are here to help you! Reach out to us for any queries or concerns.</p>
        </div>

        <!-- Contact Information Cards -->
        <div class="contact-info">
            <!-- Contact Card 1: Address -->
            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <h4>Our Address</h4>
                <p>123 Mini Mart Street, City, Country</p>
            </div>

            <!-- Contact Card 2: Phone -->
            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <h4>Phone</h4>
                <p>+1 234 567 890</p>
            </div>

            <!-- Contact Card 3: Email -->
            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <h4>Email</h4>
                <p>support@jjkcminimart.com</p>
            </div>
        </div>

        <!-- Developer Information -->
        <div class="developer-info">
            <h4>Developed by:</h4>
            <p>Christian Olandria | Janice Cadisim | Junre Gamutan | Kimberly Ligan</p>
            <p>Web Developers at JJKC Mini Mart</p>
            <div class="developer-profile">
                <!-- Developer Profiles -->
                <div class="profile-card">
                    <img src="./developers/cute.jpg" alt="Developer 1">
                    <h5>Christian Olandria</h5>
                    <div class="social-icons">
                        <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="profile-card">
                    <img src="./developers/janis.jpg" alt="Developer 2">
                    <h5>Janice Cadisim</h5>
                    <div class="social-icons">
                        <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="profile-card">
                    <img src="./developers/junre.jpg" alt="Developer 3">
                    <h5>Junre Gamutan</h5>
                    <div class="social-icons">
                        <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="profile-card">
                    <img src="./developers/kim.jpg" alt="Developer 4">
                    <h5>Kimberly Ligan</h5>
                    <div class="social-icons">
                        <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
</body>
</html>
