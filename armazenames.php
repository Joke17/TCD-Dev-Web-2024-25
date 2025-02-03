<?php
session_start();
$_SESSION['mes'] = $_GET['mes'];
$location = "Location:calendario.php?mes=" . $_SESSION['mes'];
header($location);
?>