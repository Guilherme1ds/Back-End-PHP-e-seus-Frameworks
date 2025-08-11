<?php
/* Peça um número inicial e exiba a contagem regressiva até 1 usando for. */

$num = readline("Digite o número inicial: ");

for ($i = $num; $i >= 1; $i--) {
    echo "$i " ;
}