<!-- <?php 
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
      }
?> -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/padrao.css">
    <link rel="stylesheet" href="css/alterarDados.css">
    <title>Alterar Dados</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
</head>
<body>
<?php 
                if(isset($_SESSION['connError'])){
                    echo "<p class='errorMsg'>Conexão com o banco falhou!</p>";
                    unset($_SESSION['connError']);
                }
                if(isset($_SESSION['altFormFailed'])){
                    echo '<p class= "errorMsg">Erro ao alterar os dados: <br>' .$_SESSION['altFormFailed'].'</p>';
                    unset($_SESSION['altFormFailed']);
                }

        ?>
    <div class="containerFlex">
        <header class="header">
            <a href="perfil.html" class="goBackButton"><img src="img/back.png" alt=""></a>
        </header>
        <div class="form">
            <p class="label">Alterar Dados Pessoais</p>
            <form action="processAltCad.php" method="POST">
                <div class="inputs">
                <input type="text" class="form textBox name" placeholder="Nome Completo" name="name" maxlength="40" required>
                <input type="text" class="form textBox cellphone" placeholder="Celular" name="cellphone" maxlength="11" required>
                </div>
                <div class="inputs">
                <input type="text" class="form textBox user" placeholder="Usuário" name="user" maxlength="16" disabled>
                <input type="text" class="form textBox cpf" placeholder="CPF" name="cpf" maxlength="11" disabled>
                </div>
                <div class="inputs">
                <input type="password" class="form textBox password" placeholder="Senha", name="password" title="Senha deve ter no mínimo um número, uma letra minúscula, uma letra maiúscula e 8 caracteres" maxlength="32" required>
                <input type="password" class="form textBox password" placeholder="Confirmar Senha", name="validpassword" maxlength="32" required>
                </div>
                <div class="inputs">
                <input type="text" class="form textBox date" placeholder="Data de Nascimento" title="DD/MM/YY" disabled>
                <input type="email" class="form textBox email" placeholder="E-mail" name="email" maxlength="40" required>
                </div>
                <button class="greenButton">Salvar</button><br><br>
            </form>
        </div>
    </div>
</body>
</html>