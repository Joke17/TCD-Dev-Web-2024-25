<p>2024.2 IFNMG - Alex Jr. , Ana Elisa, Felipe Gonçalves, João Eduardo & Joaquim Júneo &copy;</p>
<?php
if (strpos($_SERVER['REQUEST_URI'], 'sobre.php') !== false) {
    echo "Você está na página Sobre.";
} else {
    echo '<a href="sobre.php">Sobre</a>';
}
?>