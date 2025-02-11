<?php
include_once 'testanome.php';
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
$_SESSION['ambiente'] = $_GET['ambiente'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <link rel="stylesheet" href="css/style.css">


    <style>
        html {
            font-family: "Pixelify Sans", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
        }

        table {
            /* border-collapse: collapse; */
            border: solid 3px black;
            text-align: center;
            margin: auto;
        }

        tr {
            border: dashed thin black;
        }

        td {
            padding: .5em;
            border: solid thin black;
        }

        th {
            padding: .5em;
            border: solid 2px black;
        }

        tr:nth-child(2n) {
            background-color: lightgrey;
        }

        h1 {
            text-align: center;
        }

        td:hover {
            background-color: lightblue;
        }
    </style>
</head>


<body>

    <header>
        <?php
        include 'inc\cabecalho.inc.php';
        ?>
    </header>
    <main>

        <h1>Calendário</h1>

        <form method="get" action="armazenames.php">
            <input type="month" id="mes" name="mes" onchange="submit()"
                value="<?php echo isset($_GET['mes']) ? $_GET['mes'] : date('Y-m'); ?>">
        </form>


        <?php

        if (isset($_GET['invalido'])) {
            echo "<h3 style=\"color:red\">A data esolhida é inválida, é uma data no passado, por favor escolha outra</h3>";
        }

        echo "<h3> A data de hoje é " . date('d/m/Y') . "</h3>";

        if (isset($_GET['mes'])) {

            $data = $_GET['mes'];

            $dias = date('d', strtotime($data));

            $diasmes = date('t', strtotime($data));

            $diassemana = date('w', strtotime($data));



            echo "<h1>Calendário " . $data = date('Y', strtotime($data)) . "</h1>";
            echo "<table>";
            echo "<tr>
            <th>Dom</th>
            <th>Seg</th>
            <th>Ter</th>
            <th>Qua</th>
            <th>Qui</th>
            <th>Sex</th>
            <th>Sab</th>
            </tr>";
            echo "<tr>";


            for ($i = 0; $i < $diassemana; $i++) {
                echo "<td>&nbsp;</td>";
            }


            for ($i = 1; $i <= $diasmes; $i++) {

                // $dataCompleta = date('Y-m', strtotime($data)) . '-' . $i;
        
                // echo "<td>" . $i . "</td>";
        
                // echo "<a href=\"ambiente.php?$dataCompleta\"></a>";
        

                $diaFormatado = str_pad($i, 2, '0', STR_PAD_LEFT);

                // $dataCompleta = date('Y-m', strtotime($data)) . '-' . $diaFormatado;
                $dataCompletaCerta = $_SESSION['mes'] . '-' . (string) $i;

                // echo "<td><a href='ambiente.php?data=" . $dataCompleta . "'>" . $i . "</a></td>";
                echo "<td><a href='testadatavalida.php?data=" . $dataCompletaCerta . "'>" . $i . "</a></td>";


                if (($i + $diassemana) % 7 == 0) {
                    echo "</tr><tr>";
                }
            }


            if(date('w', strtotime($dataCompletaCerta)) < 6){
                for ($i = 0; $i < (7 - (($diasmes + $diassemana) % 7)); $i++) {
                    echo "<td>&nbsp;</td>";
                }
            }

            echo "</tr>";
            echo "</table>";
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