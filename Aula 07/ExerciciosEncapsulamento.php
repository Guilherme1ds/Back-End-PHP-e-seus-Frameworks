<?php
// Exercício 1 - Criação Básica

/* Crie uma classe chamada Carro com os atributos privados marca e
modelo.
o Implemente os métodos setMarca, getMarca, setModelo e getModelo.
o Crie um objeto da classe e use os setters para atribuir valores e os getters para exibir os dados. */

class Carro {
    private $marca;
    private $modelo;

    public function __construct($marca, $modelo) {
        $this -> setMarca($marca);
        $this -> setModelo($modelo);
    }

    public function setMarca($marca) {
        $this -> marca = ucwords(strtolower($marca));
    }

    public function getMarca() {
        return $this -> marca;
    }

    public function setModelo($modelo) {
        $this -> modelo = ucwords(strtolower($modelo));
    }

    public function getModelo() {
        return $this -> modelo;
    }
}

$carro = new Carro("fiat", "uno");
echo "Carro da marca: {$carro->getMarca()}, modelo: {$carro->getModelo()}.";

?>

<?php
// Exercício 2 - Pessoa com Atibutos

/* Crie uma classe Pessoa com os atributos privados nome, idade e email.
o Utilize os setters para preencher os dados de uma pessoa.
o Em seguida, use os getters para exibir as informações dessa pessoa em formato de frase, por exemplo:
O nome é Samuel, tem 22 anos e o email é samuel@exemplo.com. */

class Pessoa {
    private $nome;
    private $idade;
    private $email;

    public function __construct($nome, $idade, $email) {
        $this -> setNome($nome);
        $this -> setIdade($idade);
        $this -> setEmail($email);
    }

    public function setNome($nome) {
        $this -> nome = ucwords(strtolower($nome));
    }

    public function getNome() {
        return $this -> nome;
    }

    public function setIdade($idade) {
        $this -> idade = abs((int)$idade);
    }

    public function getIdade() {
        return $this -> idade;
    }

    public function setEmail($email) {
        $this -> email = $email;
    }

    public function getEmail() {
        return $this -> email;
    }
} 

$pessoa = new Pessoa("saMUel", 67, "saMuca_Valorant@gmail.com");
echo "O nome é {$pessoa->getNome()}, tem {$pessoa->getIdade()} anos e o email é {$pessoa->getEmail()}.";
?>

<?php
// Exercício 3 - Validação em Setter

/* Crie uma classe Aluno com os atributos privados nome e nota.
o No setNota, garanta que a nota só pode ser entre 0 e 10. Se o valor for inválido, armazene 0.
o Teste criando alunos com notas válidas e inválidas, exibindo os resultados com getNota(). */

class Aluno {
    private $nome;
    private $nota;

    public function __construct($nome, $nota) {
        $this -> setNome($nome);
        $this -> setNota($nota);
    }

    public function setNome($nome) {
        $this -> nome = ucwords(strtolower($nome));
    }

    public function getNome() {
        return $this -> nome;
    }

    public function setNota($nota) {
        if ($nota >= 0 && $nota <=10) {
            $this -> nota = $nota;
        } else {
            $this -> nota = 0;
        }
    }

    public function getNota() {
        return $this -> nota;
    }
} 

$aluno1 = new Aluno("Gabriel", 8.5,);
$aluno2 = new Aluno("Matheus", 14);

echo "Aluno: {$aluno1->getNome()}, Nota: {$aluno1->getNota()}.\n";
echo "Aluno: {$aluno2->getNome()}, Nota: {$aluno2->getNota()}.";
?>

<?php
// Exercício 4 - Encapsulamento de Produto

/* Crie uma classe Produto com os atributos privados nome, preco e estoque.
o Implemente os setters e getters.
o Faça um objeto da classe e use os setters para definir os valores.
o Exiba com os getters uma frase como:
O produto X custa R$ Y e possui Z unidades em estoque. */

class Produto {
    private $nome;
    private $preco;
    private $estoque;

    public function __construct($nome, $preco, $estoque) {
        $this -> setNome($nome);
        $this -> setPreco($preco);
        $this -> setEstoque($estoque);
    }

    public function setNome($nome) {
        $this -> nome = ucwords(strtolower($nome));
    }

    public function getNome() {
        return $this -> nome;
    }

    public function setPreco($preco) {
        $this -> preco = abs((float)$preco);
    }

    public function getPreco() {
        return $this -> preco;
    }

    public function setEstoque($estoque) {
        $this -> estoque = abs((int)$estoque);
    }

    public function getEstoque() {
        return $this -> estoque;
    }
}

$produto = new Produto("", "", "");
$produto -> setNome("Notebook");
$produto -> setPreco(4500.58);
$produto -> setEstoque(200);

echo "O produto {$produto->getNome()} custa R$ {$produto->getPreco()} e possui {$produto->getEstoque()} unidades em estoque.";
?>

<?php
// Exercício 5 - Alteração de Dados

/* Crie uma classe Funcionario com os atributos privados nome e salario.
o Crie métodos setNome, getNome, setSalario e getSalario.
o Defina os valores de um funcionário com os setters.
o Depois, altere o nome e o salário usando novamente os setters.
o Mostre, com os getters, que os valores realmente foram modificados. */

class Funcionario {
    private $nome;
    private $salario;

    public function __construct($nome, $salario) {
        $this -> setNome($nome);
        $this -> setSalario($salario);
    }

    public function setNome($nome) {
        $this -> nome = ucwords(strtolower($nome));
    }

    public function getNome() {
        return $this -> nome;
    }

    public function setSalario($salario) {
        $this -> salario = abs((float)$salario);
    }

    public function getSalario() {
        return $this -> salario;
    }
}

$funcionario = new Funcionario("Jefferson", 1600.50);
$funcionario -> setNome("Gustavo");
$funcionario -> setSalario("1800.00");

echo "Funcionário: {$funcionario->getNome()}, Salário: R$ {$funcionario->getSalario()}.";
?>  
