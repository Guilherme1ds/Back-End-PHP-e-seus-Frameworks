<?php

class Pessoa {
    private $nome;
    private $cpf;
    private $telefone;
    private $idade;
    private $email;
    private $senha;

    public function __construct($nome, $cpf, $telefone, $idade, $email, $senha) {
        $this->setNome($nome);
        $this->setCpf($cpf);
        $this->setTelefone($telefone);
        $this->setIdade($idade);
        $this->email = $email;
        $this->senha = $senha;
    }

    // Getter e Setter para $nome
    public function setNome($nome) { // Setter Nome
        $this->nome = ucwords(strtolower($nome));
    }

    public function getNome() { // Getter Nome
        return $this->nome;
    }

    // Getter e Setter para $cpf
    public function setCpf($cpf) { // Setter CPF
        $this->cpf = preg_replace('/\D/', '', $cpf);
    }
    // preg_replace: altera a estrutura de uma string
    // pattern: /\D/ = significa qualquer caracter que não seja digito "," e "-"

    public function getCpf() { // Getter CPF
        return $this->cpf;
    }

    public function setTelefone($telefone) {
        $this->telefone = preg_replace('/\D/', '', $telefone);
    }

    public function getTelefone() {
        return $this->telefone;
    }

    // Getter e Setter para idade
    public function setIdade($idade) {
        $this->idade = abs((int)$idade);
    }
    // (int)$variável: garante valor inteiro
    // abs($variável): garante número positivo -22 -> 22

    public function getIdade() {
        return $this->idade;
    }
}

$aluno1 = new Pessoa("gUIlheRME HENriquE beRnARdI", "455.347.112-98", "(19)99999-2324",
-25, "teste@testando.com", "teste123");

echo $aluno1->getNome();