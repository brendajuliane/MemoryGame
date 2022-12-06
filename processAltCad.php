<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }

include('db_infos.php');



$name=$_POST["name"];
$cellphone=$_POST["cellphone"];
$user=$_POST["user"];
$cpf=$_POST["cpf"];
$email=$_POST["email"];
$password=$_POST["password"];
$validpassword=$_POST["validpassword"];
$date=$_POST["date"];


$updateQuery = "UPDATE usuario
SET nome ='" . $name . "', cpf = '" . $cpf ."', username = '" . $user . "', dtnasc = '" . $date . "', telefone = '" . $cellphone . "', email = '" . $email . "', senha = '" . $password ."'
WHERE username = '". $_SESSION['user'] ."'";

if($password==$validpassword){

    try{
        if($conn->exec($updateQuery == TRUE)){
            $_SESSION['logged']=1;
            header("location: index.php");
        }
    }
    catch(PDOException $e){
        $_SESSION['altFormFailed']=$e->getMessage();
        header("location: alterarDados.php");
    }

}
else{
    $_SESSION['altFormFailed']="Senhas não coincidem";
    header("location: alterarDados.php");
}



?>