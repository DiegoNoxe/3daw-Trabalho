<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Erro Senha</title>
    <style>
        body {
            background-color: #f0fdf4;
            font-family: Arial;
        }
        .container {
            max-width: 500px;
            margin: 100px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            text-align: center;
        }
        .container h1 {
            color:rgb(175, 76, 76);
        }
        .container a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 25px;
            background-color:rgb(175, 76, 76);
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .container a:hover {
            background-color:rgb(175, 76, 76);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>❌ Formato da senha não permitido</h1>
        <p>A senha deve conter pelo menos 8 caracteres, incluindo uma letra maiúscula, uma minúscula e um número.</p>
        <a href="index.php">Fazer Login</a>
    </div>
</body>
</html>
