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
        echo '<p>Address: ' . $_SESSION["address_array"]["street"] . ', ' . $_SESSION["address_array"]["city"] . ', ' . $_SESSION["address_array"]["state"] . ' ' . $_SESSION["address_array"]["zip"] . '</p>';
    ?>
</body>
</html>