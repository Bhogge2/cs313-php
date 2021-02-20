<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Project - Pokemon</title>
    <link rel="stylesheet" href="api.css">
</head>

<body>
    <nav>
        <span id="allPokemon" class="active">All</span>
        <span id="favoritePokemon">Favorites</span>
    </nav>
    <div class="container">
        <div class="content">
            <input type="text" id="myInput" onkeyup="filterPokemon()" placeholder="Search for Pokemon..." title="Type in a Pokemon">
            <div class="listBox">
                <ul id="allList"></ul>
                <ul id="favoritesList" class="hide"></ul>
            </div>
        </div>
    </div>

    <script src="pokemon.js"></script>
</body>

</html>