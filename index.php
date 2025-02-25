<?php
if (session_status() == PHP_SESSION_ACTIVE) {
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

        * {
            font-family: "Inter", serif;
            font-optical-sizing: auto;
            font-style: normal;
        }

        body {
            background-color: lightblue;
        }

        div {
            border: 1px solid gray;
            background-color: lightgrey;
            width: 40%;
            height: 270px;
            margin: 13% auto;
            text-align: center;
            border-radius: 20px;
        }
        label{
            margin: 15px
        }
        input{
            margin: 15px;
        }
    </style>

</head>

<body>
    <header>
        <?php
        // include 'inc\cabecalho.inc.php'
        ?>
    </header>
    <main>
        <div>
            <h2>Sistema de Reserva de Ambientes - Login</h2>
            <?php
            if (isset($_GET['usuario'])) {
                echo "<h3 style=\"color:red\">Nome ou senha incorretos</h3>";
            }
            ?>
            <form action="login.php" method="get">
                <label for="nome">Nome: </label>
                <input type="text" id="nome" name="nome"> <br>
                <label for="nome">Senha: </label>
                <input type="text" id="senha" name="senha"> <br>
                <input type="submit" value="Entrar">
            </form>
            <a href="login.php?visitante=sim">Entrar como vistante</a>
        </div>
        <!-- <a href="ambiente.php?publico=sim">Entar sem Login</a> -->
    </main>
    <footer>

        <?php
        // include 'inc\rodape.inc.php'
        ?>
    </footer>
</body>

</html>