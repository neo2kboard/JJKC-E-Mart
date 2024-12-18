<?php include('admincss/insert_category_style.php'); ?>

<?php

    if(isset($_GET['edit_category'])){
        $edit_category = $_GET['edit_category'];
        
        $get_categories = "Select * from `categories` where category_id = $edit_category";
        $result = mysqli_query($con, $get_categories);
        $row = mysqli_fetch_assoc($result);
        $category_title = $row['category_title'];
    }

    if(isset($_POST['edit_cat'])){
        $cat_title = $_POST['category_title'];

        $update_query = "update `categories` set category_title = '$cat_title'
                            where category_id = $edit_category";
        $result_cat = mysqli_query($con, $update_query);
        if($result_cat){
            echo "<script>alert('Category Updated Successfully!')</script>";
            echo "<script>window.open('./index.php?view_categories','_self')</script>";
        }

    }

?>


<h3 class="text-center">Edit Category</h3>

<form action="" method="post" class="mb-2">
    <label for="category_title" class="form-label" style= "font-family: 'Poppins', sans-serif">Category Title</label>
        <div class="input-group w-90 mb-2">
            <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="category_title" name="category_title" aria-label="Categories" 
                aria-describedby="basic-addon1" required value='<?php echo $category_title; ?>'>
        </div>

        <div class="input-group w-10 mb-2 m-auto">
            <input type="submit" class="form-control bg-success" name="edit_cat" 
                value="Update Category">
        </div>
</form>