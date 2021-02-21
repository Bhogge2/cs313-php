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

function getAllPokemon() {
    getJSON("https://pokeapi.co/api/v2/pokemon?limit=807&offset=0%22").then(function (data) {
        console.log(data);

        let allList = document.getElementById("allList");
        console.log(data);
        data["results"].forEach(function (value) {
            getJSON(value.url).then(function (pkm) {
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
                btn.innerHTML = `Add ${uppercaseName} to Favorites`;
                btn.dataset.pokemon = pkm.id;
                btn.dataset.pkmName = pkm.name;
                btn.dataset.url = value.url;
                btn.classList.add("btnAdd");

                item.appendChild(div);
                item.appendChild(btn);
                allList.appendChild(item);

                div.addEventListener("click", toggleDetails);
                btn.addEventListener("click", addToFavorites);
                // div.querySelector(".pokeimg").addEventListener("click", showExtraDetails)

            });
        });
        console.log("finished JSON");

        if (allList.className.includes("hide")) {
            allList.classList.remove("hide");
        }
    });

}

function toggleDetails(event) {
    //console.log(event.target.firstElementChild.lastElementChild);
    getPokemonDetails(event.target.getAttribute("data-url"), event.target.firstElementChild.lastElementChild);
    console.log(event);
    if (event.target.querySelector("div.details").className.includes("hide")) {
        event.target.querySelector("div.details").classList.add("show");
        event.target.querySelector("div.details").classList.remove("hide");
    } else {
        event.target.querySelector("div.details").classList.add("hide");
        event.target.querySelector("div.details").classList.remove("show");
    }
}

function hideExtraDetails() {
    document.querySelector(".content").classList.add("show");
    document.querySelector(".extraContents").classList.add("hide");
}

function getPokemonDetails(url, event) {
    getJSON(url).then(function (data) {
        console.log(data);

        event.src = data.sprites.front_default;

        console.log(event);
    });
}

function filterPokemon() {
    let input = document.getElementById("myInput");
    let filter = input.value.toUpperCase();
    let allList = document.getElementById("allList");
    let li = allList.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        let name = li[i];
        let textValue = name.textContent || name.innerText;
        if (textValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

function addToFavorites(event) {
    var pokemon_id = event.target.dataset.pokemon;
    xhttp = new XMLHttpRequest();

    var query = ('pokemonId=' + pokemon_id);
    xhttp.open('POST', 'addFavorite.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(query);
}

getAllPokemon();