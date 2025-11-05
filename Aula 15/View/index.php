<?php
require_once __DIR__ . "/../Controller/BebidaController.php";

$controller = new BebidaController();

if ($_SERVER['REQUEST_METHOD']==='POST') {
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
    }

    // Redireciona para evitar reenvio do formulário (PRG pattern)
    header("Location: index.php");
    exit;
}
$lista = $controller->ler();
?>

<!-- Formulário em HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Gerenciamento de bebidas</h1>

<br>
<hr>
    <form method="POST">
    <input type="hidden" name="acao" value="salvar">
    <input type="text" name="nome" placeholder="Nome da bebida:" required>
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
    <input type="text" name="volume" placeholder="Volume (ex: 300ml):" required>
    <input type="number" name="valor" step="0.01" placeholder="Valor em Reais (R$):" required>
    <input type="number" name="qtde" placeholder="Quantidade em estoque:" required>
    <button type="submit">Cadastrar</button>
    </form>

    <hr>

<?php if (!empty($lista)): ?>
    <h2>Bebidas cadastradas</h2>
    <?php foreach ($lista as $bebida): ?>
        <p>
            <strong>Nome:</strong> <?=$bebida->getNome()?><br>
            <strong>Categoria:</strong> <?=$bebida->getCategoria()?><br>
            <strong>Volume:</strong> <?=$bebida->getVolume()?><br>
            <strong>Valor:</strong> R$ <?=$bebida->getValor()?><br>
            <strong>Quantidade:</strong> <?=$bebida->getQtde()?><br>

            <form method="POST" style="margin-top:5px;">
                <input type="hidden" name="acao" value="deletar">
                <input type="hidden" name="nome" value="<?=$bebida->getNome()?>">
                <button type="submit">Excluir</button>
            </form>
        </p>
        <hr>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>
