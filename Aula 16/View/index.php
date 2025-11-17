<?php
require_once __DIR__ . '/../controller/BebidaController.php';

$controller = new BebidaController();

// Ações da página
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['acao'] === 'salvar') {
        $controller->criar($_POST['nome'], $_POST['categoria'], $_POST['volume'], $_POST['valor'], $_POST['qtde']);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } elseif ($_POST['acao'] === 'deletar') {
        $controller->deletar($_POST['nome']);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } elseif ($_POST['acao'] === 'atualizar') {
        
        $controller->atualizar(
            $_POST['nomeOriginal'],
            $_POST['nome'],
            $_POST['volume'],
            $_POST['categoria'],
            $_POST['valor'],
            $_POST['qtde']
        );
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

$bebidaParaEditar = null;
if (isset($_POST['acao']) && $_POST['acao'] === 'editar') {
    foreach ($controller->ler() as $bebida) {
        if ($bebida->getNome() === $_POST['nome']) {
            $bebidaParaEditar = $bebida;
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
    <title>Formulário de bebidas</title>
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
<h1>Gerenciamento de bebidas</h1>
<br>
<hr>
<div class="form-container">
    <?php if ($bebidaParaEditar): ?>
    <h2>Editar Bebidas</h2>
    <form method="POST">
        <input type="hidden" name="acao" value="atualizar">
    <input type="hidden" name="nomeOriginal" value="<?php echo htmlspecialchars($bebidaParaEditar->getNome()); ?>">
    <input type="text" name="nome"  placeholder="Nome:" value="<?php echo htmlspecialchars($bebidaParaEditar->getNome()); ?>" required>
        <input type="text" name="volume" placeholder="Volume:" value="<?php echo htmlspecialchars($bebidaParaEditar->getVolume()); ?>" required>
        <select name="categoria" required >
            <option value="<?php echo htmlspecialchars($bebidaParaEditar->getCategoria()); ?>">Selecione a categoria</option>
            <option value="Refrigerante">Refrigerante</option>
            <option value="Cerveja">Cerveja</option>
            <option value="Vinho">Vinho</option>
            <option value="Destilado">Destilado</option>
            <option value="Água">Água</option>
            <option value="Suco">Suco</option>
            <option value="Energético">Energético</option>
        </select>
        <input type="number" name="valor" step="0.01" placeholder="Valor em Reais (R$):" value="<?php echo htmlspecialchars($bebidaParaEditar->getValor()); ?>" required>
        <input type="number" name="qtde" placeholder="Quantidade em estoque:" value="<?php echo htmlspecialchars($bebidaParaEditar->getQtde()); ?>" required>
        <button type="submit" class="button-atualizar">Atualizar</button>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="delete">Cancelar</a>
    </form>
    <?php else: ?>
    <h2>Cadastrar Nova Bebida</h2>
    <form method="POST">
        <input type="hidden" name="acao" value="salvar">
        <input type="text" name="nome" placeholder="Nome da bebida:" required>
        <input type="text" name="volume" placeholder="Volume (ex: 300ml):" required>
        <select name="categoria" required>
            <option value="">Selecione a categoria</option>
            <option value="Refrigerante">Refrigerante</option>
            <option value="Cerveja">Cerveja</option>
            <option value="Vinho">Vinho</option>
            <option value="Destilado">Destilado</option>
            <option value="Água">Água</option>
            <option value="Suco">Suco</option>
            <option value="Energético">Energético</option>
        </select>
        <input type="number" name="valor" step="0.01" placeholder="Valor em Reais (R$):" required>
        <input type="number" name="qtde" placeholder="Quantidade em estoque:" required>
        <button type="submit">Cadastrar</button>
    </form>
    <?php endif; ?>
</div>

<div class="lista-container">
    <h2>Lista de Bebidas</h2>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Volume (ml)</th>
                <th>Categoria</th>
                <th>Valor (R$)</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $bebida): ?>
            <tr>
                <td><?php echo htmlspecialchars($bebida->getNome()); ?></td>
                <td><?php echo htmlspecialchars($bebida->getVolume()); ?></td>
                <td><?php echo htmlspecialchars($bebida->getCategoria()); ?></td>
                <td><?php echo number_format($bebida->getValor(), 2, ',', '.'); ?></td>
                <td><?php echo htmlspecialchars($bebida->getQtde()); ?></td>
                <td>
                    <form method="POST" style="display: inline;">
                        <input type="hidden" name="acao" value="editar">
                        <input type="hidden" name="nome" value="<?php echo htmlspecialchars($bebida->getNome()); ?>">
                        <button type="submit" class="atualizar">Editar</button>
                    </form>
                    <form method="POST">
                        <input type="hidden" name="acao" value="deletar">
                        <input type="hidden" name="nome" value="<?php echo htmlspecialchars($bebida->getNome()); ?>">
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