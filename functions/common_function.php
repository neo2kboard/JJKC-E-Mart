<?php

    //getting products
    function getproducts(){
        global $con;

        // Get sorting criteria from the URL parameter
        $sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'random';  

        // Determine the SQL ORDER BY clause based on the selected sort option
        if ($sort_by == 'title') {
            $order_by = 'product_title ASC';  // Sort by product title alphabetically
        } elseif ($sort_by == 'date') {
            $order_by = 'date DESC';  // Sort by newest products first
        } elseif ($sort_by == 'date_asc') {
            $order_by = 'date ASC';  // Sort by oldest products first (newest to oldest)
        } elseif ($sort_by == 'random') {
            $order_by = 'RAND()';  // Random sorting
        }

        //condition to check isset or not
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
        
        $select_query = "SELECT * FROM `products` ORDER BY $order_by LIMIT 0, 9";
        $result_query = mysqli_query($con, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>&nbsp;
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                  </div> ";
        }
    }}}

    //getting all products
    function get_all_products(){
        global $con;

        // Get sorting criteria from the URL parameter, default to 'random'
        $sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'random';  

        // Determine the SQL ORDER BY clause based on the selected sort option
        if ($sort_by == 'title') {
            $order_by = 'product_title ASC';  // Sort by product title alphabetically
        } elseif ($sort_by == 'date') {
            $order_by = 'date DESC';  // Sort by newest products first
        } elseif ($sort_by == 'date_asc') {
            $order_by = 'date ASC';  // Sort by oldest products first (newest to oldest)
        } elseif ($sort_by == 'random') {
            $order_by = 'RAND()';  // Random sorting
        } else {
            $order_by = 'product_title ASC';  // Default sorting if no valid sort option
        }

        // Query to fetch products with sorting applied
        if(!isset($_GET['category']) && !isset($_GET['brand'])){
            $select_query = "SELECT * FROM `products` ORDER BY $order_by";
            $result_query = mysqli_query($con, $select_query);

            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price: $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>&nbsp;
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>";
            }
        }
    }

    //getting unique catagories
    function get_unique_categories(){
        global $con;

        //condition to check isset or not
        if(isset($_GET['category'])){
        
        $category_id = $_GET['category'];
        $select_query = "SELECT * FROM `products` where category_id=$category_id order by rand()";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if($num_of_rows==0){
            echo "<h2 class='no-stock-message text-center text-danger'>No Stock for this Category</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>&nbsp;
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                  </div> ";
        }
    }}

    //getting unique brands
    function get_unique_brands(){
        global $con;

        //condition to check isset or not
        if(isset($_GET['brand'])){
        
        $brand_id = $_GET['brand'];
        $select_query = "SELECT * FROM `products` where brand_id=$brand_id order by rand()";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if($num_of_rows==0){
            echo "<h2 class='no-stock-message text-center text-danger'>Brand Not Available for Service</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>&nbsp;
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                  </div> ";
        }
    }}

    //displaying brands in sidenav
    function getbrands(){
        global $con;
        $select_brands = "Select * from `brands`";
                    $result_brands = mysqli_query($con, $select_brands);

                    while ($row_data = mysqli_fetch_assoc($result_brands)) {
                        $brand_title = $row_data['brand_title'];
                        $brand_id = $row_data['brand_id'];
                        echo "<li class='nav-item'>
                                <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                              </li>";
                    }
    }

    //displaying categories in sidenav
    function getcategories(){
        global $con;
        $select_categories = "Select * from `categories`";
                    $result_categories = mysqli_query($con, $select_categories);

                    while ($row_data = mysqli_fetch_assoc($result_categories)) {
                        $category_title = $row_data['category_title'];
                        $category_id = $row_data['category_id'];
                        echo "<li class='nav-item'>
                                <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                              </li>";
                    }
    }

    //searching products
    function search_product(){
        global $con;
        
        if(isset($_GET['search_data_product'])){
            $search_data_value = $_GET['search_data'];
        $search_query = "Select * from `products` where product_keywords like '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if($num_of_rows==0){
            echo "<h2 class='no-product-message text-center text-danger'>No Search Results Found!</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>&nbsp;
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                  </div> ";
        }
    }}

    //view details function
    function view_details(){
        global $con;

        //condition to check isset or not
        if(isset($_GET['product_id'])){
            if(!isset($_GET['category'])){
                if(!isset($_GET['brand'])){

                $product_id = $_GET['product_id'];
                    
                $select_query = "SELECT * FROM `products` where product_id=$product_id";
                $result_query = mysqli_query($con, $select_query);

                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    echo "<div class='col-md-4 mb-2'>
                            <div class='card'>
                                <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Price: $product_price/-</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>&nbsp;
                                    <a href='index.php' class='btn btn-secondary'>Go Home</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class='col-md-8'>
                            <h4 class='related-message text-center text-info mb-5' style='font-family: 'Poppins', sans-serif; 
                            font-weight: bold; font-size: 30px;'> Related Products
                            </h4>
                            <div class='row'>
                                <!-- Related Product Card 1 -->
                                <div class='col-md-6 mb-3'>
                                    <div class='card border-0 shadow-sm'>
                                        <img src='./admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                                    </div>
                                </div>

                                <!-- Related Product Card 2 -->
                                <div class='col-md-6 mb-3'>
                                    <div class='card border-0 shadow-sm'>
                                        <img src='./admin/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                                    </div>
                                </div>
                            </div>
                        </div>";

                
                }
    }}}}

    //get ip address
    function getIPAddress() {  
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }  
        //whether ip is from the remote address  
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
    } 
    
    // Function to add an item to the cart
    function cart() {
        if (isset($_GET['add_to_cart'])) {
            global $con;
            $get_ip_add = getIPAddress();
            $get_product_id = $_GET['add_to_cart'];

            // Check if the item is already in the cart
            $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add' AND product_id=$get_product_id";
            $result_query = mysqli_query($con, $select_query);
            $num_of_rows = mysqli_num_rows($result_query);

            if ($num_of_rows > 0) {
                echo "<script>alert('This item is already present inside the cart')</script>";
                echo "<script>window.open('index.php', '_self')</script>";
            } else {
                // If item is not in cart, insert it with default quantity (1)
                $insert_query = "INSERT INTO `cart_details` (product_id, ip_address, quantity) VALUES ($get_product_id, '$get_ip_add', 1)";
                $result_query = mysqli_query($con, $insert_query);
                echo "<script>alert('Item is added to cart')</script>";
                echo "<script>window.open('index.php', '_self')</script>";
            }
        }
    }

    // Function to get the number of items in the cart
    function cart_item() {
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
        echo $count_cart_items;
    }

    // Function to calculate the total price of items in the cart
    function total_cart_price() {
        global $con;
        $total_price = 0;
        $get_ip_add = getIPAddress();

        // Query to get all cart details for the user
        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_add'";
        $result = mysqli_query($con, $cart_query);

        // Loop through each item in the cart and calculate the total price
        while ($row = mysqli_fetch_array($result)) {
            $product_id = $row['product_id'];
            $product_qty = $row['quantity'];  // Get the quantity of the product

            // Get product details (price)
            $select_products = "SELECT * FROM `products` WHERE product_id = '$product_id'";
            $result_products = mysqli_query($con, $select_products);

            while ($row_product_price = mysqli_fetch_array($result_products)) {
                $product_price = $row_product_price['product_price'];  // Get the price of the product

                // Calculate and add the price for this product
                $total_price += ($product_price * $product_qty); 
            }
        }

        // Display the total price
        echo $total_price;
    }

    //get user order details
    function get_user_order_details(){
        global $con;
        $username = $_SESSION['username'];
        $get_details = "Select * from `user_table` where username = '$username'";
        $result_query = mysqli_query($con, $get_details);
        while ($row_query = mysqli_fetch_array($result_query)) {
            $user_id = $row_query['user_id'];
            if(!isset($_GET['edit_account'])){
                if(!isset($_GET['my_orders'])){
                    if(!isset($_GET['delete_account'])){
                        $get_orders = "Select * from `user_orders` where user_id = $user_id
                                        and order_status = 'pending'";
                        $result_orders_query = mysqli_query($con, $get_orders);
                        $row_count = mysqli_num_rows($result_orders_query);
                        if($row_count>0){
                            echo "<h3 class='pending-orders text-center text-success'>You Have <span class='text-danger'>
                                $row_count</span> Pending Orders</h3>
                                <p class='text-center'><a href='profile.php?my_orders' class='order_det text-dark'>Order Details</a><p>";
                        }else{
                            echo "<h3 class='pending-orders text-center text-success'>You Have 0 Pending Orders</h3>
                                <p class='text-center'><a href='../index.php' class='order_det text-dark'>Explore Products</a><p>";
                        }
                    }
                }
            }
        }
    }


?>