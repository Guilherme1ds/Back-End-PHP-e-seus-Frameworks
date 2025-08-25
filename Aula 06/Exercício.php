<?php
// Crie uma classe "Moto" com ao menos4 atributos sem a utilização de um construtor

class Moto {
    public $marca;
    public $modelo;
    public $cilindrada;
    public $ano;
    
    // Exercício Construtores
    /* public function __construct($dia, $mes, $ano) {
        $this -> dia = $dia;
        $this -> mes = $mes;
        $this -> ano = $ano;
    }

    public function __construct($nome, $idade, $cpf, $telefone, $endereco, $estado_civil, $sexo) {
        $this -> nome = $nome;
        $this -> idade = $idade;
        $this -> cpf = $cpf;
        $this -> telefone = $telefone;
        $this -> endereco = $endereco;
        $this -> estado_civil = $estado_civil;
        $this -> sexo = $sexo;
    }

    public function __construct($marca, $nome, $categoria, $data_fabricacao, $data_venda) {
        $this -> marca = $marca;
        $this -> nome = $nome;
        $this -> categoria = $categoria;
        $this -> data_fabricacao = $data_fabricacao;
        $this -> data_venda = $data_venda;
    } */
}

$objeto1 = new Moto();
$objeto1 -> marca = "Honda";
$objeto1 -> modelo = "CB 500X";
$objeto1 -> cilindrada = 500;
$objeto1 -> ano = 2020;

$objeto2 = new Moto();
$objeto2 -> marca = "Yamaha";
$objeto2 -> modelo = "Faezer 600";
$objeto2 -> cilindrada = 600;
$objeto2 -> ano = 2019;

$objeto3 = new Moto();
$objeto3 -> marca = "Kawasaki";
$objeto3 -> modelo = "Ninja 600";
$objeto3 -> cilindrada = 600;
$objeto3 -> ano = 2021;

?>