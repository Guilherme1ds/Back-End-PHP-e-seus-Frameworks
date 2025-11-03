<?php

class AlunoDAO { // Classe para manipulação das funções do CRUD (create, read, update e delete)
    private $alunos = []; // Array $alunos para armazenamento temporário dos objetos a serem manipulados, antes de ser enviado ao banco de dados. Foi criado vazio inicialmente. 

    private $arquivo = "alunos.json"; // Cria o arquivo json para que os dados sejam armazenados

    // Construtor AlunoDAO --> carrega os dados do arquivo json ao iniciar a aplicação

    public function __construct() {
        if (file_exists($this->arquivo)) {
            // Lê o conteudo do arquivo caso ele já exista
            $conteudo = file_get_contents($this->arquivo); // Atribui as informações do arquivo existente à variável $conteudo

            $dados = json_decode($conteudo, true); // Converter o Json em um array associativo

            if ($dados) { // Verifica se o array é nulo ou falso, caso seja valido e contenha conteúdo, ele prossegue para a lógica dentro do If
                foreach ($dados AS $id => $info) { // Percorre o array $dados relacionando chave e valor
                    $this->alunos[$id] = new Aluno( // Cria um novo objeto já com as chaves e os valores associados
                        $info['id'],
                        $info['nome'],
                        $info['curso'],
                    );
                }
            }
        }
    }

    // Método auxiliar --> para salvar o array $alunos no arquivo Json

    private function salvarEmArquivo() {
        $dados = [];

        // Transforma os objetos em arrays convencionais
        foreach ($this->alunos as $id => $aluno) {
            $dados[$id] = [
                'id' => $aluno -> getId(),
                'nome' => $aluno -> getNome(),
                'curso' => $aluno -> getCurso(),
            ];
        }

        // Converte para JSON formatado e grava o arquivo
        file_put_contents($this->arquivo, json_encode($dados, JSON_PRETTY_PRINT));
    }

    // CREATE
    public function criarAlunos(Aluno $aluno) { // Método para criar um objeto na array alunos --> Create
        $this->alunos[$aluno->getId()] = $aluno;
        $this->salvarEmArquivo();
    }

    // READ
    public function lerAlunos() { // Método para ler os dados de um objeto já criado --> Read
        return $this->alunos;
    }

    // UPDATE
    public function atualizarAlunos($id, $novoNome, $novoCurso) { // Método para atualizar os dados de um objeto já criado --> Update
        if(isset($this->alunos[$id])) {
            $this->alunos[$id]->setNome($novoNome);
            $this->alunos[$id]->setCurso($novoCurso);
        }
        $this->salvarEmArquivo();
    }

    // DELETE
    public function excluirAlunos($id) { // Método para excluir um objeto --> Delete
        unset($this->alunos[$id]);
        $this->salvarEmArquivo();
    }
}