<?php
require_once __DIR__ . '/../controller/LivroController.php';

$controller = new LivroController();

// Ações da página
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['acao'] === 'salvar') {
        $controller->criar($_POST['titulo'], $_POST['autor'], $_POST['ano_publicacao'], $_POST['genero'], $_POST['quantidade']);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } elseif ($_POST['acao'] === 'deletar') {
        $controller->deletar($_POST['titulo']);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } elseif ($_POST['acao'] === 'atualizar') {
        
        $controller->atualizar(
            $_POST['tituloOriginal'],
            $_POST['novoTitulo'],
            $_POST['autor'],
            $_POST['ano_publicacao'],
            $_POST['genero'],
            $_POST['quantidade']
        );
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

$livroParaEditar = null;
    if (isset($_POST['acao']) && $_POST['acao'] === 'editar') {
        foreach ($controller->ler() as $livro) {
            if ($livro->getTitulo() === $_POST['titulo']) {
                $livroParaEditar = $livro;
                break;
            }
        }
    }

$lista = $controller->ler();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraria</title>
<style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9; /* Fundo suave */
            color: #333;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #8b4513; /* Cor primária */
            margin-bottom: 5px;
        }

        h2 {
            color: #555;
            margin-top: 0;
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
            display: inline-block;
        }

        hr {
            border: 0;
            height: 1px;
            background-color: #ccc;
            margin: 20px 0;
        }

        .form-container, .lista-container {
            max-width: 900px;
            margin: 20px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* --- Formulários --- */

        .form-container form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }

        input[type="text"],
        input[type="number"],
        select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            flex-grow: 1;
            min-width: 150px;
        }

        button[type="submit"],
        .delete,
        a.delete {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
            font-weight: bold;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        button[value="salvar"],
        button[value="Cadastrar"] {
            background-color: #8b4513; /* Marrom bonito */
        }

        button[value="salvar"]:hover,
        button[value="Cadastrar"]:hover {
            background-color: #a0522d;
        }

        button.atualizar,
        .button-atualizar {
            background-color: #007bff; /* Azul para editar */
        }

        button.atualizar:hover,
        .button-atualizar:hover {
            background-color: #0056b3;
        }

        .delete, a.delete {
            background-color: #dc3545; /* Vermelho para deletar/cancelar */
        }

        .delete:hover, a.delete:hover {
            background-color: #c82333;
        }

        /* --- Tabela --- */

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            text-align: left; /* Alinhamento do texto na tabela */
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #8b4513; /* Cabeçalho marrom */
            color: white;
            font-weight: normal;
            text-align: center;
        }

        td {
            background-color: #fff;
            color: #333;
            text-align: center;
        }

        tr:nth-child(even) td {
            background-color: #f9f9f9; /* Listras suaves */
        }

        tr:hover td {
            background-color: #e6e6e6; /* Efeito ao passar o mouse */
        }

        td:last-child {
            /* Coluna de Ações */
            text-align: center;
            width: 1%; /* Garante que a coluna de ações seja compacta */
            white-space: nowrap;
        }

        td form {
            display: inline-block;
            margin: 0 2px;
        }
    </style>
</head>
<body>
<h1>Livraria Livros</h1>
<br>
<hr>
<div class="form-container">
    <?php if ($livroParaEditar): ?>
    <h2>Editar livros</h2>
    <form method="POST">
        <input type="hidden" name="acao" value="atualizar">
        <input type="hidden" name="tituloOriginal" value="<?php echo htmlspecialchars($livroParaEditar->getTitulo()); ?>">
        <input type="text" name="novoTitulo"  placeholder="Titulo:" value="<?php echo htmlspecialchars($livroParaEditar->getTitulo()); ?>" required>
        <input type="text" name="autor" placeholder="Autor:" value="<?php echo htmlspecialchars($livroParaEditar->getAutor()); ?>" required>
        <select name="genero" required >
            <option value="<?php echo htmlspecialchars($livroParaEditar->getGenero()); ?>">Selecione o gênero</option>
            <option value="Drama">Drama</option>
            <option value="Romance">Romance</option>
            <option value="Fantasia">Fantasia</option>
            <option value="Mistério">Mistério</option>
            <option value="Biografia">Biografia</option>
            <option value="Ficção">Ficção</option>
            <option value="Aventura">Aventura</option>
        </select>
        <input type="number" name="ano_publicacao" placeholder="Ano de publicação:" value="<?php echo htmlspecialchars($livroParaEditar->getAnoPublicacao()); ?>" required>
        <input type="number" name="quantidade" placeholder="Quantidade em estoque:" value="<?php echo htmlspecialchars($livroParaEditar->getQuantidade()); ?>" required>
        <button type="submit" class="button-atualizar">Atualizar</button>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="delete">Cancelar</a>
    </form>
    <?php else: ?>
    <h2>Cadastrar novo livro</h2>
    <form method="POST">
        <input type="hidden" name="acao" value="salvar">
        <input type="text" name="titulo" placeholder="Título do livro:" required>
        <input type="text" name="autor" placeholder="Autor do livro:" required>
        <select name="genero" required>
            <option value="">Selecione o gênero</option>
            <option value="Drama">Drama</option>
            <option value="Romance">Romance</option>
            <option value="Fantasia">Fantasia</option>
            <option value="Mistério">Mistério</option>
            <option value="Biografia">Biografia</option>
            <option value="Ficção">Ficção</option>
            <option value="Aventura">Aventura</option>
        </select>
        <input type="number" name="ano_publicacao" placeholder="Ano de publicação:" required>
        <input type="number" name="quantidade" placeholder="Quantidade em estoque:" required>
        <button type="submit" value="Cadastrar">Cadastrar</button>
    </form>
    <?php endif; ?>
</div>

<div class="lista-container">
    <h2>Lista de Livros</h2>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Gênero</th>
                <th>Ano de publicação</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $livro): ?>
            <tr>
                <td><?php echo htmlspecialchars($livro->getTitulo()); ?></td>
                <td><?php echo htmlspecialchars($livro->getAutor()); ?></td>
                <td><?php echo htmlspecialchars($livro->getGenero()); ?></td>
                <td><?php echo htmlspecialchars($livro->getAnoPublicacao()); ?></td>
                <td><?php echo htmlspecialchars($livro->getQuantidade()); ?></td>
                <td>
                    <form method="POST" style="display: inline;">
                        <input type="hidden" name="acao" value="editar">
                        <input type="hidden" name="titulo" value="<?php echo htmlspecialchars($livro->getTitulo()); ?>">
                        <button type="submit" class="atualizar">Editar</button>
                    </form>
                    <form method="POST">
                        <input type="hidden" name="acao" value="deletar">
                        <input type="hidden" name="titulo" value="<?php echo htmlspecialchars($livro->getTitulo()); ?>">
                        <button type="submit" class="delete">Excluir</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



</body>
</html>