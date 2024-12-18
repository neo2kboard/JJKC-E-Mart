<?php

if (isset($_GET['delete_product'])) {
    
    $delete_id = $_GET['delete_product'];

    $query = "SELECT * FROM `products` WHERE product_id = $delete_id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $product = mysqli_fetch_assoc($result);

        $product_image1 = $product['product_image1'];
        $product_image2 = $product['product_image2'];
        $product_image3 = $product['product_image3'];

        $image_path1 = './product_images/' . $product_image1;
        if (file_exists($image_path1)) {
            unlink($image_path1);
        }

        $image_path2 = './product_images/' . $product_image2;
        if (file_exists($image_path2)) {
            unlink($image_path2);
        }

        $image_path3 = './product_images/' . $product_image3;
        if (file_exists($image_path3)) {
            unlink($image_path3); 
        }
    }

    $delete_product = "DELETE FROM `products` WHERE product_id = $delete_id";
    $result_product = mysqli_query($con, $delete_product);

    if ($result_product) {
        echo "<script>alert('Product Deleted Successfully');</script>";
        echo "<script>window.open('index.php?view_products', '_self');</script>";
    } else {
        echo "<script>alert('Error deleting product: " . mysqli_error($con) . "');</script>";
    }
} else {
    echo "<script>alert('No product ID specified for deletion');</script>";
}
?>
