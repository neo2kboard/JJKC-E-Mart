<?php 
    include('../includes/connect.php'); 
    include('../functions/common_function.php');

    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
    }

    // Getting total items and total price of all items
    $get_ip_address = getIPAddress();
    $total_price = 0;
    $cart_query_price = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'";
    $result_cart_price = mysqli_query($con, $cart_query_price);
    $invoice_number = mt_rand();
    $status = 'pending';
    $count_products = mysqli_num_rows($result_cart_price);

    // Loop through each cart item and calculate the total price
    while ($row_price = mysqli_fetch_array($result_cart_price)){
        $product_id = $row_price['product_id'];
        $quantity = $row_price['quantity']; // Getting quantity of each product in the cart

        // Fetch product price
        $select_product = "SELECT * FROM `products` WHERE product_id = $product_id";
        $run_price = mysqli_query($con, $select_product);
        while($row_product_price = mysqli_fetch_array($run_price)){
            $product_price = $row_product_price['product_price'];

            // Calculate total price for this product and add it to the overall total
            $total_price += ($product_price * $quantity);
        }
    }

    // Subtotal is the total price (no need to multiply it again here)
    $subtotal = $total_price;

    // Insert the order into the database
    $insert_orders = "INSERT INTO `user_orders` (user_id, amount_due, invoice_number, total_products,
                        order_date, order_status) 
                        VALUES ($user_id, $subtotal, $invoice_number, $count_products, NOW(), '$status')";
    $result_query = mysqli_query($con, $insert_orders);

    if($result_query){
        echo "<script>alert('Order Submitted Successfully!')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
    }

    //order pending 
    $insert_pending_orders = "INSERT INTO `orders_pending` (user_id, invoice_number, product_id, 
                                quantity, order_status) 
                        VALUES ($user_id, $invoice_number, $product_id, $count_products, '$status')";
    $result_pending_orders = mysqli_query($con, $insert_pending_orders);

    //delete items from cart
    $empty_cart = "Delete from`cart_details` where ip_address = '$get_ip_address'";
    $result_delete = mysqli_query($con, $empty_cart);
?>