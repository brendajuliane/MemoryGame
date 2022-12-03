const gameMode = localStorage.getItem("gameMode");
let firstClick = true;
let timeSec=0;
let setIntervalVar;
let result = localStorage.getItem("result");
//index.html vars
let classicModeBtn;
let aTimeModeBtn;
//jogo.php vars
let gameModeLabel;
let contText;
//gameover.html vars
let main;
let gameResultLabel;
let againMsg;

//function call change based on gamemode
if(gameMode=="Clássico")
    setIntervalVar = setInterval(timerCount, 1000);
else
    setIntervalVar = setInterval(countDown, 1000);

//onload functions
function getElementsIndex(){
    classicModeBtn = document.querySelector("#classicModeBtn");
    aTimeModeBtn = document.querySelector("#aTimeModeBtn"); 
    classicModeBtn.addEventListener("click", function(){localStorage.setItem("gameMode", "Clássico");});
    aTimeModeBtn.addEventListener("click", function(){localStorage.setItem("gameMode", "Contra o <br>Tempo");});
   }

function getElementsJogo(){
    gameModeLabel = document.querySelector("#gameModeLabel");
    contText = document.querySelector("#contText");

    changeLabel();
    if(gameMode!="Clássico")
        setTimeDifficulty(parseInt(size));

}

function getElementsGameOver(){
    main = document.querySelector("main");
    gameResultLabel = document.querySelector("#gameResultLabel");
    againMsg = document.querySelector("#againMsg");
    changeFinishedPage();
}

//change game mode label on game 
function changeLabel(){
    if(gameMode==1){
        gameModeLabel.innerHTML=gameMode;
    }
    else{
        gameModeLabel.innerHTML=gameMode;
        gameModeLabel.style.fontSize="12pt";
    }
}
//Timer logic (Classic)

function timerCount(){
    if(!firstClick){
        let min= Math.floor(timeSec/60);
        let sec= timeSec%60;
        contText.innerText=`${formatZero(min)}:${formatZero(sec)}`;
        timeSec++;
        if(result==true){
            clearInterval(setIntervalVar);
        }
    }
}



//CountDown Logic (Against Time)
function setTimeDifficulty(s){
    switch(s){
        case 2:timeSec=30;break;
        case 4:timeSec=120;break;
        case 6:timeSec=300;break;                                                                               
        case 8:timeSec=500;break;
        default: console.log("Inválido:"+ s);break;                                                                               
    }

    let min= Math.floor(timeSec/60);
    let sec= timeSec%60;
    contText.innerText=`${formatZero(min)}:${formatZero(sec)}`;
}


function countDown(){
    if(!firstClick){
        let min= Math.floor(timeSec/60);
        let sec= timeSec%60;
        contText.innerText=`${formatZero(min)}:${formatZero(sec)}`;
        timeSec--;
        if(timeSec==-1){
            clearInterval(setIntervalVar);
            callFinishedPage(false);
        }
    }
}


function formatZero(num){
    return String(num).padStart(2, 0);
}


//Start Timer/CountDown when first click
 function startTimerOnFirstClick(){
    if(firstClick==true){
        firstClick=false;
    }

 }


 //Calls gameover/win page and change css
function callFinishedPage(gameResult){
    result = localStorage.setItem("result", gameResult);
    sendData(gameResult);
    window.location.replace("gameover.html");
}

function changeFinishedPage(){
    console.log("result é:" + result);
    if(result=="true"){
        main.style.borderColor="#ad62cb";
        gameResultLabel.innerText="VITÓRIA";
        gameResultLabel.style.color="#ad62cb";
        againMsg.innerText="Parabéns! Gostaria de jogar novamente?";
    }
    if(result=="false"){
        main.style.borderColor="#FF6161";
        gameResultLabel.innerText="TEMPO ESGOTADO";
        gameResultLabel.style.color="#FF6161";
        againMsg.innerText="Gostaria de tentar novamente?";
    }
    main.style.display="flex";
}

let finished = false;

window.onbeforeunload = function () {
    if (!finished && !firstClick)
        sendData(false);

    return null;
};

function sendData(gameResult) {
    finished = true;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'jogo.php', true);
    xhr.onload = function () {
        console.log(this.responseText);
    }

    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    let result = 0;

    if (gameResult)
        result = 1;

    let mode = 0;

    if (document.getElementById("gameModeLabel").innerHTML != "Clássico")
        mode = 1;

    let boardSize = document.getElementById("boardSize").innerHTML.replace(/×/g, "x");

    let time = document.getElementById("contText").innerHTML;

    if ((time.split(":").length - 1) <= 1)
        time = "0:" + time;

    let moves = document.getElementById("movements").innerHTML;

    // Alterar depois quando tiver sessões de usuário
    let username = "emanu55";

    xhr.send('result=' + result + '&mode=' + mode + '&boardSize=' + boardSize
        + '&time=' + time + '&moves=' + moves + '&username=' + username);
}