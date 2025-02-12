<?php

include_once '/rb/rb.php';
R::setup(
    'mysql:host=127.0.0.1;dbname=tcd2024',
    'root',
    ''
);
if(session_status() == PHP_SESSION_NONE){
session_start();
}

$novareserva = R::dispense('reservas');
$novareserva->nome_reservante = $_SESSION['nome'];
$novareserva->ambiente = $_SESSION['ambiente'];
$novareserva->data_reservada = $_SESSION['data'];
$novareserva->hora_reservada = $_GET['hora'];

$id = R::store($novareserva);

header('Location:reservarhorario.php');