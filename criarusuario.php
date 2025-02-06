<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuários</title>
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
            // if(isset($_GET['criado'])){
            //     echo "<h3 style=\"color=blue>Usuário criado com sucesso</h3>";
            // }
        ?>
        <form action="armazenausuario.php" method="get">
            <fieldset>
                <legend>Criar Usuario</legend>
                <label for="categoria">Nome : </label>
                <input type="text" name="nome" id="nome"> <br><br>
                <label for="ambiente">Senha: </label>
                <input type="text" name="senha" id="senha"> <br><br>
                <input type="checkbox" name="adm" id="adm">
                <label for="adm">Administrador</label> <br> 
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