<?php

$valor = readline("Digite o primeiro valor: ");
$valor2 = readline("Digite o segundo valor: ");

$resul = gettype($valor);
$resul2 = gettype($valor2);

if ($resul == $resul2) {
    echo "Variáveis de tipos iguais! \n Primeiro valor do tipo [$resul] e segundo valor do tipo [$resul2]";
} else {
    echo "ERRO! Variáveis de tipos diferentes. Primeiro valor do tipo [$resul] e segundo valor do tipo [$resul2]";
}

?>