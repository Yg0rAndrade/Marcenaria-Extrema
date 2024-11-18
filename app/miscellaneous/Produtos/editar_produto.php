<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>
<body>

<h2>Editar Produto</h2>
<form method="POST" action="">
    <input type="hidden" id="id_produto" name="id_produto" value="<?php echo isset($_GET['id_produto']) ? $_GET['id_produto'] : ''; ?>">
    
    <label for="descricao">Descrição:</label>
    <input type="text" id="descricao" name="descricao" required value="<?php echo isset($produto['descricao']) ? $produto['descricao'] : ''; ?>"><br><br>

    <label for="valor_unit">Valor (Em unidades):</label>
    <input type="number" id="valor_unit" name="valor_unit" required value="<?php echo isset($produto['valor_unit']) ? $produto['valor_unit'] : ''; ?>"><br><br>

    <button type="submit" name="submit">Editar Produto</button>
</form>

<?php
    if (isset($_POST['submit'])) {
        require_once '../../Model/ProdutoModel.php';

        // Coletar dados do formulário
        $id_produto = $_GET['id_produto'];
        $descricao = $_POST['descricao'];
        $valor_unit = $_POST['valor_unit'];

        $produto = new ProdutoModel();

        // Edita o cliente chamando a função e passando os dados
        $response = $produto->editarProduto($id_produto, $descricao, $valor_unit);

    // Exibir resposta, se necessário
    echo $response;
    }
?>

</body>
</html>