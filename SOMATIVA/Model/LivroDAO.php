<?php
require_once 'Livro.php';
require_once 'Connection.php';

class LivroDAO {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getInstance();

        // Cria a tabela se não existir
        $this->conn->exec("
            CREATE TABLE IF NOT EXISTS livros (
                id INT AUTO_INCREMENT PRIMARY KEY,
                titulo VARCHAR(200) NOT NULL,
                autor VARCHAR(150) NOT NULL,
                ano_publicacao INT NOT NULL,
                genero VARCHAR(100) NOT NULL,
                quantidade INT NOT NULL
            )
        ");
    }
    

    // CREATE
    public function criarLivro(Livro $livro) {
        $stmt = $this->conn->prepare("
            INSERT INTO livros (titulo, autor, ano_publicacao, genero, quantidade)
            VALUES (:titulo, :autor, :ano_publicacao, :genero, :quantidade)
        ");
        $stmt->execute([
            ':titulo' => $livro->getTitulo(),
            ':autor' => $livro->getAutor(),
            ':ano_publicacao' => $livro->getAnoPublicacao(),
            ':genero' => $livro->getGenero(),
            ':quantidade' => $livro->getQuantidade()
        ]);
    }

    // READ
    public function lerLivro() {
        $stmt = $this->conn->query("SELECT * FROM livros ORDER BY titulo");
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Livro(
                $row['titulo'],
                $row['autor'],
                $row['ano_publicacao'],
                $row['genero'],
                $row['quantidade']
            );
        }
        return $result;
    }

    // UPDATE
    public function atualizarLivro($tituloOriginal, $novoTitulo, $autor, $ano_publicacao, $genero, $quantidade) {
        $stmt = $this->conn->prepare("
            UPDATE livros
            SET titulo = :novoTitulo, autor = :autor, ano_publicacao = :ano_publicacao, genero = :genero, quantidade = :quantidade
            WHERE titulo = :tituloOriginal
        ");
        $stmt->execute([
            ':novoTitulo' => $novoTitulo,
            ':autor' => $autor,
            ':ano_publicacao' => $ano_publicacao,
            ':genero' => $genero,
            ':quantidade' => $quantidade,
            ':tituloOriginal' => $tituloOriginal
        ]);
    }

    // DELETE
    public function excluirLivro($titulo) {
        $stmt = $this->conn->prepare("DELETE FROM livros WHERE titulo = :titulo");
        $stmt->execute([':titulo' => $titulo]);
    }

    // BUSCAR POR NOME
    public function buscarPorTitulo($titulo) {
        $stmt = $this->conn->prepare("SELECT * FROM livros WHERE titulo = :titulo LIMIT 1");
        $stmt->execute([':titulo' => $titulo]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Livro(
                $row['titulo'],
                $row['autor'],
                $row['ano_publicacao'],
                $row['genero'],
                $row['quantidade']
            );
        }
        return null;
    }
}