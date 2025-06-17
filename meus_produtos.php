<?php 
session_start();

if(!isset($_SESSION['usuario_id'])){
    header('Location: login.php');
    exit();
}

require 'db.php';

$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT * FROM produtos WHERE usuario_id = :usuario_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['usuario_id' => $usuario_id]);
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meus Produtos</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/catalogo.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="/img/webIcon.png" type="image/x-icon">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
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
    <a href="catalogo.php">Catálogo</a>
    <a href="cadastrar_produto.php" class="btn btn-success btn-sm">+ Novo Produto</a>
  </div>

  <div class="filtro">
    <label>Filtrar por:</label>
    <input type="radio" id="todos" name="filtro" checked>
    <label for="todos">Todos</label>

    <input type="radio" id="interessados" name="filtro">
    <label for="interessados">Há Interesse</label>
  </div>

 <?php if (count($produtos) > 0): ?>
      <?php foreach ($produtos as $produto): ?>
          <div class="produto">
              <img src="https://via.placeholder.com/150" alt="Produto" class="produto-img">
              
              <div class="produto-info">
                  <h3><?= htmlspecialchars($produto['nome']) ?></h3> 
                  <p><?= htmlspecialchars($produto['descricao']) ?></p>
              </div>
              
              <button class="botao-interesse" onclick="verInteresses(<?= $produto['id'] ?>)">Ver Interesses</button>
              <button class="btn btn-warning btn-sm" onclick="editarProduto(<?= $produto['id'] ?>)">Editar</button>
              <button class="btn btn-danger btn-sm" onclick="excluirProduto(<?= $produto['id'] ?>)">Excluir</button>
          </div>
      <?php endforeach; ?>
  <?php else: ?>
      <p>Você não tem produtos cadastrados.</p>
  <?php endif; ?>
</div>


<footer class="footer">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="footer-brand">Ecoescambo</div>
        <p class="footer-text">Conectando pessoas e propósitos: aqui, seu descarte vira oportunidade, e cada troca é
          um passo rumo a um planeta mais verde</p>
        <div class="social-links">
          <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
          <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
          <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
          <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
        </div>
      </div>

      <div class="col-md-6 text-md-end">
        <ul class="footer-links">
          <li><a href="#">Sobre</a></li>
          <li><a href="#">Serviços</a></li>
          <li><a href="#">Contato</a></li>
          <li><a href="#">Privacidade</a></li>
          <li><a href="#">Termos</a></li>
        </ul>
      </div>
    </div>

    <div class="copyright text-center">
      © 2025 Belo's trabalho. All rights reserved.
    </div>
  </div>
</footer>


<script src="javascript/meus_produtos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>

function verInteresses(produtoId) {
    alert('Ver interesses do produto ' + produtoId);
}

function editarProduto(produtoId) {
    window.location.href = 'editar_produto.php?id=' + produtoId;
}

function excluirProduto(produtoId) {
    if (confirm('Tem certeza que deseja excluir este produto?')) {
        window.location.href = 'excluir_produto.php?id=' + produtoId;
    }
}
</script>

</body>
</html>