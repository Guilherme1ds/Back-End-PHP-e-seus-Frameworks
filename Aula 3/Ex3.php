<?php
/* Solicite ao usuário um número de 1 a 7 e exiba o dia correspondente usando
switch...case.
• 1 → Domingo
• 2 → Segunda
• ...
• 7 → Sábado */

$dia = readline("Digite um número de 1 a 7: ");

switch ($dia) {
    case 1:
        echo "Domingo";
        break;
    case 2:
        echo "Segunda-Feira";
        break;
    case 3:
        echo "Terça-Feira";
        break;
    case 4:
        echo "Quarta-Feira";
        break;
    case 5:
        echo "Quinta-Feira";
        break;
    case 6:
        echo "Sexta-Feira";
        break;
    case 7:
        echo "Sábado";
        break;
    default:
    echo "Dia não reconhecido";
} 

?>