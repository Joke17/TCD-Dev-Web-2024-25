<?php
include_once 'testanome.php';
include_once 'testames.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumário</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        details {
            border: solid 1px black;
            border-radius: 7px;

        }

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
        include 'inc\cabecalho.inc.php'
            ?>
    </header>
    <main>
        <h1>Sumário</h1>
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        include_once '/rb/rb.php';

        R::setup(
            'mysql:host=127.0.0.1;dbname=tcd2024',
            'root',
            ''
        );

        $ambientes = [
            'labinfoa' => 'Laboratório de Informática A',
            'labinfob' => 'Laboratório de Informática B',
            'auditorio' => 'Auditório',
            'quadra' => 'Quadra Poliesportiva',
            'estac' => 'Estacionamento',
        ];

        $reserva = R::dispense('reserva');
        $reserva->nome = $_SESSION['nome'];
        $reserva->datareserva = $_SESSION['datacompleta'];
        // $nomeresrvante->ambiente = $_GET['ambiente'];
        $reserva->ambiente = $ambientes[$_GET['ambiente']]; // assim fica mais bonito no bd
        $id = R::store($reserva);


        echo "<h2>Reserva Concluída com sucesso</h2>";

        echo "<p>O usuário <b>" . $_SESSION['nome'] . "</b> reservou o ambiente <b>" . $ambientes[$_GET['ambiente']] . "</b> na data <b>" . $_SESSION['datacompleta'] . "</b>. ID da reserva " . $reserva->id . "</p>";

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


        echo "<details>
                        <summary>Todas as Reservas</summary>";

        echo $iniciotabela;

        $allreservas = R::findAll('reserva');
        foreach ($allreservas as $key => $value) {
            printf(
                $corpotabela,
                $value->id,
                $value->nome_reservante,
                $value->ambiente,
                $value->data_reservada,
                $value->hora_reservada
            );
        }

        echo "  </tbody>
                    </table>    
                </details>";

        R::close();
        ?>

        <p><a href="calendario.php">Realizar outra reseva</a></p>

    </main>
    <footer>
        <?php
        include 'inc\rodape.inc.php'
            ?>
    </footer>
</body>

</html>