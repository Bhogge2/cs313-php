<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Pokemon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="api.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <div class="content">
            <input type="text" id="myInput" onkeyup="filterPokemon()" placeholder="Search for Pokemon..." title="Type in a Pokemon">
            <div class="listBox">
                <ul id="allList"></ul>
            </div>
        </div>
    </div>

    <script src="pokemon.js"></script>
</body>

</html>