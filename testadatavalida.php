<?php
if (isset($_GET['data'])) {
    $dataselecionada = $_GET['data'];

    $anohoje = date('Y');
    $meshoje = date('m');
    $diahoje = date('d');

    $anoselecionado = date('Y', strtotime($dataselecionada));
    $messelecionado = date('m', strtotime($dataselecionada));
    $diaselecionado = date('d', strtotime($dataselecionada));



    if (($anoselecionado < $anohoje) && ($messelecionado < $meshoje) && ($diaselecionado < $diahoje)) {
        header('Location:calendario.php?invalido=true');
    }else {
        header("Location:calendario.php?data=$dataselecionada");
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
?>