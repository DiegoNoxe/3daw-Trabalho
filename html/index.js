function verificarSenha(event) {
    event.preventDefault();


    let primeiraSenha = document.querySelector('.firstPassword').value;
    let segundaSenha = document.querySelector('.secondPassword').value;
   
    let temLetraMaiuscula = /[A-Z]/.test(primeiraSenha);
    let temLetraMinuscula = /[a-z]/.test(primeiraSenha);
    let temNumero = /\d/.test(primeiraSenha);


    if (primeiraSenha.length < 8) {
        alert("A senha deve ter pelo menos 8 caracteres.");
        return false;
    }
    if (!temLetraMaiuscula || !temLetraMinuscula || !temNumero) {
        alert("A senha deve conter pelo menos uma letra maiúscula, uma letra minúscula e um número.");
        return false;
    }
    if (primeiraSenha !== segundaSenha) {
        alert("As senhas não coincidem.");
        return false;
    }


    alert("Cadastro realizado com sucesso!");
    return true;
}

if(verificarSenha == true){
    changePage();
}


function changePage(){
    setTimeout(function(){
        window.location.href = "sucessoCadastro.html";
    }, 3000);
}


