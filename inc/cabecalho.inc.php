<h2>Desenvolvimento Web</h2>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (strpos($_SERVER['REQUEST_URI'], 'index.php') !== false) {
    echo "Você está na página Home.";
} else {
    if (strpos($_SERVER['REQUEST_URI'], 'sobre.php') == false) {
        echo "<h3>" . $_SESSION['nome'] . " - Reserva de ambientes - 2024</h3>";
    }
    echo "<a href=\"Logout.php\">Logout</a> <br>";
    echo "<a href=\"index.php\">Home</a>";
}
