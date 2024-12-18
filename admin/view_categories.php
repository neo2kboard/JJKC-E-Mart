<?php include('admincss/list_order_styles.php'); ?>

<h3 class="all_order text-center text-success mt-3">All Categories</h3>

<table id="ordersTable" class="table table-striped table-hover mt-5">
    <thead>
        <?php
            $get_categories = "SELECT * FROM `categories`";
            $result = mysqli_query($con, $get_categories);
            $row_count = mysqli_num_rows($result);

            if ($row_count == 0) {
                echo "<h2 class='text-danger text-center mt-5' 
                    style='font-family: \"Poppins\", sans-serif; font-weight: bold;'>No Categories Yet</h2>";
            } else {
                echo "<tr>
                    <th>SN</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>";

                $number = 0;
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $category_id = $row_data['category_id'];
                    $category_title = $row_data['category_title'];

                    $number++;
                    echo "<tr>
                            <td>$number</td>
                            <td>$category_title</td>
                            <td>
                                <a href='index.php?edit_category=$category_id' type='button' class='btn btn-warning'>
                                    <i class='fa-solid fa-edit' style='color: white;'></i>
                                </a> &ensp;
                            </td>
                            <td>
                                <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal$category_id'>
                                    <i class='fa-solid fa-trash' style='color: white;'></i>
                                </button>
                            </td>
                        </tr>";

                    // Modal for each category
                    echo "<!-- Modal for Category $category_id -->
                    <div class='modal fade' id='deleteModal$category_id' tabindex='-1' aria-labelledby='deleteModalLabel$category_id' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h1 class='modal-title fs-5' id='deleteModalLabel$category_id'>Delete Category</h1>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    Are you sure you want to delete the category: <strong>$category_title</strong>?
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                    <button type='button' class='btn btn-danger'>
                                        <a href='index.php?delete_category=$category_id' class='text-white' style='text-decoration: none;'>Delete</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
            }
        ?>
    </tbody>
</table>


