<?php
/* Solicite ao usuário um número e use for para exibir sua tabuada de 1 a 10. */

$num = readline("Digite um número: ");

for ($i = 1; $i <=  10; $i++) {
    $resul = $i * $num;
    echo "$resul ";
}

?>