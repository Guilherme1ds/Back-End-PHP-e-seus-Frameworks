<?php
/* Peça para o usuário digitar sua idade.
• Use if...else para verificar:
o Maior de idade (18 anos ou mais)
o Menor de idade (menos de 18 anos) */

$idade = readline("Digite a sua idade: ");

if ($idade >= 18) {
    echo "Maior de Idade";
} else {
    echo "Menor de Idade";
}

?>