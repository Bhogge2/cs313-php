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
        echo '<p>Address: ' . $_SESSION["address"]["street"] . ', ' . $_SESSION["address"]["city"] . ', ' . $_SESSION["address"]["state"] . ' ' . $_SESSION["address"]["zip"] . '</p>';
    ?>
</body>
</html>