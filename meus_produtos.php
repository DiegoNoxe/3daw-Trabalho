<?php
session_start();
require 'db.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

$usuario_id = $_SESSION['usuario_id'];


$stmt = $pdo->prepare("SELECT * FROM produtos WHERE usuario_id = ?");
$stmt->execute([$usuario_id]);
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Meus Produtos</title>
  <link rel="stylesheet" href="css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<nav class="navbar bg-dark">
  <a href="index.php" style="position: absolute; color: white; font-size: 2rem; margin-left: 20px;">
    <i class="fa-solid fa-door-open"></i>
  </a>
  <div class="container" style="justify-content: center;">
    <h1 class="text-info">Ecoescambo 🌲</h1>
  </div>
</nav>

<div class="container mt-4">
  <h2>Meus Produtos</h2>

  <?php if (count($produtos) > 0): ?>
    <?php foreach ($produtos as $produto): ?>
      <div class="card mb-3">
        <div class="card-body">
          <h4 class="card-title"><?= htmlspecialchars($produto['nome']) ?></h4>
          <p class="card-text"><?= htmlspecialchars($produto['descricao']) ?></p>

          <?php
    
          $stmtInteresse = $pdo->prepare("
            SELECT u.nome 
            FROM interesses i
            JOIN usuarios u ON i.usuario_id = u.id
            WHERE i.produto_id = ?
          ");
          $stmtInteresse->execute([$produto['id']]);
          $interessados = $stmtInteresse->fetchAll(PDO::FETCH_COLUMN);
          ?>

          <h5>Interessados (<?= count($interessados) ?>):</h5>
          <?php if (count($interessados) > 0): ?>
            <ul>
              <?php foreach ($interessados as $nome): ?>
                <li><?= htmlspecialchars($nome) ?></li>
              <?php endforeach; ?>
            </ul>
          <?php else: ?>
            <p>Nenhum interessado ainda.</p>
          <?php endif; ?>

        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p>Você ainda não tem produtos cadastrados.</p>
  <?php endif; ?>
</div>

</body>
</html>
