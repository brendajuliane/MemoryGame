<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/gameTimer.js"></script>
    <title>Jogo da memória</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
    <?php 
        include("verificaLogin.php");   
    ?>
</head>
<body onload="getElementsIndex()">
    <div class="main">
        <img src="img/textoLogo.png" alt="Jogo da memória" id="imgLogo">
        <a href="selecaoTabuleiro.html" class="gameModeButton" id="classicModeBtn">Clássica</a>
        <a href="selecaoTabuleiro.html" class="gameModeButton" id="aTimeModeBtn">Contra o tempo</a>
    </div>
    <div id="section">
        <header>
            <a href="ranking.php" title="Ranking"><img src="img/rankingButton.png" class="icon" alt="Icone para acessar o ranking"></a>
            <a href="perfil.php" title="Perfil"><img src="img/perfilButton.png" class="icon" alt="Icone para acessar o perfil"></a>
            <a href="historico.php" title="Histórico de Jogos"><img src="img/historicoButton.png" class="icon" alt="Icone para acessar o histórico"></a>
            <a href="modalSairApp.html" title="Sair"><img src="img/scapeButton.png" class="icon" alt="Icone para deslogar"></a> 
        </header>
    </div>
</body>
</html>