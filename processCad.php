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

$insertQuery= "INSERT INTO usuario (cpf, nome, username, dtnasc, telefone, email, senha, ranking)
 VALUES ('".$cpf."', '".$name."', '".$user."', '".$date."', '".$cellphone."', '".$email."', '".$password."', 1)";

echo "Senha:".$password;
//validação form
if($password=$validpassword){
    //if select username responder NULL entao pode cadastrar
    try{
        if($conn->exec($insertQuery)){
            $_SESSION['success']=1;
            //header("location: index.php");
        }
    }
    catch(PDOException $e){
        $_SESSION['success']=$e->getMessage();
        header("location: cadastro.html");
    }

}



?>