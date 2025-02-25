<hr>
<?php
if (strpos($_SERVER['REQUEST_URI'], 'sobre.php') !== false || strpos($_SERVER['REQUEST_URI'], 'index.php') !== false) {
    echo "A nossa equipe agradece o acesso!";
} else {
    echo "<a href=\"sobre.php\">Sobre Nossa Equipe</a>";
}
?>
<p>2024.2 IFNMG - Alex Jr. , Ana Elisa, Felipe Gonçalves, João Eduardo & Joaquim Júneo &copy;</p>