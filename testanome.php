<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['nome'] == null || $_SESSION['nome'] == '') {
    header('Location:index.php');
}
?>  