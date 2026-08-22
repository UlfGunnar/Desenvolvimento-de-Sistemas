<?php

$nome = "Ulf";
$idade = 21;
$altura = 1.67;
$liso = true;
$conta = 100.69;
$reserva = 180;
$nota = 10;
$c = 0;
$frutas = ["maçã", "banana", "laranja"];

const PI = 3.14;

echo "Olá, sou $nome, tenho $idade anos e tenho $altura m de altura. <br>";
echo "Eu adoro o número PI, mas só sei a ordem do número até " . PI . "<br>";
echo "Eu tenho R$" . $conta + $reserva . " reais <br>";
echo "<img src='download.jpg' alt='Descrição da foto'><br>";

if ($nota >= 7) {
    echo "Aprovado";
}
elseif ($nota >= 5) {
    echo "Recuperação";
}
else {
    echo "Reprovado";
}

switch ($nota) {
    case 10:
        echo " Excelente";
        break;
    case 7:
        echo " Bom";
        break;
    default:
        echo " Ouro";;
}

while ($c < 5) {
    echo $c;
    $c++;
}

do {
    echo $c;
    $c++;
} while ($c < 5);

for ($c = 0; $c < 5; $c++) {
    echo $c;
}


foreach ($frutas as $fruta) {
    echo $fruta;
}

?>
