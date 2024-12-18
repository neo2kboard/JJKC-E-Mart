<?php include('admincss/list_order_styles.php'); ?>

<h3 class="all_order text-center text-success">All Orders</h3>

<table id="ordersTable" class="table table-striped table-hover mt-5">
    <thead>
        <?php
            $get_orders = "SELECT * FROM `user_orders`";
            $result = mysqli_query($con, $get_orders);
            $row_count = mysqli_num_rows($result);
            

            if ($row_count == 0) {
                echo "<h2 class='text-danger text-center mt-5' 
                    style='font-family: \"Poppins\", sans-serif; font-weight: bold;'>No Orders Received Yet</h2>";
            } else {
                echo "<tr>
                    <th>SN</th>
                    <th>Due Amount</th>
                    <th>Invoice No.</th>
                    <th>Total Products</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>";

                $number = 0;
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $order_id = $row_data['order_id'];
                    $amount_due = $row_data['amount_due'];
                    $invoice_number = $row_data['invoice_number'];
                    $total_products = $row_data['total_products'];
                    $order_date = $row_data['order_date'];
                    $order_status = $row_data['order_status'];
                    $number++;
                    echo "<tr>
                            <td>$number</td>
                            <td>$amount_due</td>
                            <td>$invoice_number</td>
                            <td>$total_products</td>
                            <td>$order_date</td>
                            <td>$order_status</td>
                            <td>
                                <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal$order_id'>
                                    <i class='fa-solid fa-trash' style='color: white;'></i>
                                </button>
                            </td>
                        </tr>";
                    
                    // Modal for each order
                    echo "<!-- Modal for Order $order_id -->
                    <div class='modal fade' id='deleteModal$order_id' tabindex='-1' aria-labelledby='deleteModalLabel$order_id' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h1 class='modal-title fs-5' id='deleteModalLabel$order_id'>Delete Order</h1>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    Are you sure you want to delete the order: <strong>$order_id</strong>?
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                    <button type='button' class='btn btn-danger'>
                                        <a href='index.php?delete_order=$order_id' class='text-white' style='text-decoration: none;'>Delete</a>
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


