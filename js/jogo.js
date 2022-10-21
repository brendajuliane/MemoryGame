// BOARD GENERATION

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
    document.getElementById("movements").innerText = "0";

    document.querySelector(".board").style.gridTemplateColumns = "repeat(" + size + ", auto)";

    for (let i = 0; i < size * size; i++) {
        let gridItem = document.createElement('div');
        gridItem.className = "gridItem";
        gridItem.id = "g" + i;
        gridItem.style.height = (68 / size) + "vh";
        gridItem.onclick = function(){ move(this.id) };
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
        if(document.getElementById("g" + i).value != 1)
            document.getElementById("g" + i).style.backgroundSize = backgroundSize;
}

// GAME
let turn = 0;
let selectedCardsID = new Array();

function move(id) {
    movements = document.getElementById("movements").innerText;
    card = document.getElementById(id);

    if(card.value == 1)
        return;
    
    card.style.backgroundSize = "80%, 0%";
    card.value = 1;
    selectedCardsID.push(id);

    if(turn == 1) {
        document.getElementById("movements").innerText = (Number(movements) + 1).toString();
        turn = 0;
        
        if(hit()) {
            console.log("Acertou!");
            //animaçãozinha de acerto :)
            if(checkVictory()) {
                //dispara modal de vitória
            }
        } else {
            console.log("Errou");
            setTimeout(() => {turnCardsOver()}, 600);
        }
        
        setTimeout(() => {deselectCards()}, 601);
    } else {
        turn++;
    }
}

function hit() {
    return document.getElementById(selectedCardsID[0]).style.backgroundImage == 
           document.getElementById(selectedCardsID[1]).style.backgroundImage;
}

function turnCardsOver() {
    for (let i = 1; i >= 0; i--) {
        document.getElementById(selectedCardsID[i]).style.backgroundSize = "0%, 40%";
        document.getElementById(selectedCardsID[i]).value = 0;
    }
}

function deselectCards() {
    for(let i=1; i>=0; i--) {
        selectedCardsID.pop();
    } 
}

function checkVictory() {
        for (let i = 0; i < size * size; i++) {
            if(document.getElementById("g" + i).value != 1) {
                console.log(`entrou no g${i}`);
                return false;
            }
        }
        return true;      
}