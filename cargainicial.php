<?php
    include "/rb/rb.php";

    R::setup('mysql:host=127.0.0.1;dbname=tcd2024',
             'root',
             '');

    $usuarios = R::findAll('usuarios');

    if($usuarios == null){
        $usuarios = R::dispense('usuarios');
        $usuarios->nome = 'root';
        $usuarios->senha = 'asdf';
        $usuarios->admin = true;

        $id = R::store($usuarios);
    }
    header('Location:index.php');
?>