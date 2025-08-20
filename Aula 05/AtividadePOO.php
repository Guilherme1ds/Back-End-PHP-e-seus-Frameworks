<?php
// Exercício 1: Crie uma classe (molde de objetos) chamada 'Cachorro' com os seguintes atributos: Nome, idade, raça, castrado e sexo
class Cachorro {
    public $nome;
    public $idade;
    public $raça;
    public $castrado;
    public $sexo;

    public function __construct($nome, $idade, $raça, $castrado, $sexo) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->raça = $raça;
        $this->castrado = $castrado;
        $this->sexo = $sexo;
    }
}

// Exercício 2: Após a criação da classe do exercício 1, crie 10 cachorros (10 objetos).

$cachorro1 = new Cachorro("Princesa", "2 Anos", "Pinscher", false, "Fêmea");
$cachorro2 = new Cachorro("Scooby", "3 Anos", "Salsicha", true, "Macho");
$cachorro3 = new Cachorro("Linguiça", "5 Anos", "Shitzu", true, "Macho");
$cachorro4 = new Cachorro("Felpuda", "4 Meses", "Poodle", false, "Fêmea");
$cachorro5 = new Cachorro("Bolas", "6 Anos", "Pitbull", false, "Macho");
$cachorro6 = new Cachorro("Zeus", "7 Anos", "Pastor Alemão", true, "Macho");
$cachorro7 = new Cachorro("Pérola", "1 Ano", "Pug", true, "Fêmea");
$cachorro8 = new Cachorro("Torpedo", "9 Anos", "Bulldog", false, "Macho");
$cachorro9 = new Cachorro("Dourado", "10 Anos", "Golden Retriever", true, "Macho");
$cachorro10 = new Cachorro("Jezer", "11 Anos", "Border Collie", true, "Macho");

?>
