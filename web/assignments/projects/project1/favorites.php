<?php
require "dbAccess.php";
$db = get_db();
?>

<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $statement = $db->prepare("SELECT pokemon_id FROM user_favorites WHERE user_id=:userId");
    $statement->bindValue(':userId', $_SESSION['user_id']);
    $statement->execute();

    $favoritesArray = array();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

        array_push($favoritesArray, $row['pokemon_id']);
    }
} else {
    header("Location: signIn.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Pokemon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="api.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h1 style="text-align:center; color: white; text-shadow: 2px 2px 5px black; margin-top: 70px;">Your Favorite Pokemon</h1>
        <div class="listBox">
            <ul id="favoritesList">

            </ul>
        </div>
    </div>
    <script>
        var favoritesArray = <?php echo json_encode($favoritesArray); ?>
        getFavoritePokemon(favoritesArray)

        function getJSON(url) {
            return fetch(url).then(function(response) {
                if (!response.ok) {
                    throw Error(response.statusText);
                } else {
                    return response.json();
                }
            }).catch(function(error) {
                console.log(error);
            })
        }

        function getFavoritePokemon(pokemonId) {
            getJSON("https://pokeapi.co/api/v2/pokemon?limit=807&offset=0%22").then(function(data) {
                console.log(data);

                let favoriteList = document.getElementById("favoriteList");
                console.log(data);
                data["results"].forEach(function(value) {
                    getJSON(value.url).then(function(pkm) {

                        pokemonId.forEach(function(element) {

                            if (element == pkm.id) {
                                //console.log(value);
                                let item = document.createElement("li");
                                let uppercaseName = value.name.charAt(0).toUpperCase() + value.name.slice(1);
                                let div = document.createElement("div");
                                div.classList.add("pokemonName");
                                div.dataset.url = value.url;
                                div.innerHTML = `${uppercaseName} <div class="details hide ${value.name}Div">
                <img class="pokeimg ${value.name}" src="" />
                </div>`;
                                let btn = document.createElement("button");
                                btn.innerHTML = `Remove ${uppercaseName} from Favorites`;
                                btn.dataset.pokemon = pkm.id;
                                btn.dataset.pkmName = pkm.name;
                                btn.dataset.url = value.url;
                                btn.classList.add("btnRemove");

                                item.appendChild(div);
                                item.appendChild(btn);
                                favoriteList.appendChild(item);

                                div.addEventListener("click", toggleDetails);
                                btn.addEventListener("click", removeFromFavorites);
                                // div.querySelector(".pokeimg").addEventListener("click", showExtraDetails)
                            }
                        })
                    });
                });
                console.log("finished JSON");
            });

        }

        function removeFromFavorites(event) {
            var pokemon_id = event.target.dataset.pokemon;
            xhttp = new XMLHttpRequest();

            var query = ('pokemonId=' + pokemon_id);
            xhttp.open('POST', 'removeFavorite.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(query);
        }
    </script>

</html>

</body>