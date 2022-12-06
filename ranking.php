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
    <?php
        include('db_infos.php');

        try {
            $conn = new PDO("mysql:host=$sname;dbname=jogomemoria", $uname, $pwd);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM `ranking` LIMIT 10";
            $result = $conn->query($sql);

            $count = $conn->query("SELECT COUNT(*) FROM `ranking` LIMIT 10");
            $count = $count->fetchColumn();

        } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
        }

        if($count > 0){
            $row = $result->fetch(PDO::FETCH_LAZY);
            $fuser = $row["username"];
            $fmodo = $row["modo"];
            $fdim = $row["dimensao"]; 
            $fjogadas = $row["jogadas"];
        }
        if($count > 1){
            $row = $result->fetch(PDO::FETCH_LAZY);
            $suser = $row["username"];
            $smodo = $row["modo"];
            $sdim = $row["dimensao"]; 
            $sjogadas = $row["jogadas"];
        }
    ?>
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
                    <h1 class="podiumUsername"><?php if($count > 2){$row = $result->fetch(PDO::FETCH_LAZY); echo $row['username'];}?></h1>
                    <div class="podium" id="thirdPlace">
                        <h1 class="place">3°</h1>
                        <div class="data">
                            <div class="textContainer">
                                <p class="dataText">Tabuleiro</p>
                                <h3 class="dataTitle"><?php if($count > 2){echo $row["dimensao"];}?></h3>
                            </div>
                            <div class="textContainer">
                                <p class="dataText">Jogadas</p>
                                <h3 class="dataTitle"><?php if($count > 2){echo $row["jogadas"];}?></h3>
                            </div>
                            <p class="dataText"><?php if($row['modo']==1) echo 'Contra o Tempo'; else echo 'Classico';?></p>
                        </div>
                    </div>
                </div>
                <div class="placeContainer">
                    <h1 class="podiumUsername"><?php if($count > 0){echo $fuser;}?></h1>
                    <div class="podium" id="firstPlace">
                        <h1 class="place">1°</h1>
                        <div class="data">
                            <div class="textContainer">
                                <p class="dataText">Tabuleiro</p>
                                <h3 class="dataTitle"><?php if($count > 0){echo $fdim;}?></h3>
                            </div>
                            <div class="textContainer">
                                <p class="dataText">Jogadas</p>
                                <h3 class="dataTitle"><?php if($count > 0){echo $fjogadas;}?></h3>
                            </div>
                            <p class="dataText"><?php if($count > 0){if($fmodo==1) echo 'Contra o Tempo'; else echo 'Classico';}?></p>
                        </div>
                    </div>
                </div>
                <div class="placeContainer">
                    <h1 class="podiumUsername"><?php if($count > 1){echo $suser;}?></h1>
                    <div class="podium" id="secondPlace">
                        <h1 class="place">2°</h1>
                        <div class="data">
                            <div class="textContainer">
                                <p class="dataText">Tabuleiro</p>
                                <h3 class="dataTitle"><?php if($count > 1){echo $sdim;}?></h3>
                            </div>
                            <div class="textContainer">
                                <p class="dataText">Jogadas</p>
                                <h3 class="dataTitle"><?php if($count > 1){echo $sjogadas;}?></h3>
                            </div>
                            <p class="dataText"><?php if($count > 1){if($smodo==1) echo 'Contra o Tempo'; else echo 'Classico';}?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="othersContainer">
                <!--Loop here-->
                <?php
                    if($count > 3){
                        for($i=4; $i<11; $i++) {
                            if($count >= $i){
                                $row = $result->fetch(PDO::FETCH_LAZY);
                                if($row['modo']==1) 
                                    $modo = 'Contra o Tempo'; 
                                else 
                                    $modo = 'Classico';
                                
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
                                            <p class="othersText">'.$modo.'</p>
                                        </div>';
                            }
                        }
                    } else {
                        echo '<p style="padding:30px;text-align:center;color:grey;">Demais posições desocupadas<p>';
                    }
                ?>
                <!--fim de um container-->
            </div>
        </div>
    </div>
</body>
</html>

