<?php 
include('../includes/connect.php'); 
include('../functions/common_function.php');
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
    <!-- Custom Styles -->
    <?php include('../styles_php/payment_style.php'); ?>
</head>
<body>

    <!-- access user ip -->
    <?php

        $user_ip = getIPAddress();
        $get_user = "SELECT * FROM `user_table` WHERE TRIM(user_ip) = '$user_ip'";
        $result = mysqli_query($con, $get_user);
        $run_query = mysqli_fetch_array($result);
        $user_id = $run_query['user_id'];

    ?>

    <div class="container">
        <h2 class="text-center my-4">Choose Your Payment Option</h2>

        <div class="payment-options">
            <!-- PayPal Option -->
            <div class="payment-option">
                <a href="https://www.paypal.com" target="_blank">
                    <img src="../img/upi.jpg" alt="Pay with PayPal">
                    <div class="option-title">Pay via PayPal</div>
                </a>
            </div>

            <!-- Offline Payment Option -->
            <div class="payment-option">
                <a href="order.php?user_id=<?php echo $user_id ?>">
                    <img src="../img/cash.png" alt="Pay Offline">
                    <div class="option-title">Pay Offline</div>
                </a>
            </div>
        </div>
    </div>

</body>
</html>
