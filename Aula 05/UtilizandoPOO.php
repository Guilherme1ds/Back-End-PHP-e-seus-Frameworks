<?php

class Carro {
    public $marca;
    public $modelo;
    public $ano;
    public $revisao;
    public $N_Donos;

    public function __construct($marca, $modelo, $ano, $revisao, $N_Donos) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->revisao = $revisao;
        $this->N_Donos = $N_Donos;
    }
}

$carro1 = new Carro("Porsche", "911", 2020, false, 3);
$carro2 = new Carro("Mitsubishi", "Lancer", 1945, true, 1);
$carro3 = new Carro("Fiat", "Palio", 2010, true, 2);
$carro4 = new Carro("Chevrolet", "Celta", 2005, false, 4);
$carro5 = new Carro("Ford", "Ka", 2015, true, 1);
$carro6 = new Carro("Volkswagen", "Gol", 2018, true, 2);

?>