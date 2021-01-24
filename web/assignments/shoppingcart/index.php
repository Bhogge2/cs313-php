<?php
session_start();
$products_array = array (
    array ('id' =>"1", 'name'=>"Chair", 'price'=>"20"),
    array ('id' =>"2", 'name'=>"Matress", 'price'=>"70"),
    array ('id' =>"3", 'name'=>"Desk", 'price'=>"50")
    );
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

foreach ($products_array as $product) {
        foreach($product as $productdetail) {
        echo "<div><p>$productdetail</p></div>";
        }
    }

    ?>
</body>
</html>