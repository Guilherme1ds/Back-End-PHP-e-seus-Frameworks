<?php

class AlunoDAO { // Classe para manipulação das funções do CRUD (create, read, update e delete)
    private $alunos = []; // Array $alunos para armazenamento temporário dos objetos a serem manipulados, antes de ser enviado ao banco de dados. Foi criado vazio inicialmente. 

    public function criarAlunos(Aluno $aluno) { // Método para criar um objeto na array alunos --> Create
        $this->alunos[$aluno->getId()] = $aluno;
    }

    public function lerAlunos() { // Método para ler os dados de um objeto já criado --> Read
        return $this->alunos;
    }

    public function atualizarAlunos($id, $novoNome, $novoCurso) { // Método para atualizar os dados de um objeto já criado --> Update
        if(isset($alunos[$id])) {
            $this->alunos[$id]->setNome($novoNome);
            $this->alunos[$id]->setCurso($novoCurso);
        }
    }

    public function excluirAlunos($id) { // Método para excluir um objeto --> Delete
        unset($alunos[$id]);
    }
}