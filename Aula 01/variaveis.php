<?php
/*Desenvovla um código com a mesma estrutura que o abaixo,porém com os seus dados.*/ 
 
echo"Olá! \n";
$nome = "Guilherme \n";
$idade = "17";
$ano_atual = "2025";

$data_nasc = $ano_atual-$idade;
echo $nome, "você nasceu em:", $data_nasc;

?>

/*Exercício 2*/

<?php

$frase = "Programação em php.";
echo strtoupper($frase);
echo strtolower($frase);

?>

/*Exercício 3*/

<?php

$str = "O PHP foi criado em mil novecentos e noventa e cinco";
$str = str_replace("O", "0",$str);
$str = str_replace("a", "4",$str);
$str = str_replace("i", "1",$str);

print $str

?>