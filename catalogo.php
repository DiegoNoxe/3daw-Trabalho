<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

require 'db.php';

$usuario_id = $_SESSION['usuario_id'];

<<<<<<< HEAD
  
  $stmt = $pdo->prepare("SELECT p.*, u.nome AS nome_usuario 
                          FROM produtos p 
                          JOIN usuarios u ON p.usuario_id = u.id
                          WHERE p.usuario_id != ?");
  $stmt->execute([$usuario_id]);
  $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
=======
$stmt = $pdo->prepare("SELECT p.*, u.nome AS nome_usuario 
                       FROM produtos p 
                       JOIN usuarios u ON p.usuario_id = u.id
                       WHERE p.usuario_id != ?");
$stmt->execute([$usuario_id]);
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
>>>>>>> fa696fb9c04b30c394595e03444a77b460ead749
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Catálogo</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/catalogo.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
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

<div class="lista-produto">

  <div class="topicos">
    <a href="meus_produtos.html">Meus Produtos</a>
  </div>

  <div class="filtro">
    <label>Filtrar por:</label>
    <input type="radio" id="todos" name="filtro" checked />
    <label for="todos">Todos</label>

    <input type="radio" id="interesse" name="filtro" />
    <label for="interesse">Só de Interesse</label>
  </div>

  <?php if (count($produtos) > 0): ?>
    <?php foreach ($produtos as $produto): ?>
      <div class="produto" data-produto-id="<?= $produto['id'] ?>">
        <div class="produto-info">
          <h3><?= htmlspecialchars($produto['nome']) ?></h3>
          <p><?= htmlspecialchars($produto['descricao']) ?></p>
          <p><strong>Dono:</strong> <?= htmlspecialchars($produto['nome_usuario']) ?></p>
        </div>
        <button class="botao-interesse" onclick="marcarInteresse(this)">Tenho Interesse</button>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p>Não há produtos disponíveis no momento.</p>
  <?php endif; ?>

</div>

<footer class="footer">
  <div class="container">
    <div class="copyright text-center">
      © 2025 Ecoescambo. Todos os direitos reservados.
    </div>
  </div>
</footer>

<script>
function marcarInteresse(botao) {
  const produtoDiv = botao.closest('.produto');
  const produtoId = produtoDiv.getAttribute('data-produto-id');

  fetch('marcar_interesse.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    body: `produto_id=${produtoId}`
  })
  .then(response => response.json())
  .then(data => {
    if (data.message) {
      alert(data.message);
      botao.disabled = true;
      botao.textContent = 'Interesse registrado';
    } else if (data.error) {
      alert('Erro: ' + data.error);
    }
  })
  .catch(() => alert('Erro ao enviar interesse.'));
}
</script>

</body>
</html>
