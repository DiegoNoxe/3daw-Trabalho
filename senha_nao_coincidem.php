<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8" />
<title>Erro Senha</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');

  body {
    background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
    font-family: 'Inter', sans-serif;
    margin: 0;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .container {
    background: #fff;
    padding: 40px 35px;
    border-radius: 15px;
    box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    max-width: 450px;
    text-align: center;
    transition: transform 0.3s ease;
  }

  .container:hover {
    transform: translateY(-5px);
  }

  h1 {
    color: #d63636;
    font-size: 2.5rem;
    margin-bottom: 20px;
    user-select: none;
  }

  p {
    font-size: 1.1rem;
    color: #555;
    line-height: 1.5;
    margin-bottom: 30px;
  }

  a {
    background-color: #d63636;
    color: #fff;
    text-decoration: none;
    padding: 14px 38px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 1rem;
    box-shadow: 0 5px 15px rgba(214, 54, 54, 0.4);
    display: inline-block;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    user-select: none;
  }

  a:hover {
    background-color: #b02a2a;
    box-shadow: 0 8px 25px rgba(176, 42, 42, 0.6);
  }
</style>
</head>
<body>
  <div class="container">
    <h1>❌ Formato da senha não permitido</h1>
    <p>A senha deve conter pelo menos 8 caracteres, incluindo uma letra maiúscula, uma minúscula e um número.</p>
    <a href="index.php" role="button">Fazer Login</a>
  </div>
</body>
</html>
