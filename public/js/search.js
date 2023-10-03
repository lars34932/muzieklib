const searchButton = document.querySelector(".search__button");
const searchInput = document.getElementById("search");
const musicTiles = document.getElementsByClassName("music__tile");

searchButton.addEventListener("click", function () {
    const searchTerm = searchInput.value.toLowerCase();
    let found = false;

    Array.from(musicTiles).forEach(function (tile) {
        const title = tile.querySelector('.music__tile__name').textContent.toLowerCase();
        const artist = tile.querySelector('.music__tile__artist').textContent.toLowerCase();

        if (title.includes(searchTerm) || artist.includes(searchTerm)) {
            tile.style.display = 'flex';
            found = true;
        } else {
            tile.style.display = 'none';
        }
    });

    if (!found) {
        alert("Niet gevonden");
    }
});