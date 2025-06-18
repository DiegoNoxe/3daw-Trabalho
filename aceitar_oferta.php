<?php
require 'db.php';

$idOferta = $_POST['id'] ?? null;

if (!$idOferta) {
    http_response_code(400);
    echo "ID da oferta não fornecido.";
    exit;
}

$stmt = $pdo->prepare("UPDATE ofertas SET status = 'aceita' WHERE id = ?");
$stmt->execute([$idOferta]);

$stmt = $pdo->prepare("UPDATE ofertas SET status = 'recusada' WHERE id_produto_dono = (SELECT id_produto_dono FROM ofertas WHERE id = ?) AND id != ?");
$stmt->execute([$idOferta, $idOferta]);

echo "Oferta aceita com sucesso!";
