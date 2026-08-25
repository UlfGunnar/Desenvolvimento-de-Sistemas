<?php 
    $classificaçao_esqueleto = "vertebrado";
    $classificação_especie = "mamifero";
    $classificacao_alimentacao = "onivoro";

    if ($classificaçao_esqueleto == "vertebrado") {
        if ($classificação_especie == "ave") {
            if ($classificacao_alimentacao == "carnivoro") {
                echo "aguia";
            }
            elseif ($classificacao_alimentacao == "onivoro") {
                echo "pomba";
            }
        }

        elseif ($classificação_especie == "mamifero") {
            if ($classificacao_alimentacao == "herbivoro") {
                echo "vaca";
            }
            elseif ($classificacao_alimentacao == "onivoro") {
                echo "homem";
            }
        }
    }

    elseif ($classificaçao_esqueleto == "invertebrado") {
        if ($classificação_especie == "inseto") {
            if ($classificacao_alimentacao == "hematofago") {
                echo "pulga";
            }
            elseif ($classificacao_alimentacao == "herbivoro") {
                echo "lagarta";
            }
        }

        elseif ($classificação_especie == "anelideo") {
            if ($classificacao_alimentacao == "hematofago") {
                echo "sanguessuga";
            }
            elseif ($classificacao_alimentacao == "onivoro") {
                echo "minhoca";
            }
        }
    }
?>