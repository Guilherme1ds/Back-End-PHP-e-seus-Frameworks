<?php

/* Cenário 3 – Fantasia e Destino

John Snow, Papai Smurf, Deadpool e Dexter estão em uma jornada. Durante o
caminho, começa a chover, e eles precisam amar uns aos outros para superar as
dificuldades. No fim da jornada, eles celebram ao comer juntos. */

// Classes:
// Personagem
// Jornada
// Clima
// Dificuldade
// Refeicao

// Métodos:
// seguirJornada - Personagem
// enfrentarDesafio - Personagem
// celebrar - Personagem
// avancar - Jornada
// mudar - Clima
// superar - Dificuldade
// servir - Refeicao

class Personagem {
    private $nome_personagem;

    public function __construct($nome_personagem) {
        $this->nome_personagem = $nome_personagem;
    }

    public function seguirJornada($jornada) {
        $jornada->avancar();
    }

    public function enfrentarDesafio($dificuldade) {
        $dificuldade->superar();
    }

    public function celebrar($nome_personagem) {
        echo "$nome_personagem está celebrando!";
    }
}

class Jornada {
    public function avancar() {
        echo "A jornada avançou para o próximo estágio";
    }
}

class Clima {
    public function mudar() {
        echo "O clima mudou repentinamente";
    }
}

class Dificuldade {
    public function superar() {
        echo "O desafio foi superado";
    }
}

class Refeicao {
    private $tipo_refeicao;

    public function __construct($tipo_refeicao) {
        $this->tipo_refeicao = $tipo_refeicao;
    }

    public function servir($tipo_refeicao) {
        echo "$tipo_refeicao servida";
    }
}

?>