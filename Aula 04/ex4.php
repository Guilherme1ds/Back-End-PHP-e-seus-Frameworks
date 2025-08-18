<?php
/* Crie uma função calcularValor($marca, $ano, $Ndonos) que estime o preço do carro usando
regras simples, por exemplo:
• Carros da BMW e Porsche têm preço base de R$ 300.000
• Nissan: R$ 70.000
• BYD: R$ 150.000
• A cada dono adicional além do primeiro, o valor cai 5%
• Para cada ano de uso, o valor cai R$ 3.000
A função deve retornar o valor estimado e você deve imprimir o resultado para cada
carro. */

$marca = "Wolkswagen";
$modelo = "Jetta";
$ano = 2020;
$revisao = true;
$Ndonos = 7;
$preco = 0;

function calcularValor($marca, $ano, $Ndonos) {
    $ano_uso = (2025 - $ano) * 3000;
    $dono_adc = $Ndonos * 0.05;

    if ($marca == "BMW" || $marca == "Porsche") {
        $preco = (300000 - (300000 * $dono_adc) ) - $ano_uso;
        return $preco;
     } else if ($marca == "Wolkswagen") {
        $preco = (70000 - (70000 * $dono_adc) ) - $ano_uso;
        return $preco;
     } else if ($marca == "BYD") {
        $preco = (150000 - (150000 * $dono_adc) ) - $ano_uso;
        return $preco;
   }
}

$preco = calcularValor($marca, $ano, $Ndonos);
echo $preco;

?>