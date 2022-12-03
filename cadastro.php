<?php 
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
      }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/padrao.css">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">

    <title>Cadastro</title>
</head>
<body>
<?php 
                if(isset($_SESSION['connError'])){
                    echo "<p class='errorMsg'>Conexão com o banco falhou!</p>";
                    unset($_SESSION['connError']);
                }
                if(isset($_SESSION['formFailed'])){
                    echo '<p class= "errorMsg">Erro ao cadastrar: <br>' .$_SESSION['formFailed'].'</p>';
                    unset($_SESSION['formFailed']);
                }

        ?>
    <div class="form">
        <p class="label">Cadastre-se</p>
        <form id="meuForm" action="processCad.php" method="POST">
            <div class="inputs">
            <input type="text" class="form textBox name" placeholder="Nome Completo" id="name" name="name" required>
            <input type="text" class="form textBox cellphone" placeholder="Celular" id="cellphone" name="cellphone" required >
            </div>
            <div class="inputs" >
            <input type="text" class="form textBox user" placeholder="Usuário" id="user" name="user" required>
            <input type="text" class="form textBox cpf" placeholder="CPF" id="cpf" name="cpf" required>
            </div>
            <div class="inputs">
            <input type="password" class="form textBox password" placeholder="Senha" title="Senha deve ter no mínimo um número, uma letra minúscula, uma letra maiúscula e 8 caracteres"
             id="password" name="password" required>
            <input type="password" class="form textBox password" placeholder="Confirmar Senha" id="validpassword" name="validpassword" required>
            </div>
            <div class="inputs">
            <input type="text" class="form textBox date" placeholder="Data de Nascimento" title="DD/MM/YY" id="date" name="date" required onfocus="(this.type='date')"  onblur="(this.type='text')">
            <input type="email" class="form textBox email" placeholder="E-mail" id="email" name="email" required>
            </div>     
            <button class="YellowButton" >Cadastrar</button>
        </form>
            <a href="login.html" class="linkForm">Já possui uma conta? Faça Login!</a>  
    </div>
    <!--<script defer src="js/validacaoForm.js"></script>
     <script>
        var forms = document.querySelector('#meuForm')
        forms.addEventListener('submit', function(e){
            e.preventDefault();

            var cont = 0;

            if(validaNome(nome)){
                cont += 1
            }
            if(validaCelular(celular)){
                cont += 1
            }
            if(validaUsuario(user)){
                cont += 1
            }
            if(validaCPF(cpf)){
                cont += 1
            }
            if(validaSenha(senha)){
                cont += 1
            }
            if(validaSenha2(senha2)){
                cont += 1
            }
            if(validaData(data)){
                cont += 1
            }
            if(validaEmail(email)){
                cont += 1
            }
            if(cont == 8){
                alert("Cadastro realizado com sucesso")
                e.currentTarget.submit()
            }
    });
    </script> -->
</body>
</html>