<?php
    include "/rb/rb.php";

    R::setup(
        'mysql:host=127.0.0.1;dbname=tcd2024',
        'root',
        ''
    );

    $ambientes = R::dispense('ambientes');
    $ambientes->categoria = $_GET['categoria'];
    $ambientes->nome_ambiente = $_GET['ambiente'];
    $ambientes->imagem = $_GET['fotoamb'];

    $id = R::store($ambientes);

    header('Location:criarambientes.php?criado=sim')

?>


