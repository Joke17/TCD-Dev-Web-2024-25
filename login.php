<?php
session_start();
$_SESSION['nome'] = $_GET['nome'];
header('Location:ambiente.php');
?>