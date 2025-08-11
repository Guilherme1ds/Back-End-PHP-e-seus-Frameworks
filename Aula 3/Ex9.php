<?php
/* Peça a temperatura e use if...else para exibir:
• Menor que 15°C → "Frio"
• Entre 15°C e 25°C → "Agradável"
• Maior que 25°C → "Quente" */

$temp = readline("Digite a temperatura: ");

if ($temp > 25) {
    echo "Quente";
} else if ($temp >= 15 && $temp <= 25) {
    echo "Agradável";
} else {
    echo "Frio";
}

?>