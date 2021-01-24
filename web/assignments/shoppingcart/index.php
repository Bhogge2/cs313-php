<?php
session_start();
$products_array = array (
    array ('id' =>"1", 'name'=>"Chair", 'price'=>"$20"),
    array ('id' =>"2", 'name'=>"Matress", 'price'=>"$70"),
    array ('id' =>"3", 'name'=>"Desk", 'price'=>"$50")
    );
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Document</title>
</head>
<body>
<h1>Shopping Cart Assignment</h1>
<div class="productList">
    <?php

foreach ($products_array as $key=>$product) {
    ?>
    <div class='product'>
        <div class='productDetail'>
            <p><?php echo $product_array[$key]["name"]; ?><</p>
            <p><?php echo $product_array[$key]["price"]; ?><</p>
        </div>
    </div>
    <?php
    }

    ?>
<!--
foreach ($products_array as $key=>$product) {
    echo "<div class='product'>";
        foreach($product as $productdetail) {
        echo "<div class='productDetail'<p>$productdetail</p></div>";
        }
        echo "</div>";
    }

    ?>
-->
    </div>
</body>
</html>