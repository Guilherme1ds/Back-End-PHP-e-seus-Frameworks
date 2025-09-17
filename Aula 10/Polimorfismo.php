<?php
namespace Aula_10;
// Polimorfismo:
// O termo Polimorfismo significa "várias formas". Associando isso a Programação Orientada a Objetos, o conceito se trata de várias classes e suas instâncias(objetos) respondendo a um mesmo método de formas diferentes. No exemplo do Interface da Aula_09, temos um método CalcularArea() que responde de forma diferente à classe Quadrado, à classe Pentágono e a classe Círculo. Isso quer dizer que a função é a mesma - calcular a área da forma geométrica - mas a operação muda de acordo com a figura.

// Crie um método chamado "mover()", aonde ele responde de várias formas diferentes, para as sub-classes: Carro, Avião, Barco e Elevador. Dica: utilize Interfaces.

interface Veiculo {
    public function mover();
}

class Carro implements Veiculo{
    public $nome;
    public function mover() {
        echo "O Carro {$this->nome} está andando";
    }
}

class Aviao implements Veiculo{
    public $nome;
    public function mover() {
        echo "O avião {$this->nome} está voando";
    }
}

// ===================================================
// Crie ao menos 2 objetos para testar CADA classe =D
// ===================================================

$carro1 = new Carro();
$carro1->nome = "Civic";

$carro2 = new Carro();
$carro2->nome = "Mustang";

$aviao1 = new Aviao();
$aviao1->nome = "Boeing 747";

$aviao2 = new Aviao();
$aviao2->nome = "Airbus A380";