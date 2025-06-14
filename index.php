<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoEscambo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="../img/webIcon.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="slogan">
            <h1><span class="color">T</span>roca <span class="color">c</span>onsciente, <span class="color">f</span>uturo <span class="color">p</span>resente.</h1>
        </div>
        <form method="POST" action="login.php">
            <div class="content">
                <h2>Ecoescambo</h2>
                <div class="container-Input">
                    <input class="anima-Input" id="campoEmail" name="email" type="email" placeholder="Email" required>
                </div>
                <div class="container-Input">
                    <input class="anima-Input" name="senha" type="password" pattern=".{8,}" required placeholder="Senha"
                    title="A senha deve ter no mínimo 8 caracteres.">
                </div>

                <div style="margin-top: 10px;" class="userLogin">
                    <div style="text-align: center;">
                        <button class="btn" type="submit">Login</button>
                    </div>

                    <div class="esqueci">
                        <span class="esqueceuSenha">
                            <a href="recupera.html">Esqueceu a senha?</a>
                        </span>
                    </div>
                </div>

                <hr style="background-color: rgb(0, 0, 0); height: 5px; width: 100%; margin-top: 50px; border-color: #000000;">
                <div class="noUser">
                    <span class="usuario">Ainda não é usuário?</span>
                    <div>
                        <a style="display: block; text-align: center; font-size: 1.1rem;" class="btn" href="cadastro_utilizador.html">Cadastrar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        let inputs = document.querySelectorAll(".anima-Input");

        function animar() {
            setTimeout(function () {
                inputs.forEach(function (e) {
                    e.classList.add("animate__animated", "animate__flash");
                });
            }, 10000);
        }
        animar();
    </script>
</body>
</html>
