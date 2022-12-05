<?php
    session_start();

    include('db_infos.php');

        try {
            $conn = new PDO("mysql:host=$sname;dbname=jogomemoria", $uname, $pwd);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT COUNT(*) FROM `usuario` WHERE `username` ='". $_POST['user'] ."' and `senha` ='". $_POST['pass']."'";
            $result = $conn->query($sql);

        } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
        }

        if($result->fetchColumn() > 0) {
            $_SESSION['user'] = $_POST['user'];
            $_SESSION['pass'] = $_POST['pass'];
            header('location:index.php');
        } else {
            unset($_SESSION['user']);
            unset($_SESSION['pass']);
            header('location:login.html');
        }
?>