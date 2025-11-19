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
            $_POST['ano'],
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
        if ($bebida->getTitulo() === $_POST['nome']) {
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
    <title>Sistema de livros</title>
<style>
        body {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif; 
        }

        table {
            border: 2px;
            background-color: white; 
            text-align: center; margin: left; 
            width: 100%; 
            border-collapse: collapse; 
        }

        th { 
            background-color: #467ff8ff; 
            padding: 10px; 
            color: white; 
            border: 1px solid, black; 
        }

        td {
            padding: 10px; 
            border: 1px solid, black;
        }

        td form {
            display: inline-block;
            margin: 0;
        }
        
        button, .delete {
            background-color: green;
            color: white;
            padding: 6px 10px; 
            border: none;
            cursor: pointer;
            text-decoration: none; 
            display: inline-block; 
            font-size: 13.333px; 
            font-family: Arial, Helvetica, sans-serif; 
            line-height: normal;
        }

        .delete {
            background-color: red;
        }
        
        button.atualizar { 
            background-color: #007bff; 
        }
    </style>
</head>
<body>
<h1>Gerenciamento de livros</h1>
<br>
<hr>
<div class="form-container">
    <?php if ($livroParaEditar): ?>
    <h2>Editar livros</h2>
    <form method="POST">
        <input type="hidden" name="acao" value="atualizar">
    <input type="hidden" name="tituloOriginal" value="<?php echo htmlspecialchars($livroParaEditar->getTitulo()); ?>">
    <input type="text" name="titulo"  placeholder="Titulo:" value="<?php echo htmlspecialchars($livroParaEditar->getTitulo()); ?>" required>
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
        <input type="date" name="ano_publicacao" placeholder="Ano de publicação:" value="<?php echo htmlspecialchars($livroParaEditar->getAnoPublicacao()); ?>" required>
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
        <input type="date" name="valor" step="0.01" placeholder="Ano de publicação:" required>
        <input type="number" name="quantidade" placeholder="Quantidade em estoque:" required>
        <button type="submit">Cadastrar</button>
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
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $livro): ?>
            <tr>
                <td><?php echo htmlspecialchars($livro->getTitulo()); ?></td>
                <td><?php echo htmlspecialchars($livro->getAutor()); ?></td>
                <td><?php echo htmlspecialchars($livro->getGenero()); ?></td>
                <td><?php echo htmlspecialchars($livro->getAnoPublicacao(),); ?></td>
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