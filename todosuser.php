<?php
if (isset($_GET['exclusao'])) {
    include_once '/rb/rb.php';

    R::setup(
        'mysql:host=127.0.0.1;dbname=tcd2024',
        'root',
        ''
    );

    $usuarioparaexcluir = R::find('usuarios', 'id LIKE ?', [$_GET['id']]);
    R::trashAll($usuarioparaexcluir); // por mais que tenha apenas um elemento, por ser um array é necessário o trashAll
    R::close();
    header('Location:todosuser.php?excluido=sim');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos os Usuários</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/36842ecef1.js" crossorigin="anonymous"></script>


    <style>
        table {
            margin: 5px auto;
            border: solid 3px black;
            padding: 3px;
            width: 45%;
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

        if (isset($_GET['excluido'])) {
            echo "<h3>Usuário excluido com sucesso</h3>";
        }

        $iniciotabela = <<<AAA
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Senha</th>
                        <th>Administrador</th>
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
                <td class="excluir"><a href="todosuser.php?exclusao=sim&id=%s"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
NNN;
        echo $iniciotabela;
        $usuarios = R::findAll('usuarios');
        foreach ($usuarios as $value) {
            if ($value->admin == true) {
                $adm = "Sim";
            } else {
                $adm = "Não";
            }
            printf(
                $corpotabela,
                $value->id,
                $value->nome,
                $value->senha,
                $adm,
                $value->id
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