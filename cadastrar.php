<?php
require 'db.php';

$email = $_POST['email'] ?? '';
$nome = $_POST['nome'] ?? '';
$senha = $_POST['senha'] ?? '';
$senha2 = $_POST['senha2'] ?? '';

// validações da senha

if (!$email || !$nome || !$senha || !$senha2) {
    die("Preencha todos os campos.");
}

if ($senha !== $senha2) {
    header("Location: senha_nao_coincidem.php");
    exit;
}

if (
    strlen($senha) < 8 ||
    !preg_match('/[A-Z]/', $senha) ||    
    !preg_match('/[a-z]/', $senha) ||    
    !preg_match('/[0-9]/', $senha)       
) {
    header("Location: senha_insuf.php");
    exit;
}

// Verificar se o email já existe
$stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE email = ?");
$stmt->execute([$email]);
if ($stmt->fetchColumn() > 0) {
    header("Location: erro_email.php");
    exit;
}


$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

try {
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $email, $senhaHash]);
    header("Location: sucessocadastro.php" );
    exit;
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            header("Location: erro_email.php" );
            exit;
        } else {
            header("Location: erro_cadastro.php" );
            exit;
        }
    }
?>