<?php
class Moto1 {
    public $marca;
    public $modelo;
    public $cilindrada;
    public $ano;
    public $bateu;

    public function __construct($marca, $modelo, $cilindrada, $ano, $bateu) {
        echo "A motocicleta $marca $modelo tem $cilindrada cilindradas, foi fabricada em $ano e já foi batida: $bateu.";
    }
}

?>