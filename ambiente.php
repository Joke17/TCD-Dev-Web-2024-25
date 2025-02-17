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
    <style>
        
    </style>
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

        include_once '/rb/rb.php';

        R::setup('mysql:host=127.0.0.1;dbname=tcd2024',
        'root',
        '');

        $ambientes = R::findAll('ambientes');
        $numerodeambientes = count($ambientes);

        $inicioformambiente = <<<AAA
        <form action="calendario.php" method="get">
            <fieldset>
                <legend>Ambientes para reserva</legend>

                <select name="ambiente" id="ambiente" size=$numerodeambientes>
AAA;

        $fimformambiente = <<<BBB
                </select>
                <br>
                <br>
                <input type="submit" value="Reservar">

            </fieldset>
        </form>
BBB;
        
        echo $inicioformambiente;

        foreach ($ambientes as $value) {
            echo "<option value=\"$value->nome_ambiente\">$value->nome_ambiente</option>";
        }

        echo $fimformambiente;

        ?>


                    


    </main>
    <footer>
        <?php
        include 'inc\rodape.inc.php'
            ?>
    </footer>
</body>

</html>