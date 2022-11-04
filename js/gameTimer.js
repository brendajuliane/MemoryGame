let gameMode = localStorage.getItem("gameMode");
let classicModeBtn;
let aTimeModeBtn;
//index

//jogo
let gameModeLabel;



function getElementsIndex(){
    classicModeBtn = document.querySelector("#classicModeBtn");
    aTimeModeBtn = document.querySelector("#aTimeModeBtn"); 
    classicModeBtn.addEventListener("click", function(){localStorage.setItem("gameMode", "Clássico");});
    aTimeModeBtn.addEventListener("click", function(){localStorage.setItem("gameMode", "Contra o <br>Tempo");});
   }

function getElementsJogo(){
    gameModeLabel = document.querySelector("#gameModeLabel");
    changeLabel();
}

function changeLabel(){
    if(gameMode==1){
        gameModeLabel.innerHTML=gameMode;
    }
    else{
        gameModeLabel.innerHTML=gameMode;
        gameModeLabel.style.fontSize="12pt";
    }
}