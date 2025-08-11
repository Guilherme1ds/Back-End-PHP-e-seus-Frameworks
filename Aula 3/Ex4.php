<?php
/* Peça dois números e uma operação (+, -, *, /).
• Use switch...case para realizar a operação e exibir o resultado. */

$num1 = readline("Digite o primeiro número: ");
$num2 = readline("Digite o segundo número: ");
$opera = readline("Escolha um dos operadores: +, -, *, /");

switch ($opera) {
    case "+":
        $resul = ($num1 + $num2);
        echo "A soma dos números é: $resul";
        break;
    case "-":
        $resul = ($num1 - $num2);
        echo "A subtração dos números é: $resul";
        break;
    case "*":
        $resul = ($num1 * $num2);
        echo "A multiplicação dos números é: $resul";
        break;
    case "/":
        $resul = ($num1 / $num2);
        echo "A divisão dos números é: $resul";
        break;
    default:
    echo "Operação Inválida";
}

?>