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
<?php include './common/header.php'; ?>
<h1>Confirmation</h1>
    <?php
        echo '<p>Items will be sent to: ' . $_SESSION["address"]["street"] . ', ' . $_SESSION["address"]["city"] . ', ' . $_SESSION["address"]["state"] . ' ' . $_SESSION["address"]["zip"] . '</p>';

        if(!empty($_SESSION["shoppingCart"])) 
        {
            $total = 0;
            foreach($_SESSION["shoppingCart"] as $keys => $values)
            {
                ?>
                <div><?php echo $values["item_name"]; ?></div>
                <div><?php echo $values["item_quantity"]; ?></div>
                <div>$<?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></div>
                <?php
                $total = $total + ($values["item_quantity"] * $values["item_price"]);
            }   
            ?>
            <p>$<?php echo number_format($total, 2); ?></p>
            <?php
        }
    ?>
</body>
</html>