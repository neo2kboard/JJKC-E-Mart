<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All My Orders</title>
    <?php include('../styles_php/profile_style.php'); ?>
    <?php include('../styles_php/user_orders_style.php'); ?>
</head>
<body>
    <?php

        $username = $_SESSION['username'];
        $get_user = "SELECT * FROM `user_table` WHERE username = '$username'";
        $result = mysqli_query($con, $get_user);
        $row_fetch = mysqli_fetch_assoc($result);
        $user_id = $row_fetch['user_id'];

    ?>

    <h3 class="text-success mb-4">All Orders</h3>
    <table id="ordersTable" class="table table-bordered">
        <thead>
            <tr>
                <th>SN</th>
                <th>Amount Due</th>
                <th>Total Products</th>
                <th>Invoice No.</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php

                $get_order_details = "SELECT * FROM `user_orders` WHERE user_id = $user_id";
                $result_orders = mysqli_query($con, $get_order_details);
                $number = 1; 
                while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                    $order_id = $row_orders['order_id'];
                    $amount_due = $row_orders['amount_due'];
                    $total_products = $row_orders['total_products'];
                    $invoice_number = $row_orders['invoice_number'];
                    $order_status = $row_orders['order_status'];
                    if($order_status=='pending'){
                        $order_status = 'Incomplete'; 
                    }else{
                        $order_status = 'Complete';
                    }
                    $order_date = $row_orders['order_date'];

                    // Set badge based on order status
                    if ($order_status == 'Complete') {
                        $badge_class = 'badge-success';
                    } elseif ($order_status == 'Incomplete') {
                        $badge_class = 'badge-danger';
                    } else {
                        $badge_class = 'badge-warning'; 
                    }

                    echo "<tr>
                            <td>$number</td>
                            <td>$amount_due</td>
                            <td>$total_products</td>
                            <td>$invoice_number</td>
                            <td>$order_date</td>
                            <td><span class='badge $badge_class'>$order_status</span></td>";
                            ?>
                            <?php
                            if($order_status=='Complete'){
                                echo "<td>Paid</td>";
                            }else{
                                echo "<td><a href='confirm_payment.php?order_id=$order_id' 
                                        class='btn'>Confirm</a></td>
                                        </tr>";
                            }
                            
                    $number++;
                }

            ?>

        </tbody>
    </table>

</body>
</html>
