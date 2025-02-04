<?php
    include "/rb/rb.php";

    R::setup(
        'mysql:host=127.0.0.1;dbname=tcd2024',
        'root',
        ''
    );

    $ambientes = R::dispense('ambientes');
    $ambientes->categoria = $_GET['categoria'];
    $ambientes->ambiente = $_GET['ambiente'];

    $id = R::store($ambientes);

    header('Location:criarambiente.php?criado=sim')

?>


