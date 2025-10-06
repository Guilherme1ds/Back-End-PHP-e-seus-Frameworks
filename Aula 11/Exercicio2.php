<?php

/* Cenário 2 – Heróis e Personagens

O Batman, o Superman e o Homem-Aranha estão em uma missão. Eles precisam
fazer treinamentos especiais no Cotil e, depois, irão ao shopping para doar
brinquedos às crianças. */

// Classes:
// Herois
// LocalDeTreinamento
// Shopping
// Brinquedo
// Crianca
// Missao

// Métodos:
// Treinar - Heroi
// RealizarMissao - Heroi
// doarbrinquedo - Heroi
// Iniciar - Missao
// Finalizar - Missao
// OferecerTreinamento - LocalDeTreinamento
// ReceberDoacao - Shopping
// ReceberBrinquedo - Crianca

class Heroi {
    private $heroi;

    public function __construct($heroi) {
        $this->heroi = $heroi;
    }

    public function treinar($heroi) {
        echo "$heroi está treinando";
    }

    public function realizarMissao($missao, $heroi) {
        echo "$heroi está realizando a missão $missao";
    }

    public function doarBrinquedo($brinquedo, $nome_crianca, $heroi) {
        echo "$heroi está doando um $brinquedo para $nome_crianca";
        $nome_crianca->receberBrinquedo($brinquedo);
    }
}

class Missao {
    private $missao;

    public function __construct($missao) {
        $this->missao = $missao;
    }

    public function iniciar() {
        echo "Missão iniciada";
    }

    public function finalizar() {
        echo "Missão finalizada";
    }
}

class LocalDeTreinamento {
    private $local;

    public function __construct($local) {
        $this->local = $local;
    }

    public function oferecerTreinamento($local) {
        echo "$local ofereceu treinamento ao herói";
    }
}

class Shopping {
    private $nome_shopping;

    public function __construct($nome_shopping) {
        $this->nome_shopping = $nome_shopping;
    }
    public function receberDoacao($brinquedo, $nome_shopping) {
        echo "$nome_shopping recebeu uma doação de " . $brinquedo->getTipo() . "<br>";
    }
}

class Brinquedo {
    private $tipo;

    public function __construct($tipo) {
        $this->tipo = $tipo;
    }
    public function getTipo($tipo) {
        return $tipo;
    }
}

class Crianca {
    private $nome_crianca;

    public function __construct($nome_crianca) {
        $this->nome_crianca = $nome_crianca;
    }

    public function receberBrinquedo($brinquedo, $nome_crianca) {
        echo "$nome_crianca recebeu um " . $brinquedo->getTipo() . "";
    }
}

?>