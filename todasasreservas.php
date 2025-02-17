<?php
include_once 'testanome.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumário</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* details {
            border: solid 1px black;
            border-radius: 7px;

        } */

        table {
            margin: 5px auto;
            border: solid 3px black;
            padding: 3px;
        }

        th {
            border: solid 1px black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <header>
        <?php
        include '/inc/cabecalho.inc.php'
            ?>
    </header>
    <main>
        <h1>Todas as Reservas Feitas</h1>
        <?php
        include_once '/rb/rb.php';

        R::setup(
            'mysql:host=127.0.0.1;dbname=tcd2024',
            'root',
            ''
        );

        echo "<h2>Todas as Reservas feitas</h2>";

        $iniciotabela = <<<AAA
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Reservante</th>
                        <th>Data da reserva</th>
                        <th>Ambiente reservado</th>
                    </thead>
                    <tbody>
AAA;

        $corpotabela = <<<NNN
            <tr>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                        </tr>
NNN;

        echo $iniciotabela;

        $allreservas = R::findAll('reservas');
        foreach ($allreservas as $key => $value) {
            printf(
                $corpotabela,
                $value->id,
                $value->nome_reservante,
                $value->data_reservada,
                $value->ambiente
            );
        }

        echo "  </tbody>
                    </table>";

        R::close();
        ?>

        <p><a href="calendario.php">Realizar outra reseva</a></p>

    </main>
    <footer>
        <?php
        include '/inc/rodape.inc.php'
            ?>
    </footer>
</body>

</html>