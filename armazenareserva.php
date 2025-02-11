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
$novareserva->ambiente = $_SESSION['ambiente'];
$novareserva->data_reserva = $_SESSION['data'];
$novareserva->horareservada = $_GET['hora'];

$id = R::store($novareserva);

header('Location:reservarhorario.php');