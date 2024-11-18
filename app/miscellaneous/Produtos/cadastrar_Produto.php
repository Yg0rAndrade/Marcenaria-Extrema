<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
</head>

<body>

    <h2>Adicionar Produto</h2>
    <form method="POST" action="">
        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" required><br><br>

        <label for="valor_unit">Valor (Em unidades):</label>
        <input type="number" id="valor_unit" name="valor_unit" required><br><br>

        <button type="submit" name="submit">Adicionar Produto</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {

        require_once '../../Model/ProdutoModel.php';

        // Coletar dados do formulário
        $descricao = $_POST['descricao'];
        $valor_unit = $_POST['valor_unit'];

        $produto = new ProdutoModel();

        // Adiciona o cliente chamando a função e passando os dados
        $response = $produto->adicionarProduto($descricao, $valor_unit);
        
    }
    ?>

</body>

</html>