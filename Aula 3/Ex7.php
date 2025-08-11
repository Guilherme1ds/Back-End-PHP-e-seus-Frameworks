<?php
/* Peça um número final e use for para exibir todos os números pares de 0 até esse
número. */

$num = readline("Digite o número final: ");

for ($i = 0; $i <= $num; $i += 2) {
    echo $i;
}

?>