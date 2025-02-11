<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <?php
        include 'inc\cabecalho.inc.php';
        ?>
    </header>

    <main>
        <?php
            for($i=8;$i<=18;$i++){
                echo "<a href=\"armazenareserva.php?hora=$i\">$i</a> <br>";
            }
        ?>
        
    </main>

    <footer>
        <?php
        include 'inc\rodape.inc.php';
        ?>
    </footer>
</body>

</html>