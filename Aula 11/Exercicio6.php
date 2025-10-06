<?php

/* Cenário 6 – Leia o enunciado do problema

"Um sistema de cinema deve permitir que clientes comprem ingressos para
sessões de filmes." */

// Classes:
// SistemaDeCinema
// Cliente
// Filme
// Sessao
// Ingresso
// Sala

// Métodos:
// ExibirSessoes - SistemaDeCinema
// VenderIngresso - SistemaDeCinema
// Compraringresso - Cliente
// getDetalhes - Filme
// ReservarAssento - Sessao
// LiberarAssento - Sessao
// Validar - Ingresso
// VerificarDisponibilidade - Sala


class SistemaDeCinema {
    public function exibirSessoes() {
        echo "Exibindo todas as sessões disponíveis";
    }

    public function venderIngresso($cliente, $sessao) {
        $ingresso = new Ingresso();
        $cliente->comprarIngresso($ingresso, $sessao);
    }
}

class Cliente {
    public function comprarIngresso($ingresso, $sessao) {
        echo "Ingresso comprado com sucesso para a $sessao";
        $ingresso->validar();
    }
}

class Filme {
    private $titulo;

    public function __construct($titulo) {
        $this->titulo = $titulo;
    }
    
    public function getDetalhes($titulo) {
        return "Detalhes do filme $titulo";
    }
}

class Sessao {
    public function reservarAssento() {
        echo "Assento reservado";
    }

    public function liberarAssento() {
        echo "Assento liberado";
    }
}

class Ingresso {
    public function validar() {
        echo "Ingresso validado";
    }
}

class Sala {
    public function verificarDisponibilidade() {
        echo "Verificando disponibilidade da sala";
    }
}

?>