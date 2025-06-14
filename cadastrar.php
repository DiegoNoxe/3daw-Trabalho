<?php
require 'db.php';

$email = $_POST['email'] ?? '';
$nome = $_POST['nome'] ?? '';
$senha = $_POST['senha'] ?? '';
$senha2 = $_POST['senha2'] ?? '';


if (!$email || !$nome || !$senha || !$senha2) {
    die("Preencha todos os campos.");
}

if ($senha !== $senha2) {
    die("As senhas não coincidem.");
}


if (
    strlen($senha) < 8 ||
    !preg_match('/[A-Z]/', $senha) ||    
    !preg_match('/[a-z]/', $senha) ||    
    !preg_match('/[0-9]/', $senha)       
) {
    die("A senha deve conter pelo menos 8 caracteres, incluindo uma letra maiúscula, uma minúscula e um número.");
}


$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

try {
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $email, $senhaHash]);

    echo "Cadastro realizado com sucesso! <a href='index.php'>Fazer login</a>";
} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        die("E-mail já cadastrado.");
    } else {
        die("Erro ao cadastrar: " . $e->getMessage());
    }
}
?>
