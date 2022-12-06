<?php
session_start();

include('db_infos.php');

$sql = 'SELECT nome,username,dtnasc,email,cpf,telefone from usuario';

?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/padrao.css">
    <link rel="stylesheet" href="css/perfil.css">
    <title>Perfil</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
</head>
<body>
    <header class="header">
        <a href="index.php" class="goBackButton"><img src="img/back.png" alt=""></a>
    </header>
    <main>
        <div class="informationBox">
            <div class="userBox">
                <div id="perfilImgDiv">
                    <img src="img/perfilImg.png" alt="" id="perfilImg">
                </div>
                <h1><?php echo "$row['nome']" ?></h1>
                <h2><?php echo "$row['username']" ?></h2>
            </div>
            <div class="subInformationalBox">
                <h2 class="title">Dados cadastrais</h2>
                <div class="cadastralInformation">
                    <p><?php echo "$row['dtnasc']" ?></p>
                    <p><?php echo "$row['email']" ?></p>
                </div>
                <div class="cadastralInformation">
                    <p><?php echo "$row['cpf']" ?></p>
                    <p><?php echo "$row['telefone']" ?></p>
                </div>
            </div>
        </div>
        <div class="numberBox">
            <div class="numberInformation">
                <p class="number">00</p>
                <p class="information">Ranking</p>
            </div>
            <div class="numberInformation">
                <p class="number">00</p>
                <p class="information">Partidas jogadas</p>
            </div>
            <div class="numberInformation">
                <p class="numberWin">00</p>
                <p class="informationWin">Vitórias</p>
            </div>
            <div class="numberInformation">
                <p class="numberDefeat">00</p>
                <p class="informationDefeat">Derrotas</p>
            </div>
        </div>
    </main>
    <footer>
        <a href="alterarDados.php" class="editarButton">Editar</a>
    </footer>
</body>
</html>
