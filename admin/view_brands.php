<?php include('admincss/list_order_styles.php'); ?>

<h3 class="all_order text-center text-success mt-3">All Brands</h3>

<table id="ordersTable" class="table table-striped table-hover mt-5">
    <thead>
        <?php
            $get_brands = "SELECT * FROM `brands`";
            $result = mysqli_query($con, $get_brands);
            $row_count = mysqli_num_rows($result);

            if ($row_count == 0) {
                echo "<h2 class='text-danger text-center mt-5' 
                    style='font-family: \"Poppins\", sans-serif; font-weight: bold;'>No Brands Yet</h2>";
            } else {
                echo "<tr>
                    <th>SN</th>
                    <th>Brand</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>";

                $number = 0;
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $brand_id = $row_data['brand_id'];
                    $brand_title = $row_data['brand_title'];

                    $number++;
                    echo "<tr>
                            <td>$number</td>
                            <td>$brand_title</td>
                            <td>
                                <a href='index.php?edit_brand=$brand_id' type='button' class='btn btn-warning'>
                                    <i class='fa-solid fa-edit' style='color: white;'></i>
                                </a> &ensp;
                            </td>
                            <td>
                                <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal$brand_id'>
                                    <i class='fa-solid fa-trash' style='color: white;'></i>
                                </button>
                            </td>
                        </tr>";

                    // Modal for each brand
                    echo "<!-- Modal for Brand $brand_id -->
                    <div class='modal fade' id='deleteModal$brand_id' tabindex='-1' aria-labelledby='deleteModalLabel$brand_id' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h1 class='modal-title fs-5' id='deleteModalLabel$brand_id'>Delete Brand</h1>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    Are you sure you want to delete the brand: <strong>$brand_title</strong>?
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                    <button type='button' class='btn btn-danger'>
                                        <a href='index.php?delete_brand=$brand_id' class='text-white' style='text-decoration: none;'>Delete</a>
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
