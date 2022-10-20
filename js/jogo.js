const size = localStorage.getItem("boardSize");

function setCardImages(size) {

    let sortedNums = new Map();
    let randomImg;

    for (let i = 0; i < size * size; i++) {
        randomImg = Math.floor((Math.random() * 32) + 1);

        /* If there are less than half of single cards added and this one hasn't been added yet, then
         * insert it into the map with value '1' */
        if (sortedNums.size < size * size / 2 && !sortedNums.has(randomImg)) {
            document.getElementById("g" + i).style.backgroundImage = "url(img/cards/c" + randomImg + ".png),"
                + "url(img/star.svg)";
            sortedNums.set(randomImg, 1);
        }
        // If there is only one matching card, then insert it into the map with value '2'
        else if (sortedNums.get(randomImg) == 1) {
            document.getElementById("g" + i).style.backgroundImage = "url(img/cards/c" + randomImg + ".png),"
                + "url(img/star.svg)";
            sortedNums.set(randomImg, 2);
        }
        /* If there are already 2 matching cards or half of the cards have been added and this is not
         * one of them, then randomize a new card to this grid item (i) */
        else
            i--;

    }

}

function loadBoard() {

    document.getElementById("boardSize").innerHTML = size + "&times;" + size;

    document.querySelector(".board").style.gridTemplateColumns = "repeat(" + size + ", auto)";

    for (let i = 0; i < size * size; i++) {
        let gridItem = document.createElement('div');
        gridItem.className = "gridItem";
        gridItem.id = "g" + i;
        gridItem.style.height = (68 / size) + "vh";
                                       // {Substitua o nome da fun��o aqui} :)
        gridItem.onclick = function(){ toggleVisibility() };
        document.querySelector(".board").appendChild(gridItem);
    }

    setCardImages(size);
}

// unfinished
function toggleVisibility() {

    let backgroundSize;

    if (document.getElementById("tButton").value == 1) {
        backgroundSize = "0%, 40%";
        document.getElementById("tButton").value = 0;
    }
    else {
        backgroundSize = "80%, 0%";
        document.getElementById("tButton").value = 1;
    }

    for (let i = 0; i < size * size; i++)
        document.getElementById("g" + i).style.backgroundSize = backgroundSize;
}