<?php
    session_start();

    include '/rb/rb.php';

    R::setup(
        'mysql:host=127.0.0.1;dbname=tcd2024',
        'root',
        ''
    );

    $usuario = R::findAll('usuarios');

    foreach ($usuario as $user) {
        if($user['nome'] == $_GET['nome']){
            if($user['senha'] == $_GET['senha']){
                $valido = "true";
            }
        }
    }
    if($valido == "true"){
        $_SESSION['nome'] = $_GET['nome'];
        if($user['nome']->admin == 1){
            $_SESSION['admin'] = true;
        }
        header('Location:ambiente.php');
    }else{
        header('Location:index.php?usuario=null');
    }
    
    // if ($usuario == null) {
    //     header('Location:index.php?usuario=null');
    // } else {
    //     $_SESSION['nome'] = $_GET['nome'];
    //     header('Location:ambiente.php');
    // }
?>