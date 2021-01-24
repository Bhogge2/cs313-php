<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    foreach ($_SESSION["address_array"] as $key=>$item) {
        ?>
        <p>Your address is <?php $_SESSION["address_array"][$key]["street"] ?> <?php $_SESSION["address_array"][$key]["city"] ?>,  <?php $_SESSION["address_array"][$key]["state"] ?>, <?php $_SESSION["address_array"][$key]["zip"] ?></p>

<?php
    }
    ?>
</body>
</html>