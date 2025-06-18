<?php
require 'db.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit;
}

$idDono = $_SESSION['usuario_id'];

$sql = "
    SELECT p.titulo, p.descricao, p.imagem, u.nome AS interessado_nome, u.email AS interessado_email
    FROM interesses i
    JOIN produtos p ON i.id_produto = p.id
    JOIN usuarios u ON i.id_usuario_interessado = u.id
    WHERE p.id_usuario = ?
    ORDER BY p.id DESC
";
$stmt = $pdo->prepare($sql);
$stmt->execute([$idDono]);
$interesses = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Meus Interesses</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f0fdf4;
        padding: 30px;
    }
    .container {
        background-color: white;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 0 12px rgba(0,0,0,0.1);
    }
    .produto {
        border-bottom: 1px solid #ccc;
        padding: 15px 0;
    }
    .produto img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        margin-right: 15px;
    }
    .interessado {
        margin-top: 5px;
        color: #333;
    }
  </style>
</head>
<body>

<div class="container">
    <h2 class="text-success">Usuários interessados nos seus produtos 🌱</h2>

    <?php if (count($interesses) > 0): ?>
        <?php foreach ($interesses as $item): ?>
            <div class="produto d-flex align-items-center">
                <img src="<?= htmlspecialchars($item['imagem']) ?>" alt="Imagem do Produto">
                <div>
                    <strong><?= htmlspecialchars($item['titulo']) ?></strong>
                    <p><?= htmlspecialchars($item['descricao']) ?></p>
                    <div class="interessado">
                        Interessado: <?= htmlspecialchars($item['interessado_nome']) ?> <br>
                        Email: <?= htmlspecialchars($item['interessado_email']) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>😕 Nenhum usuário demonstrou interesse ainda.</p>
    <?php endif; ?>

    <a href="catalogo.php" class="btn btn-secondary mt-3">Voltar ao Catálogo</a>
</div>

</body>
</html>
