<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Ambientes</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <header>
        <?php
        include 'inc\cabecalho.inc.php'
        ?>
    </header>

    <main>
        <?php
            if(isset($_GET['criado'])){
                echo "<h3 style=\"color=blue>Ambiente criado com sucesso</h3>";
            }
        ?>
        <form action="armazenaambiente.php" method="get">
            <fieldset>
                <legend>Criar Ambiente</legend>
                <label for="categoria">Categoria: </label>
                <input type="text" name="categoria" id="categoria"> <br><br>
                <label for="ambiente">Ambiente: </label>
                <input type="text" name="ambiente" id="ambiente"> <br><br>
                <input type="submit" value="Criar">
            </fieldset>
        </form>

        <a href="ambiente.php">Voltar</a>
    </main>

    <footer>

        <?php
        include 'inc\rodape.inc.php'
        ?>
    </footer>
</body>

</html>