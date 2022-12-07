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
        <?php
        session_start();

        include('db_infos.php');

        try {
            $conn = new PDO("mysql:host=$sname;dbname=jogomemoria", $uname, $pwd);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->query("SELECT * FROM usuario WHERE username ='" . $_SESSION['user'] . "'");

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $stmt = $conn->query("SELECT COUNT(*) qty FROM partida WHERE username ='" . $_SESSION['user'] . "'");

            $qty = $stmt->fetch(PDO::FETCH_ASSOC);

            $stmt = $conn->query("SELECT COUNT(*) win FROM partida WHERE username ='" . $_SESSION['user'] . "' 
            and resultado=1");

            $win = $stmt->fetch(PDO::FETCH_ASSOC);

            $stmt = $conn->query("SELECT COUNT(*) defeat FROM partida WHERE username ='" . $_SESSION['user'] . "' 
            and resultado=0");

            $defeat = $stmt->fetch(PDO::FETCH_ASSOC);

            echo "<div class='informationBox'>
            <div class='userBox'>
                <div id='perfilImgDiv'>
                    <img src='img/perfilImg.png' alt='' id='perfilImg'>
                </div>
                <h1>". $row['nome'] . "</h1>
                <h2>". $row['username'] . "</h2>
            </div>
            <div class='subInformationalBox'>
                <h2 class='title'>Dados cadastrais</h2>
                <div class='cadastralInformation'>
                    <p> Data nascimento: ". $row['dtnasc'] . "</p>
                    <p> E-mail: ". $row['email'] . "</p>
                </div>
                <div class='cadastralInformation'>
                    <p> CPF: ". $row['cpf'] . "</p>
                    <p> Telefone: ". $row['telefone'] . "</p>
                </div>
            </div>
        </div>
        <div class='numberBox'>
            <div class='numberInformation'>
                <p class='number'></p>
                <p class='information'></p>
            </div>
            <div class='numberInformation'>
                <p class='number'>". $qty['qty'] . "</p>
                <p class='information'>Partidas jogadas</p>
            </div>
            <div class='numberInformation'>
                <p class='numberWin'> ". $win['win'] ."</p>
                <p class='informationWin'>Vitórias</p>
            </div>
            <div class='numberInformation'>
                <p class='numberDefeat'>". $defeat['defeat'] ."</p>
                <p class='informationDefeat'>Derrotas</p>
            </div>
        </div>";

        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    ?>
    </main>
    <footer>
        <a href="alterarDados.php" class="editarButton">Editar</a>
    </footer>
</body>
</html>
