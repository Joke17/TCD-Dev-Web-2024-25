<?php
session_start();
unset($_SESSION['nome']);
unset($_SESSION['mes']);
session_destroy();
header("Location:index.php");
?>