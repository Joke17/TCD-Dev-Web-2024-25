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
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <header>
        <?php
        include 'inc\cabecalho.inc.php'
            ?>
    </header>
    <main>
        <h1>Home</h1>
        <?php
            if(isset($_GET['usuario'])){
                echo "<h3 style=\"color:red\">Nome ou senha incorretos</h3>";
            }
        ?>
        <form action="login.php" method="get">  
            <fieldset>
                <legend>Reserva de Ambientes</legend>
                <label for="nome">Nome: </label>
                <input type="text" id="nome" name="nome"> <br>
                <label for="nome">Senha: </label>
                <input type="text" id="senha" name="senha"> <br>
                <input type="submit" value="Entrar">
            </fieldset>
        </form>
        <a href="login.php?visitante=sim">Entra como vistante</a>
        <!-- <a href="ambiente.php?publico=sim">Entar sem Login</a> -->
    </main>
    <footer>

        <?php
        include 'inc\rodape.inc.php'
            ?>
    </footer>
</body>

</html>