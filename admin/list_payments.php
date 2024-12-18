<?php include('admincss/list_order_styles.php'); ?>

<h3 class="all_order text-center text-success">All Payments</h3>

<table id="ordersTable" class="table table-striped table-hover mt-5">
    <thead>
        <?php
            $get_payments = "SELECT * FROM `user_payments`";
            $result = mysqli_query($con, $get_payments);
            $row_count = mysqli_num_rows($result);
            

            if ($row_count == 0) {
                echo "<h2 class='text-danger text-center mt-5' 
                    style='font-family: \"Poppins\", sans-serif; font-weight: bold;'>No Payments Received Yet</h2>";
            } else {
                echo "<tr>
                    <th>SN</th>
                    <th>Invoice No.</th>
                    <th>Amount</th>
                    <th>Payment Mode</th>
                    <th>Order Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>";

                $number = 0;
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $order_id = $row_data['order_id'];
                    $payment_id = $row_data['payment_id'];
                    $amount = $row_data['amount'];
                    $invoice_number = $row_data['invoice_number'];
                    $payment_mode = $row_data['payment_mode'];
                    $date = $row_data['date'];
                    $number++;
                    echo "<tr>
                            <td>$number</td>
                            <td>$invoice_number</td>
                            <td>$amount</td>
                            <td>$payment_mode</td>
                            <td>$date</td>
                            <td>
                                <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal$payment_id'>
                                    <i class='fa-solid fa-trash' style='color: white;'></i>
                                </button>
                            </td>
                        </tr>";

                    // Modal for each payment
                    echo "<!-- Modal for Category $payment_id -->
                    <div class='modal fade' id='deleteModal$payment_id' tabindex='-1' aria-labelledby='deleteModalLabel$payment_id' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h1 class='modal-title fs-5' id='deleteModalLabel$payment_id'>Delete Payment</h1>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    Are you sure you want to delete the payment: <strong>$payment_id</strong>?
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                    <button type='button' class='btn btn-danger'>
                                        <a href='index.php?delete_payment=$payment_id' class='text-white' style='text-decoration: none;'>Delete</a>
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


