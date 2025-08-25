<?php

class Usuario {
    public $nome;
    public $cpf;
    public $sexo;
    public $email;
    public $estado_civil;
    public $cidade;
    public $estado;
    public $endereço;
    public $cep;

    public function __construct($nome, $cpf, $sexo, $email, $estado_civil, $cidade, $estado, $endereço, $cep) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->sexo = $sexo;
        $this->email = $email;
        $this->estado_civil = $estado_civil;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->endereço = $endereço;
        $this->cep = $cep;
    }

    public function testandoReservista($sexo) {
        if ($sexo == "Masculino") {
            echo "Apresente seu certificado de reservista do tiro de guerra!";
        } else {
            echo "Tudo certo.";
        }
    }

    public function Casamento($anos_casado) {
        if ($this->estado_civil == "Casado") {
            echo "Parabéns pelo seu casamento de $anos_casado anos!";
        } else {
            echo "oloco";
        }
    }
}

$usuario1 = new Usuario("Josenildo Afonso Souza", "100.200.300-40", "Masculino", "josenewdo.souza@gmail.com", "Casado", "Xique-Xique",
"Bahia", "Rua da amizade, 99", "40123-98");
$usuario2 = new Usuario("Valentina Passos Scherrer", "070.070.060-70", "Feminino", "scherrer.valen@outlook.com", "Divorciada", "Iracemápolis",
"São Paulo", "Avenida da saudade, 1942", "23456-24");
$usuario3 = new Usuario("Claudio Braz Nepumoceno", "575.575.242-32", "Masculino", "Clauclau.nepumoceno@gmail.com", "Casado", "Piripiri",
"Piauí", "Estrada 3, 33", "12345-99");
$usuario3 -> Casamento("12");
$usuario3 -> testandoReservista("Masculino");
?>