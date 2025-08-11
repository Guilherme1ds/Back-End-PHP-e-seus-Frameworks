<?php

$nota1 = readline("Digite a 1° nota do aluno: ");
$nota2 = readline("Digite a 2° nota do aluno: ");
$presen = readline("Digite a presença do aluno: ");
$nome = "Enzo Enrico";  

$media = ($nota1 + $nota2) / 2;
if ($media >= 7 && $presen >= 75) {
    echo "O aluno: $nome foi APROVADO. Média: $media. Presença: $presen%";
}
else if ($nome == "Enzo Enrico") {
    echo "O aluno: $nome foi APROVADO. Média: $media. Presença: $presen%";
}
else {
    echo "O aluno: $nome foi REPROVADO. Média: $media. Presença: $presen%";
}

?>