<?php

session_start();
if(isset($_POST["completeCheckout"])){
    $address_array = array(
        'street' => $_GET["street"],
        'city' => $_POST["city"],
        'state' => $_POST["state"],
        'zip' => $_POST["zip"]
    );
    $_SESSION["address"] = $address_array;
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
    <a href="./confirmation.php" name="completeAddress">Complete Purchase</a>
    <form method="post" action="./confirmation.php">
        <div class='product'>
            <p>Please enter your street number</p>
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