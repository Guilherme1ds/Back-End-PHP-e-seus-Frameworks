<?php
/* Crie uma função ehSeminovo($ano) que receba o ano de fabricação e retorne true se o
carro tiver até 3 anos de uso e false caso contrário.
Teste a função com os carros fornecidos. */

$marca_carro4 = "Volkswagen";
$modelo_carro4 = "Jetta";
$ano_carro4 = 2020;
$revisao_carro4 = true;
$Ndonos_carro4 = 7;

function ehSeminovo($ano) {
    if ($ano >= 2020 && $ano <=2023) {
        return $rev = "true";
    } else {
        return $rev = "false";
    }
}

$ano_carro4 = ehSeminovo($ano_carro4);
echo "Carro: $marca_carro4 $modelo_carro4 \nEstado de Revisao: $ano_carro4";

?>