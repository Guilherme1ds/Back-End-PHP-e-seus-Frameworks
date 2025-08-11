<?php
/* Mostre no console:
1 - Olá
2 - Data Atual
3 - Sair
• Use switch...case para executar a opção escolhida pelo usuário.
• O programa só termina quando o usuário escolher "3 - Sair".
• Use for para repetir o menu um número fixo de vezes, por exemplo, 5 vezes. */

for ($i = 1; $i <= 5; $i++) {
echo " \n 1 - Olá \n 2 - Data Atual \n 3 - Sair";
$escolha = readline("Escolha uma opção: ");

switch ($escolha) {
     case 1:
        echo "Olá";
        break;
    case 2:
        echo "11/08/2025";
        break;
    case 3:
        $i = 6;
        echo "Saindo...";
        break;
    default:
    echo "Opção inexistente";
}
}

?>