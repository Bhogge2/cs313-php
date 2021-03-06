<?php
session_start();
$products_array = array (
    array ('id' =>"1", 'name'=>"Chair", 'price'=>"20"),
    array ('id' =>"2", 'name'=>"Matress", 'price'=>"70"),
    array ('id' =>"3", 'name'=>"Desk", 'price'=>"50")
    );
    if(isset($_POST["addToCartBtn"])){
        if(isset($_SESSION["shoppingCart"])){
            $item_array_id = array_column($_SESSION["shoppingCart"], "item_id");
            if(!in_array($_GET["id"], $item_array_id)){
                $count = count($_SESSION["shoppingCart"]);
                $item_array = array(
                    'item_id' => $_GET["id"],
                    'item_name' => filter_var($_POST["hidden_name"], FILTER_SANITIZE_STRING),
                    'item_price' => filter_var($_POST["hidden_price"], FILTER_SANITIZE_STRING),
                    'item_quantity' => filter_var($_POST["quantity"], FILTER_SANITIZE_STRING)
                );
                $_SESSION["shoppingCart"][$count] = $item_array;
            }
            else
            {
                echo '<script>window.location="index.php"</script>';
            }
        }
        else
        {
            $item_array = array(
                'item_id' => $_GET["id"],
                'item_name' => filter_var($_POST["hidden_name"], FILTER_SANITIZE_STRING),
                'item_price' => filter_var($_POST["hidden_price"], FILTER_SANITIZE_STRING),
                'item_quantity' => filter_var($_POST["quantity"], FILTER_SANITIZE_STRING)
            );
            $_SESSION["shoppingCart"][0] = $item_array;
        }
    }
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
<?php include './common/header.php'; ?>
<h1>Products</h1>
<div class="productList">
    <?php

foreach ($products_array as $key=>$product) {
    ?>
    <form method="post" action="index.php?action=add&id=<?php echo $products_array[$key]["id"]; ?>">
    <div class='product'>
        <div class='productDetail'>
            <p><?php echo $products_array[$key]["name"]; ?></p>
            <p>$<?php echo $products_array[$key]["price"]; ?></p>
            <input type="text" name="quantity" value="1" />
            <input type="hidden" name="hidden_name" value="<?php echo $products_array[$key]["name"]; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $products_array[$key]["price"]; ?>">
            <input type="submit" name="addToCartBtn" value="Add to Cart" />
        </div>
    </div>
    </form>
    <?php
    }
    ?>
    </div>
</body>
</html>