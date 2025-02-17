<?php
    if(isset($_GET['id'])){
        include_once '/rb/rb.php';

        R::setup(
            'mysql:host=127.0.0.1;dbname=tcd2024',
            'root',
            ''
        );

        $reservaparaexcluir = R::find('reservas', 'id LIKE?', [$_GET['id']]);
        R::trashAll($reservaparaexcluir);
        R::close();
        header('Location:minhasreservas.php?excluido=sim');
    }
?>