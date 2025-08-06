<?php

$nota1 = 4;
$nota2 = 4;
$presen = 21;
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