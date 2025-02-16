<h2>Desenvolvimento Web</h2>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (strpos($_SERVER['REQUEST_URI'], 'index.php') !== false) {
    echo "Você está na página Home.";
} else {
    date_default_timezone_set("America/Fortaleza");
    $horario = date('G');
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
    echo "<a href=\"ambiente.php\">Home</a> <br>";
    echo "<a href=\"minhasreservas.php\">Minhas Reservas</a><br>";
    if($_SESSION['admin'] == 'sim'){
        echo "
        <details>
            <summary>Ambiente</summary>
            <ul>
            <li><a href=\"criarambientes.php\">Criar Ambiente</a></li>
            <li><a href=\"excluirambiente.php\">Excluir Ambiente</a></li>
            </ul>
        </details>
        ";
        echo "
        <details>
            <summary>Usuário</summary>
            <ul>
            <li><a href=\"criarusuario.php\">Criar Usuário</a></li>
            <li><a href=\"excluirusuario.php\">Excluir Usuário</a></li>
            </ul>
        </details>
        ";
        echo "<a href=\"todasasreservas.php\">Todas as reservas</a> <br>";
    }
}
