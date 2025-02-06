<?php
    include "/rb/rb.php";

    R::setup(
        'mysql:host=127.0.0.1;dbname=tcd2024',
        'root',
        ''
    );

    $usuario = R::dispense('usuarios');
    $usuario->nome = $_GET['nome'];
    $usuario->senha = $_GET['senha'];
    if($_GET['adm'] == "on"){
        $usuario->admin = true;
    }else{
        $usuario->admin = false;

    }

    $id = R::store($usuario);

    header('Location:criarusuario.php?criado=sim')

?>


