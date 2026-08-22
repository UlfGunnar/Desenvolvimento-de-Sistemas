<?php
    $numero = 7;
    $c = 1;
    $linha = 1;

    while ($numero >= $linha) {
        if ($c % 4 != 0) {
            echo $c . " ";
            $c++;
        }
        else {
            echo "PUM <br>";
            $c++;
            $linha++;
        }
    }
?>