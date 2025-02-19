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
        include_once '/rb/rb.php';

        R::setup(
            'mysql:host=127.0.0.1;dbname=tcd2024',
            'root',
            ''
        );

        // echo var_dump($_SESSION);

        
        // if ($reservasfeitas == null) { // verifica se há reserva na tabela no banco 
            //     for ($i = 8; $i <= 18; $i++) {
                //         echo "<a href=\"armazenareserva.php?hora=$i\">$i:00</a> <br>";
                //     }
                // } else {
                    // foreach ($reservasfeitas as $reserva) { //confere se há reservas para aquele ambiente na data desejada
                        //     if (($reserva->ambiente == $_SESSION['ambiente']) && ($reserva->data_reserva == $_SESSION['data'])) {
                            //         $datacomreserva = "sim";
                            //     }else{
                                //         $datacomreserva = "nao";
            //     }
            // }
            
            
            // if($datacomreserva == null){ //se houver reserva naquela data, aqui coonfere os horários e os deixa impossíveis de reservar
                //     for ($i = 7; $i <= 18; $i++) {
                    //         echo "<p><a href=\"armazenareserva.php?hora=$i\">$i:00</a></p> <br>";
                    //     }
                    
                    // echo var_dump($datacomreserva);

                $iniciotabela = <<<AAA
                <div class="divhorarios">
                    <h2>Horários Disponíveis Para Reserva</h2>
                    <table class="horarios">
                    <tbody>
AAA;
                    
            $reservasfeitas = R::findAll('reservas');
            $datacomreserva = R::find('reservas', 'data_reservada LIKE ?', [$_SESSION['data']]);

            echo $iniciotabela;

            $index = 0; //variável que controla as linhas
            $horaagora = date('G');
            $diahoje = date('d');
            $datareserva = $_SESSION['data'];


            for ($i = 7; $i <= 18; $i++) {
                
                $horariodisponivel = true;
                foreach ($datacomreserva as $reserva) {
                    if ($reserva->ambiente == $_SESSION['ambiente'] && $reserva->hora_reservada == $i) {
                        $horariodisponivel = false;
                        break;
                    }
                }

                if($index % 3 == 0){
                    echo "<tr>";
                }

                if ($horariodisponivel == false) {
                    echo "<td><p style=\"color:red\">$i:00</p> </td>";
                } else {
                    if($_SESSION['visitante']){
                        echo "<td>$i:00</td>";
                    }else {
                        echo "<td><p><a href=\"armazenareserva.php?hora=$i\" class=\"hora\">$i:00</a></p></td>";
                    }
                }

                if($index % 3 == 2){
                    echo "</tr>";
                }

                $index++;

                // foreach ($reservasfeitas as $reserva) {
                //     if (($reserva->ambiente == $_SESSION['ambiente']) && ($reserva->data_reserva == $_SESSION['data']) &&($reserva->horareservada == $i)) {
                //         echo "<p style=\"color:red\">$i:00</p><br>";
                //         $horaroinvalido = true;
                //     }else{
                //         $horaroinvalido = false;
                //     }
                // }
                // if($horaroinvalido == false){
                //     echo "<p><a href=\"armazenareserva.php?hora=$i\">$i:00</a></p> <br>";
                // }                    
            }

            echo "  </tbody>
            </table>";  

            if($_SESSION['visitante']){
                echo "<div id=\"btnfinalizar\"><p><a href=\"ambiente.php\">Voltar</a></div></p>";
            } else {
                echo "<div id=\"btnfinalizar\"><p ><a href=\"minhasreservas.php\">Finalizar reserva</a></div></p>";
            }
            echo "</div>";
        ?>  
    </main>

    <footer>
        <?php
        include 'inc\rodape.inc.php';
        ?>
    </footer>
</body>

</html>