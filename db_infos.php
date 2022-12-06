<?php
$sname = "localhost:3306";
$uname = "root";
$pwd = "";

try{
    $conn = new PDO("mysql:host=$sname;dbname=jogomemoria", $uname, $pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
    $_SESSION['connError']=1;
    header("location: cadastro.php");
}

?>