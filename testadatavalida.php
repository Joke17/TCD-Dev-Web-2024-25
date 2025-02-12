<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
if (isset($_GET['data'])) {
    $dataselecionada = $_GET['data'];

    $anohoje = date('Y');
    $meshoje = date('m');
    $diahoje = date('d');

    $anoselecionado = date('Y', strtotime($dataselecionada));
    $messelecionado = date('m', strtotime($dataselecionada));
    $diaselecionado = date('d', strtotime($dataselecionada));



    if (($anoselecionado < $anohoje)) {
        header('Location:calendario.php?invalido=true');
    }
    if ($messelecionado < $meshoje && $anoselecionado <= $anohoje) {
        header('Location:calendario.php?invalido=true');
    }
    if (($diaselecionado < $diahoje) && ($messelecionado <= $meshoje) && ($anoselecionado < $anohoje)) {
        header('Location:calendario.php?invalido=true');
     } else {
        $_SESSION['data'] = $dataselecionada;
        header("Location:reservarhorario.php");
    }

    // if ($anoselecionado < $anohoje) {
    //     header('Location:calendario.php?invalido=true');
    // } else if ($messelecionado < $meshoje) {
    //     header('Location:calendario.php?invalido=true');
    // } else if ($diaselecionado < $diahoje) {
    //     header('Location:calendario.php?invalido=true');
    // } else {
    //     header("Location:ambiente.php?data=$dataselecionada");
    // }
}
