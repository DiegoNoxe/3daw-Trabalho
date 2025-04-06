function verificarSenha(event) {
    event.preventDefault(); 

    let primeiraSenha = document.querySelector('.firstPassword').value.trim();
    let segundaSenha = document.querySelector('.secondPassword').value.trim();
    let nome = document.getElementById('campoNome').value.trim();

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

    if (!/^[a-zA-ZÀ-ÿ\s]+$/.test(nome)) {
        alert("Nome inválido! Use apenas letras.");
        return false;
    }
    

    alert("Cadastro realizado com sucesso!");

    setTimeout(function() {
        window.location.href = "sucessoCadastro.html";
    }, 1000);

    return true;
}
