<?php

require_once "CRUD.php";
require_once "AlunoDAO.php";

$dao = new AlunoDAO(); // Objeto da classe Aluno DAO para testar métodos CRUD

// CREATE
$aluno1 = new Aluno(1, "Jozias", "Panificação");
$aluno2 = new Aluno(2, "Victor Hugo", "Manicure");
$aluno3 = new Aluno(3, "Beatriz", "Eletricista");

// READ
echo "Listagem inicial:\n";
foreach ($dao->lerAlunos() as $aluno) {
    echo "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()}\n";
}

// UPDATE
$dao->atualizarAlunos(1, "Jozias", "Técnico em Borracharia");

echo "\n Após atualização: ";
foreach ($dao->lerAlunos() as $aluno) {
    echo "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()}\n";
}

// DELETE
$dao->excluirAlunos(1); // Excluindo objeto $aluno2 --> id=1
echo "\n Após exclusão: ";
foreach ($dao->lerAlunos() as $aluno) {
    echo "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()}\n";
}

?>