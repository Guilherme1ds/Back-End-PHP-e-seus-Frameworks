<?php

/* Cenário 5 – Analise o problema com linguagem natural

"Um sistema de biblioteca deve permitir que usuários (alunos e professores)
façam empréstimos de livros e revistas." */

// Classes:
// SistemaDeBiblioteca
// Usuario
// Aluno
// Professor
// ItemBibliotecario
// Livro
// Revista
// Emprestimo

// Métodos:
// solicitarEmprestimo - Usuario
// devolveritem - Usuario
// Finalizar - Emprestimo 
// Emprestar - ItemBibliotecario
// Devolver - ItemBibliotecario
// RegistrarEmprestimo - SistemaDeBiblioteca
// RegistrarDevolucao - SistemaDeBiblioteca


class SistemaDeBiblioteca {
    public function registrarEmprestimo($usuario, $item) {
        $usuario->solicitarEmprestimo($item);
    }

    public function registrarDevolucao($usuario, $item) {
        $usuario->devolverItem($item);
    }
}

class Usuario {
    public function solicitarEmprestimo($item) {
        $item->emprestar();
    }

    public function devolverItem($item) {
        $item->devolver();
    }
}

class Aluno extends Usuario {}
class Professor extends Usuario {}

class ItemBibliotecario {
    public function emprestar($usuario) {
        echo "Item emprestado para $usuario";
    }

    public function devolver($usuario) {
        echo "Item devolvido por $usuario";
    }
}

class Livro extends ItemBibliotecario {}
class Revista extends ItemBibliotecario {}

class Emprestimo {
    public function finalizar() {
        echo "Empréstimo finalizado";
    }
}

?>