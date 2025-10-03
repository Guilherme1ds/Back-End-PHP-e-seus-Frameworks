<?php

/* Cenário 1 – Viagem pelo Mundo

Um grupo de turistas vai visitar o Japão, o Brasil e o Acre. Em cada lugar da
Terra, eles poderão comer comidas típicas e nadar em rios ou praias. */

// Classes:
// Turistas
// Lugares

// Métodos:
// Visitar
// Comer
// Nadar

class Turistas {
    private $nome_turista;
    private $idade_turista;
    private $cpf_turista;

    public function __construct($nome_turista, $idade_turista, $cpf_turista) {
        $this->nome_turista = $nome_turista;
        $this->idade_turista = $idade_turista;
        $this->cpf_turista = $cpf_turista;
    }

    public function visitar(Lugares $nome_lugar) {
    }

    public function comer($comida) {
    }
    
    public function nadar($local_natacao) {
        
    }
}

class Lugares {
    private $nome_lugar;
    private $comida_tipica;

    public function __construct($nome_lugar, $comida_tipica) {
        $this->nome_lugar = $nome_lugar;
        $this->comida_tipica = $comida_tipica;
    }
}

?>