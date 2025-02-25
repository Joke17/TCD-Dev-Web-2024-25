<?php
include_once 'testanome.php';

if(isset($_GET['exclusao'])){
    include_once '/rb/rb.php';

    R::setup(
        'mysql:host=127.0.0.1;dbname=tcd2024',
        'root',
        ''
    );

    $reservaparaexcluir = R::find('reservas', 'id LIKE ?', [$_GET['id']]);
    R::trashAll($reservaparaexcluir); // por mais que tenha apenas um elemento, por ser um array é necessário o trashAll
    R::close();
    header('Location:todasasreservas.php?excluido=sim');

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas as Reservas</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/36842ecef1.js" crossorigin="anonymous"></script>

    <style>
        /* details {
            border: solid 1px black;
            border-radius: 7px;

        } */

        table {
            margin: 5px auto;
            border: solid 3px black;
            padding: 3px;
            width: 60%;
        }

        th {
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

        if(isset($_GET['excluido'])){
            echo "<h3>Reserva excluida com sucesso</h3>";
        }

        $iniciotabela = <<<AAA
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Reservante</th>
                        <th>Data da reserva</th>
                        <th>Ambiente reservado</th>
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
                            <td class="excluir"><a href="todasasreservas.php?exclusao=sim&id=%s"><i class="fa-solid fa-trash"></i></a></td>
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
                $value->ambiente,
                $value->id
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