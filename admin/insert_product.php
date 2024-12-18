<?php
    include('../includes/connect.php');
    
    if(isset($_POST['insert_product'])){

        $product_title = $_POST['product_title'];
        $description = $_POST['description'];
        $product_keywords = $_POST['product_keywords'];
        $product_categories = $_POST['product_categories'];
        $product_brands = $_POST['product_brands'];
        $product_price = $_POST['product_price'];
        $product_status = 'true';

        //accessing images
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image3 = $_FILES['product_image3']['name'];

        //accessing image tmp name
        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];

        //checking empty condition
        if($product_title=='' or $description=='' or $product_keywords=='' or $product_categories=='' 
        or $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or 
        $product_image3==''){
            echo "<script>alert('Please fill all the fields!')</script>";
            exit();
        } else {

            // Check if the product already exists
            $select_query = "SELECT * FROM `products` WHERE product_title='$product_title'";
            $result_select = mysqli_query($con, $select_query);
            $number = mysqli_num_rows($result_select);

            if ($number > 0) {
                echo "<script>alert('Product with this title already exists!')</script>";
            } else {
                // Move uploaded files
                move_uploaded_file($temp_image1, "./product_images/$product_image1");
                move_uploaded_file($temp_image2, "./product_images/$product_image2");
                move_uploaded_file($temp_image3, "./product_images/$product_image3");

                // Insert query
                $insert_products="INSERT INTO `products` (product_title, product_description, product_keywords,
                category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status)
                VALUES ('$product_title', '$description', '$product_keywords', '$product_categories', 
                '$product_brands', '$product_image1', '$product_image2', '$product_image3', '$product_price', 
                NOW(), '$product_status')";
                $result_query = mysqli_query($con, $insert_products);
                if($result_query){
                    echo "<script>alert('Product Inserted Successfully!')</script>";
                    echo "<script>window.open('index.php?view_products','_self')</script>";
                }
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <!-- Google Fonts Link (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center mb-8">Insert Products</h1>
        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Row 1 -->
            <div class="form-row">
                <!-- Product Title (Left) -->
                <div class="form-outline">
                    <label for="product_title" class="form-label">Product Title</label>
                    <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
                </div>

                <!-- Product Description (Right) -->
                <div class="form-outline">
                    <label for="description" class="form-label">Product Description</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
                </div>
            </div>

            <!-- Row 2 -->
            <div class="form-row">
                <!-- Product Keywords (Left) -->
                <div class="form-outline">
                    <label for="product_keywords" class="form-label">Product Keywords</label>
                    <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required="required">
                </div>

                <!-- Product Categories (Right) -->
                <div class="form-outline">
                    <label for="product_categories" class="form-label">Product Categories</label>
                    <select name="product_categories" class="form-select">
                        <option value="">Select a Category</option>
                        <?php

                            $select_query = "Select * from `categories`";
                            $result_query = mysqli_query($con, $select_query);
                            while($row=mysqli_fetch_assoc($result_query)){
                                $category_title = $row['category_title'];
                                $category_id = $row['category_id'];
                                echo "<option value='$category_id'>$category_title</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Row 3 -->
            <div class="form-row">
                <!-- Product Brands (Left) -->
                <div class="form-outline">
                    <label for="product_brands" class="form-label">Product Brands</label>
                    <select name="product_brands" class="form-select">
                        <option value="">Select a Brand</option>
                        <?php

                            $select_query = "Select * from `brands`";
                            $result_query = mysqli_query($con, $select_query);
                            while($row=mysqli_fetch_assoc($result_query)){
                                $brand_title = $row['brand_title'];
                                $brand_id = $row['brand_id'];
                                echo "<option value='$brand_id'>$brand_title</option>";
                            }
                        ?>
                    </select>
                </div>

                <!-- Product Price (Right) -->
                <div class="form-outline">
                    <label for="product_price" class="form-label">Product Price</label>
                    <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
                </div>
            </div>

            <!-- Row 4 -->
            <div class="form-row">
                <!-- Product Image 1 (Left) -->
                <div class="form-outline">
                    <label for="product_image1" class="form-label">Product Image 1</label>
                    <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
                </div>

                <!-- Product Image 2 (Right) -->
                <div class="form-outline">
                    <label for="product_image2" class="form-label">Product Image 2</label>
                    <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
                </div>
            </div>

            <!-- Product Image 3 (Full width) -->
            <div class="form-outline">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>

            <!-- Submit Button -->
            <div class="form-outline">
                <input type="submit" name="insert_product" class="btn btn-success mb-3 px-3" value="Insert Product">
            </div>
        </form>

    </div>
</body>


<?php include('admincss/insert_product_style.php'); ?>

</html>