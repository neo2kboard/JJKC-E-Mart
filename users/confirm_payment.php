<?php
    include('../includes/connect.php');
    session_start();
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
        $select_data = "Select * from `user_orders` where order_id=$order_id";
        $result = mysqli_query($con, $select_data);
        $row_fetch = mysqli_fetch_assoc($result);
        $invoice_number = $row_fetch['invoice_number'];
        $amount_due = $row_fetch['amount_due'];
    }

    if(isset($_POST['confirm_payment'])){
        $invoice_number = $_POST['invoice_number'];
        $amount = $_POST['amount'];
        $payment_mode = $_POST['payment_mode'];
        $insert_query = "insert into `user_payments` (order_id, invoice_number, amount, payment_mode)
                            values($order_id, $invoice_number, $amount, '$payment_mode')";
        $result = mysqli_query($con, $insert_query);
        if($result){
            echo "<script>alert('Payment Completed Successfully!')</script>";
            echo "<script>window.open('profile.php?my_orders','_self')</script>";
        }
        $update_orders = "update `user_orders` set order_status='Complete' where order_id = $order_id";
        $result_orders = mysqli_query($con, $update_orders);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- Google Fonts Link (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS for modern styling -->
     <?php include('../styles_php/confirm_payment_style.php'); ?>
</head>
<body>

    <div class="container">
        <h1>Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline">
                <label for="" class="mb-1">Invoice Number</label>
                <input type="text" class="form-control" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>
            <div class="form-outline">
                <label for="" class="mb-1">Amount</label>
                <input type="text" class="form-control" name="amount" value="<?php echo $amount_due ?>">
            </div>
            <div class="form-outline">
                <select name="payment_mode" class="form-select" required>
                    <option value="" disabled selected>Select Payment Mode</option>
                    <option value="UPI">UPI</option>
                    <option value="Netbanking">Netbanking</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                    <option value="Pay Offline">Pay Offline</option>
                </select>
            </div>
            <div class="form-outline">
                <input type="submit" class="btn btn-success" value="Confirm" name="confirm_payment">
            </div>
        </form>
    </div>

</body>
</html>
