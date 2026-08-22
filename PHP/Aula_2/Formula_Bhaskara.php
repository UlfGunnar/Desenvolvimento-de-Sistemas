<?php 
    $A = 10.0;
    $B = 20.1;
    $C = 5.1;

    $Delta = $B ** 2 - 4 * $A * $C;

    if (2 * $A == 0 or $Delta < 0) {
        echo "Impossivel de calcular";
    }
    else {
        $Raiz_1 = (-$B + sqrt($Delta)) / (2 * $A);
        $Raiz_2 = (-$B - sqrt($Delta)) / (2 * $A);

        echo "R1 = " . Round($Raiz_1, 5) . " <br>";
        echo "R2 = " . Round($Raiz_2, 5) . " <br>";
    }
?>