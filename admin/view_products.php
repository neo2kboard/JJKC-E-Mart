<?php include('admincss/view_products_style.php'); ?>

<h2 class="text-center text-success">All Products</h2>

<!-- Table Container -->
<div class="container mt-5">
    <table id="ordersTable" class="table table-hover table-striped" style="width: 80%; margin: 0 auto;">
        <thead class="bg-info">
            <tr class="text-center">
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Product Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $get_products = "SELECT * FROM `products`";
            $result = mysqli_query($con, $get_products);
            $number = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $status = $row['status'];
                $number++;
            ?>
            <tr class='text-center'>
                <td><?php echo $product_id;?></td>
                <td><?php echo $product_title;?></td>
                <td>
                    <img src='./product_images/<?php echo $product_image1;?>' class='product-img' alt='<?php echo $product_title;?>'/>
                </td>
                <td><?php echo $product_price;?></td>
                <td><?php
                    $get_count = "SELECT * FROM `orders_pending` WHERE product_id=$product_id";
                    $result_count = mysqli_query($con, $get_count);
                    $rows_count = mysqli_num_rows($result_count);
                    echo $rows_count;
                    ?></td>
                <td><?php echo $status;?></td>
                <td>
                    <a href='index.php?edit_products=<?php echo $product_id?>' class='btn btn-warning btn-sm'>
                        <i class='fa-solid fa-pen-to-square'></i> 
                    </a>
                </td>
                <td>
                    <!-- Delete Button with product details -->
                    <button class="btn btn-danger btn-sm delete-btn" data-id="<?php echo $product_id; ?>" data-title="<?php echo htmlspecialchars($product_title); ?>">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Modal content will be dynamically inserted -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a id="confirmDeleteBtn" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome for Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<!-- Bootstrap JavaScript & jQuery (for Modal) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>

<script>
    // Attach the delete confirmation to each button
    const deleteButtons = document.querySelectorAll('.delete-btn');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            const productTitle = this.getAttribute('data-title');
            
            // Update modal content dynamically with the product title
            const modalBody = document.getElementById('modalBody');
            modalBody.innerHTML = `Are you sure you want to delete the product: <strong>${productTitle}</strong>? <br> This action cannot be undone.`;

            // Set the href of the confirm button to delete the product
            const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
            confirmDeleteBtn.href = `index.php?delete_product=${productId}`;
            
            // Show the modal
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        });
    });
</script>
