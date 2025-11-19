<?php

class Livro {
    private $titulo;
    private $autor;
    private $ano_publicacao;
    private $genero;
    private $quantidade;

    public function __construct($titulo, $autor, $ano_publicacao, $genero, $quantidade) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->ano_publicacao = $ano_publicacao;
        $this->genero = $genero;
        $this->quantidade = $quantidade;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function setAnoPublicacao($ano_publicacao) {
        $this->ano_publicacao = $ano_publicacao;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getAnoPublicacao() {
        return $this->ano_publicacao;
    }
    public function getGenero() {
        return $this->genero;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }
    
}