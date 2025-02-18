<?php
// include_once 'testanome.php';
// include_once 'testames.php';
// include_once 'testadatavalida.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambiente</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        
    </style>
</head>

<body>
    <header>
        <?php
        include 'inc\cabecalho.inc.php'
        ?>
    </header>
    <main>
        <h1>Seleção de ambiente</h1>
        <?php
        if (session_status() == !PHP_SESSION_ACTIVE) {
            session_start();
        }
        if($_SESSION['visitante'] == !true){
            echo "<h2>Nome do reservante: " . $_SESSION['nome'] . "</h2>";
            $str1 = "Ambientes para reserva";
            // $btn = "Reservar";
        } else {
            $str1 = "Ambientes";
            // $btn = "Ver";
        }

        include_once '/rb/rb.php';

        R::setup('mysql:host=127.0.0.1;dbname=tcd2024',
        'root',
        '');

        $ambientes = R::findAll('ambientes');
        $categorias = R::findAll('categorias');
//         $numerodeambientes = count($ambientes);

//         $inicioformambiente = <<<AAA
//         <form action="calendario.php" method="get">
//             <fieldset>
//                 <legend>$str1</legend>

//                 <select name="ambiente" id="ambiente" size=$numerodeambientes>
// AAA;

//         $fimformambiente = <<<BBB
//                 </select>
//                 <br>
//                 <br>
                
//                 <input type="submit" value="$btn">

//             </fieldset>
//         </form>
// BBB;
        
//         echo $inicioformambiente;

//         foreach ($ambientes as $value) {
//             echo "<option value=\"$value->nome_ambiente\">$value->nome_ambiente</option>";
//         }

//         echo $fimformambiente;

        $scrptambientes = <<<DDD
        <div>
            <div><img src="" alt="Imagem do ambiente %s"></div>
            <div><p><a href="calendario.php">Reservar</a></p></div>
        </div>
DDD;

        echo "<h1>$str1</h1>";

        foreach($categorias as $categoria){
            echo "<h2>$categoria->nome_categoria</h2>";
            foreach($ambientes as $ambiente){
                if($categoria->nome_categoria == $ambiente->categoria){
                    printf(
                        $scrptambientes,
                        $ambiente->nome_ambiente
                    );
                }
            }
        }

        ?>


                    


    </main>
    <footer>
        <?php
        include 'inc\rodape.inc.php'
            ?>
    </footer>
</body>

</html>