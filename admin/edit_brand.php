<?php include('admincss/insert_brands_style.php'); ?>

<?php

    if(isset($_GET['edit_brand'])){
        $edit_brand = $_GET['edit_brand'];
        
        $get_brands = "Select * from `brands` where brand_id = $edit_brand";
        $result = mysqli_query($con, $get_brands);
        $row = mysqli_fetch_assoc($result);
        $brand_title = $row['brand_title'];
    }

    if(isset($_POST['edit_brand'])){
        $brand_title = $_POST['brand_title'];

        $update_query = "update `brands` set brand_title = '$brand_title'
                            where brand_id = $edit_brand";
        $result_brand = mysqli_query($con, $update_query);
        if($result_brand){
            echo "<script>alert('Brand Updated Successfully!')</script>";
            echo "<script>window.open('./index.php?view_brands','_self')</script>";
        }

    }

?>


<h3 class="text-center">Edit Brand</h3>

<form action="" method="post" class="mb-2">
    <label for="brand_title" class="form-label" style= "font-family: 'Poppins', sans-serif">Brand Title</label>
        <div class="input-group w-90 mb-2">
            <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="brand_title" name="brand_title" aria-label="Brands" 
                aria-describedby="basic-addon1" required value='<?php echo $brand_title; ?>'>
        </div>

        <div class="input-group w-10 mb-2 m-auto">
            <input type="submit" class="form-control bg-success" name="edit_brand" 
                value="Update Brand">
        </div>
</form>