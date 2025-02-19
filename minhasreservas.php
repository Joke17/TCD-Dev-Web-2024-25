<?php
include_once 'testanome.php';
// include_once 'testames.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumário</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/36842ecef1.js" crossorigin="anonymous"></script>
    <style>


        table {
            width: 70%;
        }

        /* th {
            border: solid 1px black;
            padding: 5px;
        } */
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

        // $ambientes = [
        //     'labinfoa' => 'Laboratório de Informática A',
        //     'labinfob' => 'Laboratório de Informática B',
        //     'auditorio' => 'Auditório',
        //     'quadra' => 'Quadra Poliesportiva',
        //     'estac' => 'Estacionamento',
        // ];

        // $reserva = R::dispense('reserva');
        // $reserva->nome = $_SESSION['nome'];
        // $reserva->datareserva = $_SESSION['datacompleta'];
        // // $nomeresrvante->ambiente = $_GET['ambiente'];
        // $reserva->ambiente = $ambientes[$_GET['ambiente']]; // assim fica mais bonito no bd
        // $id = R::store($reserva);


        echo "<h2>Suas reservas ".  $_SESSION['nome'] . "</h2>";

        // echo "<p>O usuário <b>" . $_SESSION['nome'] . "</b> reservou o ambiente <b>" . $_SESSION['ambiente'] . "</b> na data <b>" . $_SESSION['datacompleta'] . "</b>. ID da reserva " . $reserva->id . "</p>";

        $iniciotabela = <<<AAA
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Reservante</th>
                        <th>Ambiente reservado</th>
                        <th>Data da reserva</th>
                        <th>Hora reservada</th>
                        <th>Excluir</th>
                    </thead>
                    <tbody>
AAA;

        $corpotabela = <<<NNN
            <tr>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s:00</td>
                <td class="excluir"><a href="excluirreserva.php?id=%s"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
NNN;


        $reservasusuario = R::find('reservas', 'nome_reservante LIKE ?', [$_SESSION['nome']]);


        echo $iniciotabela;

        foreach ($reservasusuario as $value) {
            printf(
                $corpotabela,
                $value->id,
                $value->nome_reservante,
                $value->ambiente,
                $value->data_reservada,
                $value->hora_reservada,
                $value->id
            );
        }

        echo " </tbody>
            </table>";

        R::close();
        ?>

        <p><a href="ambiente.php">Realizar outra reseva</a></p>

    </main>
    <footer>
        <?php
        include 'inc\rodape.inc.php'
        ?>
    </footer>
</body>

</html>