<?php

session_start();

if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shoppingCart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shoppingCart"][$keys]);
                echo '<script>window.location="cart.php"</script>';
            }
        }
    }
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
    <?php
        if(!empty($_SESSION["shoppingCart"])) 
        {
            $total = 0;
            foreach($_SESSION["shoppingCart"] as $keys => $values)
            {
                ?>
                <div><?php echo $values["item_name"] ?></div>
                <div>$<?php echo $values["item_price"] ?></div>
                <a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span>Remove</span></a>
                <?php
                $total = $total + ($values["item_quantity"] * $values["item_price"]);
            }   
            ?>
            <p>$ <?php echo number_format($total, 2) ?></p>
            <?php
        }
    ?>
</body>
</html>