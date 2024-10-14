<?php
    require_once 'database.php';
    require_once 'Produto.php';

    if (isset($_POST["cadastrar"])) {
        $cadastrar = new Produto($pdo);
        $cadastrar->cadastrarProduto($_POST["nome"],$_POST["valor"],$_POST["quantidade"],$_POST["descricao"]);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>

<body>
    <h1>WIP</h1>
    <h6>Esta página irá cadastrar um produto</h6>
    <p>
    <form method="POST">
        <label>Nome</label><br>
        <input type="text" name="nome">
        <label>Valor</label><br>
        <input type="text" name="valor">
        <label>Quantidade</label><br>
        <input type="text" name="quantidade">
        <label>Descrição (Opcional)</label><br>
        <input type="text" name="descricao">
        <button type="submit" name="cadastrar">Cadastrar</button>
    </form>
</body>

</html>