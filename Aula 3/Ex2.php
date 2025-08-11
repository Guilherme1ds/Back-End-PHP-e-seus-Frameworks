<?php
/* Leia uma nota de 0 a 10.
• Use if...elseif...else para classificar:
o Nota ≥ 9 → Excelente
o Nota ≥ 7 → Bom
o Nota < 7 → Reprovado */

$nota = readline("Digite a nota: ");

if ($nota >= 10) {
    echo "Excelente";
} else if ($nota >= 7) {
    echo "Bom";
} else {
    echo "Reprovado";
}