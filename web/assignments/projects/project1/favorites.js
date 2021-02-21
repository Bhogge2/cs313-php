function getJSON(url) {
    return fetch(url).then(function (response) {
        if (!response.ok) {
            throw Error(response.statusText);
        } else {
            return response.json();
        }
    }).catch(function (error) {
        console.log(error);
    })
}

function getFavoritePokemon(pokemonId) {
    getJSON("https://pokeapi.co/api/v2/pokemon?limit=807&offset=0%22").then(function (data) {
        console.log(data);

        let favoriteList = document.getElementById("favoriteList");
        console.log(data);
        data["results"].forEach(function (value) {
            getJSON(value.url).then(function (pkm) {

                if (pokemonId == pkm.id) {
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