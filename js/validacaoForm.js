var nome = document.querySelector("#name").value
var celular = document.querySelector('#cellphone').value
var user = document.querySelector('#user').value
var cpf = document.querySelector('#cpf').value
var senha = document.querySelector('#password').value
var senha2 = document.querySelector('#validpassword').value
var data = document.querySelector('#date').value
var email = document.querySelector('#email').value
                        


function validaNome(nome){
    var letras = /^[A-Za-z\s]+$/

    if(nome.length == 0){
        alert("Nome é obrigatório")
        document.getElementById('name').style.borderColor="red"
    }
    if(!nome.match(letras) && nome.length != 0){
        alert("Digite apenas letras no nome")
        document.getElementById('name').style.borderColor="red"
    }
    if(nome.match(letras) && nome.length != 0){
        document.getElementById('name').style.borderColor='green'
        return true;
    }
}

function validaCelular(celular){

    if(celular.length == 0){
        alert('Celular é obrigatório')
        document.getElementById('cellphone').style.borderColor="red"
    }
    if(!/^\d+$/.test(celular) && celular.length != 0){
        alert('Digite apenas números no celular')
        document.getElementById('cellphone').style.borderColor="red"
    }
    if(/^\d+$/.test(celular) && celular.length != 11){
        alert('Celular inválido')
        document.getElementById('cellphone').style.borderColor="red"
    }
    if(/^\d+$/.test(celular) && celular.length == 11){
        document.getElementById('cellphone').style.borderColor="green"
        return true;
    }
}

function validaUsuario(user){

    if(user.length == 0){
        alert('Usuário é obrigatório')
        document.getElementById('user').style.borderColor = 'red'
    }
    if(user.length > 0){
        document.getElementById('user').style.borderColor = 'green'
        return true;
    }
}

function validaCPF(cpf){

    if(cpf.length == 0){
        alert("CPF é obrigatório")
        document.getElementById("cpf").style.borderColor = 'red'
    }
    if(!/^\d+$/.test(cpf) && cpf.length != 0){
        alert("Digite apenas números no cpf")
        document.getElementById('cpf').style.borderColor = 'red'
    }
    if(/^\d+$/.test(cpf) && cpf.length != 11){
        alert("CPF inválido")
        document.getElementById('cpf').style.borderColor = 'red'
    }
    if(/^\d+$/.test(cpf) && cpf.length == 11){
        document.getElementById('cpf').style.borderColor = 'green'
        return true;
    }
}

function validaSenha(senha){
    
    if(senha.length == 0){
        alert('Senha é obrigatório')
        document.getElementById('password').style.borderColor = 'red'
    }
    if(!senha.match(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$/) && senha.length>0){
        alert("A senha deve ter no mínimo 8 caracteres, um dígito, uma letra minúscula e uma letra maiúscula")
        document.getElementById('password').style.borderColor = 'red'
    }
    if(senha.match(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$/) && senha.length>0){
        document.getElementById('password').style.borderColor = 'green'
        return true;
    }
}

function validaSenha2(senha2){
    
    if (senha2.length != 0){
        if(senha2 == senha){
            document.getElementById('validpassword').style.borderColor = 'green'
            return true;
        }else{
            alert('Digite a mesma senha')
            document.getElementById('validpassword').style.borderColor = 'red'
        }
    }else{
        alert('Confirme sua senha')
        document.getElementById('validpassword').style.borderColor = 'red'
    }
    if(document.getElementById('password').style.borderColor == 'red'){
        document.getElementById('validpassword').style.borderColor = 'red'
    }
}

function validaData(data){

    if(data.length==0){
        alert("Data de nascimento é obrigatória")
        document.getElementById('date').style.borderColor = 'red'
    }
    var re = /^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$/
    if (!data.match(re) && data.length>0) {
        alert("Digite uma data de nascimento válida")
        document.getElementById('date').style.borderColor = 'red'
    }
    if (data.match(re)) {
        document.getElementById('date').style.borderColor = 'green'
        return true;
    }
}

function validaEmail(email){
    
    if(email.length == 0){
        alert('Email é obrigatório')
        document.getElementById('email').style.borderColor = 'red'
    }
    if(!email.match(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i)&&email.length>0){
        alert("Digite um email válido")
        document.getElementById('email').style.borderColor = 'red'
    }
    if(email.match(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i)){
        document.getElementById('email').style.borderColor = 'green'
        return true;
    }
}