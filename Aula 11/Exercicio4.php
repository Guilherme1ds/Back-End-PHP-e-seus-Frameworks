<?php

/* Cenário 4 – Ciclo da Vida

Na Terra, pessoas podem engravidar, nascer, crescer, fazer escolhas e até doar
sangue para ajudar outras. */

// Classes:
// Pessoa
// Escolha
// BancoDeSangue

// Métodos:
// Engravidar - Pessoa
// Nascer - Pessoa
// Crescer - Pessoa
// FazerEscolha - Pessoa
// DoarSangue - Pessoa
// Executar - Escolha
// ReceberDoacao - BancoDeSangue

class Pessoa {
    private $nome_pessoa;

    public function __construct($nome_pessoa) {
        $this->nome_pessoa = $nome_pessoa;
    }

    public function engravidar($nome_pessoa) {
        echo "$nome_pessoa engravidou";
    }

    public function nascer($nome_pessoa) {
        echo "$nome_pessoa nasceu";
    }

    public function crescer($nome_pessoa) {
        echo "$nome_pessoa cresceu";
    }

    public function fazerEscolha($escolha) {
        $escolha->executar();
    }

    public function doarSangue($banco) {
        $banco->receberDoacao();
    }
}

class Escolha {
    public function executar() {
        echo "A escolha foi executada";
    }
}

class BancoDeSangue {
    public function receberDoacao($nome_pessoa) {
        echo "Banco de sangue recebeu uma doação de $nome_pessoa";
    }
}

?>