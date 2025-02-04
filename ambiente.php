<?php
include_once 'testanome.php';
// include_once 'testames.php';
// include_once 'testadatavalida.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambiente</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <header>
        <?php
        include 'inc\cabecalho.inc.php'
            ?>
    </header>
    <main>
        <h1>Seleção de ambiente</h1>
        <?php
        if (session_status() == !PHP_SESSION_ACTIVE) {
            session_start();
        }
        echo "<h2>Nome do reservante: " . $_SESSION['nome'] . "</h2>";
        // echo "<h3>Data da reserva: " . $_GET['data'] . "</h3><br>";
        ?>

        <form action="sumario.php" method="get">
            <fieldset>
                <legend>Ambientes para reserva</legend>

                <!-- <input type="checkbox" name="labinfoa" id="labinfoa">
                <label for="labinfoa">Laboratório de Informática A</label><br>
                <input type="checkbox" name="labinfob" id="labinfob">
                <label for="labinfob">Laboratório de Informática B</label> <br>
                <input type="checkbox" name="auditorio" id="auditorio">
                <label for="auditorio">Auditório</label> <br>
                <input type="checkbox" name="quadra" id="quadra">
                <label for="quadra">Quadra</label> <br>
                <input type="checkbox" name="estac" id="estac">
                <label for="estac">Estacionamento</label> <br> -->

                <select name="ambiente" id="ambiente" size="5">
                    <option value="labinfoa">Laboratório de Informática A</option>
                    <option value="labinfob">Laboratório de Informática B</option>
                    <option value="auditorio">Auditório</option>
                    <option value="quadra">Quadra</option>
                    <option value="estac">Estacionamento</option>
                </select>

                <input type="submit" value="Reservar">

            </fieldset>
        </form>
    </main>
    <footer>
        <?php
        include 'inc\rodape.inc.php'
            ?>
    </footer>
</body>

</html>