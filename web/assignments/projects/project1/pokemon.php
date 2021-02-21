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
    <?php

if (isset($_SESSION['user_id'])) {
} else {
  ?>
  <link rel="stylesheet" href="notSignedIn.css">
  <?php
}

?>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <div class="content">
            <h1 style="text-align:center; color: white; text-shadow: 2px 2px 5px black; margin-top: 70px;">All Pokemon</h1>
            <?php

            if(isset($_SESSION['user_id']))
            {

            }
            ?>
            <input type="text" id="myInput" onkeyup="filterPokemon()" placeholder="Search for Pokemon..." title="Type in a Pokemon">
            <div class="listBox">
                <ul id="allList"></ul>
            </div>
        </div>
    </div>

    <script src="pokemon.js"></script>
</body>

</html>