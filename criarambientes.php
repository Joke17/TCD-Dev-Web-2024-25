<?php
if(isset($_GET['criada'])){
    include_once '/rb/rb.php';

    R::setup('mysql:host=127.0.0.1;dbname=tcd2024',
    'root',
    '');

    $novacategoria = R::dispense('categorias');
    $novacategoria->nome_categoria = $_GET['criada'];

    $id = R::store($novacategoria);

    R::close();

    header('Location:criarambientes.php');
}
?>

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

            include_once '/rb/rb.php';

            R::setup('mysql:host=127.0.0.1;dbname=tcd2024',
            'root',
            '');

            if(isset($_GET['newcat'])){

                $newcat = <<<CCC
                <form action="criarambientes.php" method="get">
                <fieldset>
                    <legend>Criar nova categoria</legend>
                    <label for="criada">Nome da nova categoria: </label>
                    <input type="text" name="criada">
                    <input type="submit" value="Criar">
                </form>
CCC;
                
                echo $newcat;
                
            }else{
            if(isset($_GET['criado'])){
                echo "<h3 style=\"color=blue\">Ambiente criado com sucesso</h3>";
            }
            $categorias = R::findAll('categorias');
            $numerodecategorias = count($categorias);

            $inicioformcatregoria = <<<AAA
            <form action="armazenaambientecriado.php" method=\"get\">
                <fieldset>
                    <legend>Criar Ambiente</legend>
                    <label for="categoria">Esolha a categoria do ambiente</label> <br>
                    <select name="categoria" id="categoria" size=$numerodecategorias)>
AAA;
                    
            $fimformcategoria = <<<BBB
            </select> <br><br>
            <label for="ambiente">Ambiente: </label>
            <input type="text" name="ambiente" id="ambiente"> <br><br>
            <label for="fotoamb">Foto do ambiente</label>
            <input type="file" name="fotoamb" id="fotoamb"> <br><br>
            <input type="submit" value="Criar">
            </fieldset>
            </form>
BBB;
            
            echo $inicioformcatregoria;
            
            foreach ($categorias as $value) {
                echo "<option value=\"$value->nome_categoria\">$value->nome_categoria</option>";
            }

            echo $fimformcategoria;

            echo "<a href=\"criarambientes.php?newcat=sim\">Criar nova categoria</a>";
        }
        ?>



        <br><br>

        <a href="ambiente.php">Voltar</a>
    </main>

    <footer>

        <?php
        include 'inc\rodape.inc.php'
        ?>
    </footer>
</body>

</html>