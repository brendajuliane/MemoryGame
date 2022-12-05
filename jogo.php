<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/jogo.css">
    <title>Jogo da Memória | Partida</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">

    <script type="text/javascript" src="js/jogo.js"></script>
    <script src="js/gameTimer.js"></script>

    <?php
        if(array_key_exists('result', $_POST))
            ins_hist();

        function ins_hist(){
            include('db_infos.php');

            try {
                $conn = new PDO("mysql:host=$sname;dbname=jogomemoria", $uname, $pwd);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "INSERT INTO partida VALUES ( 
                        DEFAULT,
                        ". $_POST['mode'] .",
                        '". $_POST['boardSize'] ."', 
                        '". $_POST['time'] ."', 
                        ". $_POST['result'] .",
                        DEFAULT,
                        ". $_POST['moves'] .",
                        '". $_POST['username'] ."')";
                $conn->exec($sql);

            }
            catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }
        }

    ?>

</head>
<body onload="loadBoard(); getElementsJogo();">
    <header>
        <a href="index.php" class="goBackButton"><img src="img/close.png" alt=""></a>
    </header>

    <div>
        <div class="menu">
            <div>
                <img src="img/textoLogo.png" alt="Jogo da memória" id="imgLogo">
            </div>
            <div class="timer">
                <p id="contText">00:00</p>
                <p class="itemLabel" id="gameModeLabel">Clássico</p>
            </div>
            <div class="menuItem">
                <p class="itemLabel">Tabuleiro:</p>
                <p id="boardSize"></p>
            </div>
            <div class="menuItem">
                <p class="itemLabel">Jogadas:</p>
                <p id="movements"></p>
            </div>
            <div class="divButton">
                <button value=0 onclick="toggleVisibility()" id="tButton">Trapaça</button>
            </div>
        </div>
        <div class="board">
            
        </div>
    </div>
</body>
</html>