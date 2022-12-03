<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/historico.css">
    <title>Histórico</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
</head>

<body>
    <header class="header">
        <a href="index.html" class="goBackButton"><img src="img/back.png" alt=""></a>
    </header>

    <div class="historyBox">
        <div class="historyTitle">
            <p>Histórico</p>
        </div>
        <?php   
        include('db_infos.php');

        // Alterar depois quando tiver sessões de usuário    
        $username = "emanu55";

        try {
            $conn = new PDO("mysql:host=$sname;dbname=jogomemoria", $uname, $pwd);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->query("SELECT * FROM partida WHERE username ='" . $username . "'");

            $count = 0;

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $count++;

                if ($count % 2 == 0)
                    $lineColour = "whiteLine";
                else
                    $lineColour = "yellowLine";

                if ($row["resultado"] == 1){
                    $resultText = "Vitória";
                    $resultClass = "victory";
                }
                else {
                    $resultText = "Derrota";
                    $resultClass = "defeat";
                }
                
                if ($row["modo"] == 0)
                    $mode = "Clássico";
                else
                    $mode = "Contra o tempo";

                $datetime = new DateTime($row["dataHora"]);
                $date = $datetime->format('d/m/Y');
                $time = $datetime->format('H:i');

                if ($mode == "Contra o tempo" && $resultText == "Derrota")
                    $playtime = "Tempo esgotou";
                else
                    $playtime = $row["tempo"];

                echo "<div class='" . $lineColour . "'>";
                echo "<p class='matchStatus " . $resultClass . "'> " . $resultText . "</p>";
                echo "<div class='textContainer'><p>" . $playtime . "</p>";
                echo "<p>" . $row["jogadas"] . " Jogadas</p></div>";
                echo "<div class='textContainer'><p>" . str_replace("x", "&times;", $row["dimensao"]) . "</p>";
                echo "<p>" . $mode . "</p></div>";
                echo "<div class='textContainer'><p>" . $time . "</p>";
                echo "<p>" . $date . "</p></div></div>";
            }

        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }

        ?>
    </div>
</body>

</html>