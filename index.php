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
        include '/xampp/htdocs/web2024/trab3tri/inc/cabecalho.inc.php'
            ?>
    </header>
    <main>
        <h1>Home</h1>
        <form action="login.php" method="get">
            <fieldset>
                <legend>Reserva de Ambientes</legend>
                <label for="nome">Nome: </label>
                <input type="text" id="nome" name="nome">
                <input type="submit" value="OK">
            </fieldset>
        </form>
    </main>
    <footer>

        <?php
        include '/xampp/htdocs/web2024/trab3tri/inc/rodape.inc.php'
            ?>
    </footer>
</body>

</html>