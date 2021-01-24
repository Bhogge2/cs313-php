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
    echo "<div class='product'><div class='productDetail'<p>$product[$key]['name']</p><p>$product[$key]['price']</p></div></div>";
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