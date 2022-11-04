const gameMode = localStorage.getItem("gameMode");
let firstClick = true;
let timeSec=0;
let setIntervalVar;
//index.html vars
let classicModeBtn;
let aTimeModeBtn;
//jogo.html vars
let gameModeLabel;
let contText;

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
        //DECIDIR CRITÉRIO DE PARADA DO CONTADOR=========================================================================================
        if(timeSec==100000000){
            clearInterval(countDownTimer);
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
        if(timeSec==0){
            clearInterval(countDownTimer);
            //CHAMAR TELA DE VITÓRIA==========================================================================================
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