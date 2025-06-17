<?php
require 'db.php';
session_start();

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';


$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->execute([$email]);
$usuario = $stmt->fetch();

if (!$usuario) {
    echo "<p style='color:red;'>E-mail não encontrado. <a href='index.php'>Tente novamente</a></p>";
    exit;
}


if (!password_verify($senha, $usuario['senha'])) {
    echo "<p style='color:red;'>Senha incorreta. <a href='index.php'>Tente novamente</a></p>";
    exit;
}


$_SESSION['usuario_id'] = $usuario['id'];
header("Location: /3daw-Trabalho/catalogo.php");
exit;
