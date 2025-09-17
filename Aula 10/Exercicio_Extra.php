<?php
/* Exercício extra - Polimorfismo

Crie 3 Interfaces:
Movel → Método mover()
Abastecivel → Método abastecer($quantidade)
Manutenivel → Método fazerManutencao()

Crie as classes:
Carro → Deve implementar Movel e Abastecivel.
• mover() imprime que o carro está se movimentando.
• abastecer($quantidade) imprime a quantidade abastecida.

Bicicleta → Deve implementar Movel e Manutenivel.
• mover() imprime que a bicicleta está pedalando.
• fazerManutencao() imprime que a bicicleta foi lubrificada.

Onibus → Deve implementar Movel, Abastecivel e Manutenivel.
• mover() imprime que o ônibus está transportando passageiros.
• abastecer($quantidade) imprime a quantidade abastecida.
• fazerManutencao() imprime que o ônibus está passando por revisão. */

namespace exercicios;

interface Movel {
    public function mover();
}

interface Abastecivel {
    public function abastecer($quantidade);
}

interface Manutenivel {
    public function fazerManutencao();
}

class Carro implements Movel, Abastecivel {
    public $quantidade;

    public function __construct($quantidade) {
        $this->quantidade=$quantidade;
    }
    public function mover() {
        echo "O carro está se movimentando.";
    }

    public function abastecer($quantidade) {

    }
}