<?php
session_start();
require 'db.php';

header('Content-Type: application/json');

if (!isset($_SESSION['usuario_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Usuário não está logado']);
    exit;
}

$usuario_id = $_SESSION['usuario_id'];
$produto_id = $_POST['produto_id'] ?? null;

if (!$produto_id) {
    http_response_code(400);
    echo json_encode(['error' => 'Produto não especificado']);
    exit;
}


$stmtCheck = $pdo->prepare("SELECT COUNT(*) FROM interesses WHERE produto_id = ? AND usuario_id = ?");
$stmtCheck->execute([$produto_id, $usuario_id]);

if ($stmtCheck->fetchColumn() > 0) {
    echo json_encode(['message' => 'Você já demonstrou interesse neste produto.']);
    exit;
}


$stmt = $pdo->prepare("INSERT INTO interesses (produto_id, usuario_id) VALUES (?, ?)");
if ($stmt->execute([$produto_id, $usuario_id])) {
    echo json_encode(['message' => 'Interesse registrado com sucesso!']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao registrar interesse.']);
}
