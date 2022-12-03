<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }

include('db_infos.php');

//form
$name=$_POST["name"];
$cellphone=$_POST["cellphone"];
$user=$_POST["user"];
$cpf=$_POST["cpf"];
$email=$_POST["email"];
$password=$_POST["password"];
$validpassword=$_POST["validpassword"];
$date=$_POST["date"];

$insertQuery= "INSERT INTO usuario (cpf, nome, username, dtnasc, telefone, email, senha)
 VALUES ('".$cpf."', '".$name."', '".$user."', '".$date."', '".$cellphone."', '".$email."', '".$password."')";

//validação form
if($password==$validpassword){

    try{
        if($conn->exec($insertQuery)){
            $_SESSION['logged']=1;
            header("location: index.php");
        }
    }
    catch(PDOException $e){
        $_SESSION['formFailed']=$e->getMessage();
        header("location: cadastro.php");
    }

}
else{
    $_SESSION['formFailed']="Senhas não coincidem";
    header("location: cadastro.php");
}



?>