<!-- connect file -->
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
    <title>Ecommerce Website-Cart details</title>
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
    <?php include('./styles_php/cart_style.php'); ?>
    
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
                        <li class="nav-item">
                            <a class="nav-link" href="./users/user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup> <?php
                                cart_item(); ?></sup></a>
                        </li>
                    </ul>
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
                        
                        if(!isset($_SESSION['username'])){
                            echo "<li class='nav-item'>
                                    <a class='nav-link btn btn-outline-light text-white px-2 mx-2 rounded-3' 
                                    href='./users/user_login.php'>Login</a>
                                    </li>";
                        }else{
                            echo "<li class='nav-item'>
                                    <a class='nav-link btn btn-outline-light text-white px-2 mx-2 rounded-3' 
                                    href='./users/logout.php'>Logout</a>
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

        <!-- Fourth child-table -->
        <div class="container">
            <div class="bg-light">
                <div class="row">
                    <form action="" method="post">
                        <table class="table table-bordered text-center">
                            <!-- php code to display dynamic data -->
                            <?php
                            $get_ip_add = getIPAddress();
                            $total_price = 0;
                            $cart_query = "Select * from `cart_details` where ip_address= '$get_ip_add'";
                            $result = mysqli_query($con, $cart_query);
                            $result_count = mysqli_num_rows($result);
                            if ($result_count > 0) {
                                echo "       
                                <thead>
                                    <tr>
                                        <th>Product Title</th>
                                        <th>Product Image</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Remove</th>
                                        <th colspan='2'>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>";

                                while ($row = mysqli_fetch_array($result)) {
                                    $product_id = $row['product_id'];
                                    $select_products = "Select * from `products` where product_id= '$product_id'";
                                    $result_products = mysqli_query($con, $select_products);
                                    while ($row_product_price = mysqli_fetch_array($result_products)) {
                                        $product_price = $row_product_price['product_price'];
                                        $price_table = $product_price;
                                        $product_title = $row_product_price['product_title'];
                                        $product_image1 = $row_product_price['product_image1'];
                                        $product_quantity = $row['quantity'];
                                        $total_product_price = $product_quantity * $product_price;
                                        $total_price += $total_product_price;
                            ?>
                            <tr>
                                <td><?php echo $product_title ?></td>
                                <td><img src="./admin/product_images/<?php echo $product_image1 ?>"
                                        class="img-fluid" style="max-width: 100px; max-height: 100px;" alt=""
                                        class="cart_img"></td>
                                <td><input type="number" name="qty[<?php echo $product_id ?>]" class="form-input w-50" value="<?php echo $product_quantity ?>"></td>
                                <td><?php echo $total_product_price ?>/-</td>
                                <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                <td>
                                    <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3"
                                        name="update_cart">
                                    <input type="submit" style="background-color: rgba(221, 59, 59, 0.644);"
                                        class="px-3 py-2 border-0 mx-3" value="Remove Cart" name="remove_cart">
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                            } else {
                                echo "<h2>Cart is empty</h2>";
                            }
                            ?>
                            </tbody>
                        </table>
                        <!-- subtotal -->
                        <div class="d-flex mb-5">
                            <?php  
                            $get_ip_add = getIPAddress();
                            $cart_query = "Select * from `cart_details` where ip_address= '$get_ip_add'";
                            $result = mysqli_query($con, $cart_query);
                            $result_count = mysqli_num_rows($result);
                            if ($result_count > 0) {   
                                echo "<h4 class='px-3'>Subtotal:<strong class='text'> $total_price /-</strong></h4>
                                        <input type='submit' class='bg-info px-3 py-2 border-0 mx-3 text-white' 
                                        style='font-weight: bold;' value='Continue Shopping' name='continue_shopping'>
                                        <button class='btn-success px-3 py-2 border-0'> <a href='./users/checkout.php' 
                                            class='text-light text-decoration-none'>Check Out</a></button>";

                            } else {
                                echo "<input type='submit' class='center-continue-shopping' value='Continue Shopping'
                                        name='continue_shopping'>"; 
                            }
                            if (isset($_POST['continue_shopping'])) {
                                echo "<script>window.open('index.php', '_self')</script>";
                            }
                            ?>
                        </div>
                    </form>

                    <!-- function to remove item -->
                    <?php
                    function remove_cart_item() {
                        global $con;
                        if (isset($_POST['remove_cart'])) {
                            if (empty($_POST['removeitem'])) {  // Check if no item is selected for removal
                                echo "<script>alert('Please select an item to remove first.'); window.location.href='cart.php';</script>";
                            } else {
                                foreach ($_POST['removeitem'] as $remove_id) {
                                    $delete_query = "DELETE FROM `cart_details` WHERE product_id=$remove_id";
                                    $run_delete = mysqli_query($con, $delete_query);
                                    if ($run_delete) {
                                        echo "<script>window.open('cart.php', '_self')</script>";
                                    }
                                }
                            }
                        }
                    }
                    remove_cart_item();
                    ?>


                    <!-- Update cart quantities -->
                    <?php
                    if (isset($_POST['update_cart'])) {
                        $quantities = $_POST['qty'];
                        foreach ($quantities as $product_id => $quantity) {
                            if (is_numeric($quantity) && $quantity > 0) {
                                $update_cart = "UPDATE `cart_details` SET quantity=$quantity WHERE ip_address='" . getIPAddress() . "' AND product_id=$product_id";
                                mysqli_query($con, $update_cart);
                            }
                        }
                        echo "<script>window.open('cart.php', '_self')</script>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    
</body>

</html>
