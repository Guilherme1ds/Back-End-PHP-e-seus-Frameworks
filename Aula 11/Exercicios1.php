<?php

/* Cenário 1 – Viagem pelo Mundo

Um grupo de turistas vai visitar o Japão, o Brasil e o Acre. Em cada lugar da
Terra, eles poderão comer comidas típicas e nadar em rios ou praias. */

// Classes:
// Turistas
// Localidade
// Atividade
// Comida
// CorpoDagua

// Métodos:
// Visitar - Turista
// Comer - Turista
// Nadar - Turista
// InformarAtividades - Localidade
// Executar - Atividade
// getdescricao - Comida
// gettipo - CorpoDagua

class Turista {
    private $nome;
    private $idade;
    private $cpf;

    public function __construct($nome, $idade, $cpf) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->cpf = $cpf;
    }

    public function comer($comida) {
        echo "Turista está comendo " . $comida->getDescricao() .""; 
    }

    public function nadar($corpoDagua) {
        echo "Turista está nadando em " . $corpoDagua->getTipo() ."";
    }
}

class Localidade {
    public function informarAtividades() {
        echo "Atividades disponíveis nesta localidade...";
    }
}

abstract class Atividade {
    abstract public function executar();
}

class Comida {
    public function getDescricao() {
        return "Comida típica";
    }
}

class CorpoDagua {
    public function getTipo() {
        return "Lago";
    }
}

?>