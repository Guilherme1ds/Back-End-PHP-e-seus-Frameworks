<?php
/* Crie uma função precisaRevisao($revisao, $ano) que retorne "Precisa de revisão" se $revisao
for false e o carro for anterior a 2022. Caso contrário, retorne "Revisão em dia". */

$marca_carro2= "BMW";
$modelo_carro2= "320i";
$ano_carro2= 2012;
$revisao_carro2= false;
$Ndonos_carro2= 3;

function precisaRevisao($revisao_carro2, $ano_carro2) {
    if ($revisao_carro2 == false && $ano_carro2 < 2022) {
        return "Precisa de revisão";
    } else {
    return "Revisão em dia";
    }
}

$revisao_carro2 = precisaRevisao($revisao_carro2, $ano_carro2);
echo $revisao_carro2;

?>