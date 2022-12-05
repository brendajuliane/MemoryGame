<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ranking.css">
    <title>Ranking</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
    <?php 
        include("verificaLogin.php");   
    ?>
</head>
<body>
    <div class="darkScreen">
        <header class="header">
            <a href="index.php" class="goBackButton"><img src="img/back.png" alt=""></a>
        </header>
        <div class="boardContainer">
            <div class="board"><img src="img/Star.svg" alt="">
                <h1 class="rankingText">RANKING</h1><img src="img/Star.svg" alt="">
            </div>
        </div>
        <div class="rankContainer">
            <div class="podiumContainer">
                <div class="placeContainer">
                    <h1 class="podiumUsername">Username</h1>
                    <div class="podium" id="thirdPlace">
                        <h1 class="place">3°</h1>
                        <div class="data">
                            <div class="textContainer">
                                <p class="dataText">Tabuleiro</p>
                                <h3 class="dataTitle">6x6</h3>
                            </div>
                            <div class="textContainer">
                                <p class="dataText">Jogadas</p>
                                <h3 class="dataTitle">25</h3>
                            </div>
                            <p class="dataText">Contra o tempo</p>
                        </div>
                    </div>
                </div>
                <div class="placeContainer">
                    <h1 class="podiumUsername">Username</h1>
                    <div class="podium" id="firstPlace">
                        <h1 class="place">1°</h1>
                        <div class="data">
                            <div class="textContainer">
                                <p class="dataText">Tabuleiro</p>
                                <h3 class="dataTitle">6x6</h3>
                            </div>
                            <div class="textContainer">
                                <p class="dataText">Jogadas</p>
                                <h3 class="dataTitle">25</h3>
                            </div>
                            <p class="dataText">Contra o tempo</p>
                        </div>
                    </div>
                </div>
                <div class="placeContainer">
                    <h1 class="podiumUsername">Username</h1>
                    <div class="podium" id="secondPlace">
                        <h1 class="place">2°</h1>
                        <div class="data">
                            <div class="textContainer">
                                <p class="dataText">Tabuleiro</p>
                                <h3 class="dataTitle">6x6</h3>
                            </div>
                            <div class="textContainer">
                                <p class="dataText">Jogadas</p>
                                <h3 class="dataTitle">25</h3>
                            </div>
                            <p class="dataText">Contra o tempo</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="othersContainer">
                <!--Loop here-->
                <?php
                    include('db_infos.php');

                    try {
                        $conn = new PDO("mysql:host=$sname;dbname=jogomemoria", $uname, $pwd);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                        $sql = "SELECT * FROM `ranking` LIMIT 10";
                        $result = $conn->query($sql);
            
                    } catch(PDOException $e) {
                            echo "Connection failed: " . $e->getMessage();
                    }

                    for($i=0; $i<10; $i++) {
                        $row = $result->fetch(PDO::FETCH_LAZY, $i);
                        if($i>=3) { 
                            echo '<div class="othersContentLight">
                                    <p class="othersPlace">'.$i.'°</p>
                                    <p class="othersText">'.$row['username'].'</p>
                                    <div class="textContainer">
                                        <p class="dataText">Tabuleiro</p>
                                        <h3 class="dataTitle">'.$row["dimensao"].'</h3>
                                    </div>
                                    <div class="textContainer">
                                        <p class="dataText">Jogadas</p>
                                        <h3 class="dataTitle">'.$row["jogadas"].'</h3>
                                    </div>
                                    <p class="othersText">'.$row["modo"].'</p>
                                </div>';
                        }
                    }
                ?>
                <!--fim de um container-->
            </div>
        </div>
    </div>
</body>
</html>

