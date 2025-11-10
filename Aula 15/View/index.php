<?php
require_once __DIR__ . "/../Controller/BebidaController.php";

$controller = new BebidaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['acao'] === 'salvar') {
        $controller->criar(
            $_POST['nome'],
            $_POST['categoria'],
            $_POST['volume'],
            $_POST['valor'],
            $_POST['qtde']
        );
    } elseif ($_POST['acao'] === 'deletar') {
        $controller->deletar($_POST['nome']);
    
    } elseif ($_POST['acao'] === 'atualizar') {
        $controller->atualizar(
            $_POST['nome_original'], 
            $_POST['nome'],          
            $_POST['categoria'],
            $_POST['volume'],
            $_POST['valor'],
            $_POST['qtde']
        );
    }

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$lista = $controller->ler(); 

$bebidaParaEditar = null;
$modo = 'salvar'; 
$categorias = ["Refrigerante", "Cerveja", "Vinho", "Destilado", "Água", "Suco", "Energético"];

if (isset($_GET['acao']) && $_GET['acao'] === 'editar' && isset($_GET['nome'])) {
    if (isset($lista[$_GET['nome']])) {
        $bebidaParaEditar = $lista[$_GET['nome']];
        $modo = 'atualizar'; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Bebidas</title>
    
    <style>
        body { text-align: center; font-family: Arial, Helvetica, sans-serif; }
        table { border: 2px; background-color: white; text-align: center; margin: left; width: 100%; border-collapse: collapse; }
        th { background-color: #467ff8ff; padding: 10px; color: white; border: 1px solid, black; }
        td { padding: 10px; border: 1px solid, black; }
        
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

<h2><?= $modo === 'salvar' ? 'Cadastrar Nova Bebida' : 'Editar Bebida' ?></h2>
<form method="POST" style="line-height: 2.5em;"> 
    <input type="hidden" name="acao" value="<?= $modo ?>">

    <?php if ($bebidaParaEditar): ?>
        <input type="hidden" name="nome_original" value="<?= $bebidaParaEditar->getNome() ?>">
    <?php endif; ?>

    <input type="text" name="nome" placeholder="Nome da Bebida:" required
           value="<?= $bebidaParaEditar ? $bebidaParaEditar->getNome() : '' ?>">
           
    <select name="categoria" required>
        <option value="">Selecione a categoria</option>
        <?php foreach ($categorias as $cat): ?>
            <?php
            $selected = ($bebidaParaEditar && $bebidaParaEditar->getCategoria() === $cat) ? 'selected' : '';
            ?>
            <option value="<?= $cat ?>" <?= $selected ?>><?= $cat ?></option>
        <?php endforeach; ?>
    </select>
    
    <input type="text" name="volume" placeholder="Volume (ex: 300ml):" required
           value="<?= $bebidaParaEditar ? $bebidaParaEditar->getVolume() : '' ?>">
           
    <input type="number" name="valor" step="0.01" placeholder="Valor em Reais (R$):" required
           value="<?= $bebidaParaEditar ? $bebidaParaEditar->getValor() : '' ?>">
           
    <input type="number" name="qtde" placeholder="Quantidade em estoque:" required
           value="<?= $bebidaParaEditar ? $bebidaParaEditar->getQtde() : '' ?>">
    
    <button type="submit">
        <?= $modo === 'salvar' ? 'Cadastrar' : 'Atualizar' ?>
    </button>
    
    <?php if ($bebidaParaEditar): ?>
        <a href="index.php" class="delete">Cancelar Edição</a>
    <?php endif; ?>
</form>

<hr>

<?php if (!empty($lista)): ?>
    <h2>Bebidas cadastradas</h2>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Volume</th>
                <th>Valor</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($lista as $bebida): ?>
        <tr>
            <td><?=$bebida->getNome()?></td>
            <td><?=$bebida->getCategoria()?></td>
            <td><?=$bebida->getVolume()?></td>
            <td><?=$bebida->getValor()?></td>
            <td><?=$bebida->getQtde()?></td>

            <td>
                <form method="POST" style="margin-top:5px; display: inline;">
                    <input type="hidden" name="acao" value="deletar">
                    <input type="hidden" name="nome" value="<?=$bebida->getNome()?>">
                    <button class="delete" type="submit">Excluir</button>
                </form>
            
                <form method="GET" style="margin-top:5px; display: inline;">
                    <input type="hidden" name="acao" value="editar">
                    <input type="hidden" name="nome" value="<?=$bebida->getNome()?>">
                    <button class="atualizar" type="submit">Editar</button>
                </form>
            </td>
        </tr> <?php endforeach; ?>
    </tbody>
    </table>
<?php endif; ?>

</body>
</html>