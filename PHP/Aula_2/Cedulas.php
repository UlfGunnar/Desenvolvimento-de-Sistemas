<?php 
    $numero = 11257;
    $cedulas = [0, 0, 0, 0, 0, 0, 0];
    $valores = [100, 50, 20, 10, 5, 2, 1];
    $c = 0;

    while (TRUE) {
        if ($numero >= 100) {
            $cedulas[0]++;
            $numero = $numero - 100;
        }
        elseif ($numero >= 50) {
            $cedulas[1]++;
            $numero = $numero - 50;
        }
        elseif ($numero >= 20) {
            $cedulas[2]++;
            $numero = $numero - 20;
        }
        elseif ($numero >= 10) {
            $cedulas[3]++;
            $numero = $numero - 10;
        }
        elseif ($numero >= 5) {
            $cedulas[4]++;
            $numero = $numero - 5;
        }
        elseif ($numero >= 2) {
            $cedulas[5]++;
            $numero = $numero - 2;
        }
        elseif ($numero >= 1) {
            $cedulas[6]++;
            $numero = $numero - 1;
        }
        else {
            break;
        }
    }
    
    foreach ($cedulas as $cedula) {
        echo "$cedula nota(s) de R$$valores[$c],00<br>";
        $c++;
    }
?>