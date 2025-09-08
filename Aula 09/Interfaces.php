<?php

// Modificadores de acesso:
// Existem 3 tipos: Public, Private e Protected
// Public NomeDoAtributo: métodos e atributos públicos.

// Private NomeDoAtributo: métodos e atributos privados para acesso somente dentro da classe. Utilizamos os getters e setters para acessá-los.

// Protected NomeDoAtributo: métodos e atributos protegidos para acesso somente das classes e de suas classes filhas.

// Pacotes (packages): sintaxe logo no início do código, que atribui de onde os arquivos pertencem, ou seja, o caminho da pasta em que ele está contido. Exemplo:

// namespace Aula 09;

// Caso tenham mais arquivos que formam o BackEnd de uma página WEB e possuem a mesma raiz, o namespace será o mesmo.

namespace Aula_09;

/* Interfaces: É um recurso no qual garante que obrigatoriamente a classe tenho que construir algum método previamente determinado. Funciona como uma promessa ou contrato.
Exemplo: Configuramos uma interface "Pagamento" que faz com que qualquer classe que a implemente, tenha que obrigatoriamente construir o método "pagar". */

interface Pagamento { // Interface de contrato de pagamento
    public function pagar($valor);
}

class CartaoDeCredito implements Pagamento { // Criando classe CartaoDeCredito com implmentação da interface Pagamento
    public function pagar($valor) { // Criando o método obrigatório "pagar"
        echo "Pagamento realizado com cartão de crédito, valor: $valor\n";
    }
}

class PIX implements Pagamento { // Criando classe PIX com implmentação da interface Pagamento
    public function pagar($valor) { // Criando o método obrigatório "pagar"
        echo "Pagamento realizado via PIX, valor: $valor\n";
    }
}

class dinheiroEspecie implements Pagamento {
    public function pagar($valor) {
        $valor = $valor - $valor * 0.1; 
        echo "Pagamento realizado em dinheiro espécie, valor com desconto de 10%: $valor\n";
    }
}

// Testando interface: deve-se criar objetos associados a cada classe que será testada. Exemplo:

$cred = new CartaoDeCredito(); // Criando objeto

$cred->pagar (250);

// Neste exemplo criamos um objeto chamado "$cred" para a classe "CartaoDeCredito" e depois chamamos o método "pagar" para este objeto, passando R$250 como parâmetro. 

// Crie objetos para as classes "PIX" e "dinheiroEspecie" e teste passando como parâmetro os valores R$65 e R$30 respectivamente.

$pix = new PIX();

$pix->pagar(65);

$dinheiro = new dinheiroEspecie();

$dinheiro->pagar(30);

// 1. Criando uma interface simples

// Crie uma interface chamada "Forma" que obrigue qualquer classe a ter um método calcularArea().
// Depois, crie as classes "Quadrado" e "Circulo" que implementam a interface.

// Area quadrado = l * l
// Area circulo = π * r² 

interface Forma {
    public function calcularArea();
}

class Quadrado implements Forma {

    public $lado;

    public function __construct($lado) {
        $this->lado = $lado;
    }

    public function calcularArea() {
        return $this->lado * $this->lado;
    }   
}

class Circulo implements Forma {

    public $raio;

    public function __construct($raio) {
        $this->raio = $raio;
    }

    public function calcularArea() {
        return 3.14 * $this->raio * $this->raio;
    }
}

// Crie a classe "Pentágono", e calcule a área do mesmo.

class Pentagono implements Forma {
    public $apotema;
    public $lado;

    public function __construct($apotema, $lado) {
        $this->apotema = $apotema;
        $this->lado = $lado;
    }

    public function calcularArea() {
        return $this->lado * $this->apotema / 2;
    }
}

// Crie a classe "Hexágono", e calcule a área do mesmo.

class Hexagono implements Forma {

    public $lado;
    public $apotema;

    public function __construct($apotema, $lado) {
        $this->lado = $lado;
        $this->apotema = $apotema;
    }

    public function calcularArea() {
        return 6 * $this->lado * $this->apotema / 2;
    }
}

$quadrado = new Quadrado(readline("Digite a medida dos lados do quadrado: "));
echo "A área do quadrado é: ".$quadrado->calcularArea()."\n";

$circulo = new Circulo(readline("Digite a medida do raio do circulo: "));
echo "A área do circulo é: ".$circulo->calcularArea()."\n";

$pentagono = new Pentagono(readline("Digite a medida da apotema do pentagono: "), 5);
echo "A área do pentágono é: ".$pentagono->calcularArea()."\n";

$hexagono = new Hexagono( readline("Digite a medida da apotema do hexágono: "), 6);
echo "A área do hexágono é: ".$hexagono->calcularArea();