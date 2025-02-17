<?php
if(isset($_GET['exclusao'])){
    include_once '/rb/rb.php';

    R::setup(
        'mysql:host=127.0.0.1;dbname=tcd2024',
        'root',
        ''
    );

    $usuarioparaexcluir = R::find('usuarios', 'nome LIKE ?', [$_GET['nome']]);
    R::trashAll($usuarioparaexcluir); // por mais que tenha apenas um elemento, por ser um array é necessário o trashAll
    R::close();
    header('Location:excluirusuario.php?excluido=sim');

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuários</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        table {
            margin: 5px auto;
            border: solid 3px black;
            padding: 3px;
        }

        th {
            /* border: solid 1px black; */
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
        <?php

        include_once '/rb/rb.php';

        R::setup(
            'mysql:host=127.0.0.1;dbname=tcd2024',
            'root',
            ''
        );

        if(isset($_GET['excluido'])){
            echo "<h3>Usuário excluido com sucesso</h3>";
        }

        $iniciotabela = <<<AAA
            <table>
                <thead>
                    <th>Ambientes</th>
                </thead>
                <tbody>
AAA;
        $corpotabela = <<<NNN
            <tr>
                <td>
                <a href="excluirusuario.php?exclusao=sim&nome=%s">%s</a>
                </td>
            </tr>
NNN;
        echo $iniciotabela;
        $ambientes = R::findAll('usuarios');
        foreach ($ambientes as $value) {
            printf(
                $corpotabela,
                $value->nome,
                $value->nome
            );
        }

        echo "</tbody>
                </table>";
        ?>
    </main>

    <footer>
        <?php
        include 'inc\rodape.inc.php'
        ?>
    </footer>
</body>

</html>