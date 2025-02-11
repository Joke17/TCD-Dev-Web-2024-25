<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <?php
        include 'inc\cabecalho.inc.php';
        ?>
    </header>

    <main>
        <?php
        include_once '/rb/rb.php';

        R::setup(
            'mysql:host=127.0.0.1;dbname=tcd2024',
            'root',
            ''
        );

        echo var_dump($_SESSION);

        $reservasfeitas = R::findAll('reservas');

        if ($reservasfeitas == null) { // verifica se há reserva na tabela no banco 
            for ($i = 8; $i <= 18; $i++) {
                echo "<a href=\"armazenareserva.php?hora=$i\">$i:00</a> <br>";
            }
        } else {
            for ($i = 8; $i <= 18; $i++) {
                $rodou = false;
                foreach ($reservasfeitas as $reserva) {
                        if ($reserva->ambiente == $_SESSION['ambiente']) {
                            $rodou = true;
                            if ($reserva->horareservada == $i) {
                                echo "<p style=\"color:red\">$hora:00 <br>";
                            } else {
                                echo "<p><a href=\"armazenareserva.php?hora=$i\">$i:00</a></p> <br>";
                            }
                        }
                    
                }
            }
        }


        ?>

    </main>

    <footer>
        <?php
        include 'inc\rodape.inc.php';
        ?>
    </footer>
</body>

</html>