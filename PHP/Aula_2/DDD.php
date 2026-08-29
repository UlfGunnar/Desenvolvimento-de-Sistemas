<?php 
    $DDD = [61, 71, 11, 21, 32, 19, 27, 31];
    $Destination = [
        "Brasilia",
        "Salvador",
        "São Paulo",
        "Rio de Janeiro",
        "Juiz de Fora",
        "Campinas",
        "Vitoria",
        "Belo Horizonte"
    ];
    $Valor_DDD = 11;
    $Valor_Destination = array_search($Valor_DDD, $DDD);
    
    if ($Valor_Destination == NULL) {
        echo "DDD não cadastrado";
    }
    else {
        echo "$Destination[$Valor_Destination]";
    }
?>