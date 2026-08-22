<?php 
    $segundo = 140153;
    $minuto = 0;    
    $hora = 0;

    while (True) {
        if ($segundo >= 3600) {
            $segundo = $segundo - 3600;
            $hora++;
        }
        elseif ($segundo >= 60) {
            $segundo = $segundo - 60;
            $minuto++;
        }
        else {
            break;
        }
    }

    echo "$hora:$minuto:$segundo"
?>