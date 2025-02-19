<h2>Desenvolvimento Web</h2>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (strpos($_SERVER['REQUEST_URI'], 'index.php') !== false) {
    echo "<h4>Você está na página Home.</h4>";
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
    if($_SESSION['visitante']){
        echo "<a href=\"Logout.php\">Logout</a> <br>";
    } else {
        if (strpos($_SERVER['REQUEST_URI'], 'ambiente.php') == false) {
            echo "<h3> $saudacao " . $_SESSION['nome'] . "!";
            echo "<br>Reserva de ambientes - 2024</h3><br>";
        }
        echo "<nav>";
        echo "<p class=\"itemheader\"><a href=\"Logout.php\">Logout</a></p>";
        echo "<p class=\"itemheader\"><a href=\"ambiente.php\">Home</a></p>";
        echo "<p class=\"itemheader\"><a href=\"minhasreservas.php\">Minhas Reservas</a></p>";
        if($_SESSION['admin'] == 'sim'){
            echo "<p class=\"itemheader\"><a href=\"todasasreservas.php\">Todas as reservas</a></p> <br>";
            echo "
            <details class=\"itemheader\">
                <summary>Ambiente</summary>
                <ul>
                <li><a href=\"criarambientes.php\">Criar Ambiente</a></li>
                <li><a href=\"excluirambiente.php\">Excluir Ambiente</a></li>
                </ul>
            </details>
            ";
            echo "
            <details class=\"itemheader\">
                <summary>Usuário</summary>
                <ul>
                <li><a href=\"criarusuario.php\">Criar Usuário</a></li>
                <li><a href=\"excluirusuario.php\">Excluir Usuário</a></li>
                </ul>
            </details>
            ";
           
        }
        echo "</nav>
        <hr>";
    }
}
