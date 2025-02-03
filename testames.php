<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['mes'] == null || $_SESSION['mes'] == '') {
    header('Location:calendario.php');
}

?>