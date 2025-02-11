<h2>Desenvolvimento Web</h2>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (strpos($_SERVER['REQUEST_URI'], 'index.php') !== false) {
    echo "Você está na página Home.";
} else {
    date_default_timezone_set("America/Fortaleza");
    $horario = date('g');
    if($horario > 0 && $horario <12){
        $saudacao = "Bom dia";
    }
    if($horario >= 12 && $horario <17){
        $saudacao = "BOA TARDE";
    }
    if($horario > 17 && $horario <= 23){
        $saudacao = "Boa noite";
    }
    if (strpos($_SERVER['REQUEST_URI'], 'sobre.php') == false) {
        echo "<h3> $saudacao " . $_SESSION['nome'] . "!";
        echo "<br>Reserva de ambientes - 2024</h3><br>";
    }
    echo "<a href=\"Logout.php\">Logout</a> <br>";
    echo "<a href=\"index.php\">Home</a> <br>";
    if($_SESSION['admin'] == 'sim'){
        echo "<a href=\"criarambientes.php\">Criar Ambientes</a> <br>";
        echo "<a href=\"criarusuario.php\">Criar Usuário</a>";
    }
}
