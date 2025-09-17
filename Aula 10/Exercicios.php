<?php
/* Exercício 1 – Formas Geométricas
Crie uma interface `Forma` com o método `calcularArea()`. Implemente as classes:
- `Quadrado` (lado),
- `Retangulo` (base e altura),
- `Circulo` (raio). */

namespace exercicios;

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

class Retangulo implements Forma {
    public $base;

    public $altura;

    public function __construct($base, $altura) {
        $this->base = $base;
        $this->altura = $altura;
    }

    public function calcularArea() {
        return $this->base * $this->altura;
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

$quadrado = new Quadrado(readline("Digite a medida dos lados do quadrado: "));
echo "A área do quadrado é: ".$quadrado->calcularArea()."\n";

$retangulo = new Retangulo(readline("Digite a medida da base do retângulo: \n"), readline("Digite a medida da altura do retângulo: "));
echo "A área do retângulo é: ".$retangulo->calcularArea()."\n";

$circulo = new Circulo(readline("Digite a medida do raio do circulo: "));
echo "A área do circulo é: ".$circulo->calcularArea()."\n";

?>

<?php
/* Exercício 2 – Animais e Sons
Crie uma classe pai `Animal` com o método `fazerSom()`. Implemente as classes:
- `Cachorro` → "Au au!",
- `Gato` → "Miau!",
- `Vaca` → "Muuu!". */

namespace exercicios;

class Animal {
    public $som;

    public function __construct($som) {
        $this->som = $som;
    }

    public function fazerSom() {
        return $this->som;
    }
}

class Cachorro extends Animal {
    public function __construct($som) {
        parent::__construct($som);
    }

    public function fazerSom() {
        return $this->som = "Au au!";
    }
}

class Gato extends Animal {
    public function __construct($som) {
        parent::__construct($som);
    }

    public function fazerSom() {
        return $this->som = "Miau!";
    }
}

class Vaca extends Animal {
    public function __construct($som) {
        parent::__construct($som);
    }

    public function fazerSom() {
        return $this->som = "Muuu!";
    }
}

?>

<?php
/* Exercício 3 – Meios de Transporte
Crie uma classe abstrata `Transporte` com o método `mover()`. Implemente as classes:

- `Carro` → "O carro está andando na estrada",
- `Barco` → "O barco está navegando no mar",
- `Avião` → "O avião está voando no céu".
- `Elevador` → "O Elevador está correndo pelo no prédio". */

interface Transporte {
    public function mover();
}

class Carro {
    public function mover() {
        echo "O carro está andando na estrada.";
    }
}

class Barco {
    public function mover() {
        echo "O barco está navegando no mar.";
    }
}

class Aviao {
    public function mover() {
        echo "O avião está voando no céu.";
    }
}

class Elevador {
    public function mover() {
        echo "O elevador está correndo pelo prédio.";
    }
}

?>

<?php
/* Exercício 4 – Notificações
Crie duas classes:
- `Email` com o método `enviar()`, que retorna "Enviando email...",
- `Sms` com o método `enviar()`, que retorna "Enviando SMS...".
Depois crie uma função `notificar($meio)` que aceite qualquer objeto com `enviar()` e faça a
chamada. Teste com ambos os objetos. */

class Email {
    public function enviar() {
        return "Enviando email...";
    }
}

class SMS {
    public function enviar() {
        return "Enviando SMS...";
    }
}

function notificar($meio) {
    echo $meio->enviar();
}

$email = new Email();
$sms = new SMS();
echo notificar($email),"\n";
echo notificar($sms),"\n";

?>

<?php
/* Exercício 5 – Calculadora com Sobrecarga Simulada
Crie uma classe `Calculadora` com o método `somar()`.
- Se receber 2 números, retorna a soma dos dois.
- Se receber 3 números, retorna a soma dos três. */

class Calculadora {
    public function somar($num1, $num2, $num3 = 0) {
        return $num1 + $num2 + $num3;
    } 
}

$calcular = new Calculadora();
echo "Soma de dois números: ".$calcular->somar(5,10)."\n";
echo "Soma de três números: ".$calcular->somar(5,10, 10)."\n";

?>