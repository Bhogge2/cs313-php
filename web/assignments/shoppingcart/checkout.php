<?php

session_start();
if(isset($_POST["completeCheckout"])){
    $address_array = array(
        'street' => filter_var($_POST["street"], FILTER_SANITIZE_STRING),
        'city' => filter_var($_POST["city"], FILTER_SANITIZE_STRING),
        'state' => filter_var($_POST["state"], FILTER_SANITIZE_STRING),
        'zip' => filter_var($_POST["zip"], FILTER_SANITIZE_NUMBER_INT)
    );
    $_SESSION["address"] = $address_array;
    echo '<script>window.location="confirmation.php"</script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include './common/header.php'; ?>
    <h1>Checkout</h1>
    <h2>Address</h2>

    <a href="./cart.php">Return to Cart</a>
    <form method="post" action="">
        <div class='product'>
            <p>Please enter your street address</p>
            <input type="text" name="street" />
            <p>Please enter your city</p>
            <input type="text" name="city" />
            <p>Please enter your state</p>
            <input type="text" name="state" />
            <p>Please enter your zip code</p>
            <input type="text" name="zip" />
            <input type="submit" name="completeCheckout" value="Complete Checkout" />
        </div>
    </form>
</body>

</html>