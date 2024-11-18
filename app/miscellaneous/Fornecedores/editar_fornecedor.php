<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Fornecedor</title>
</head>
<body>

<h2>Editar Fornecedor</h2>
<form method="POST" action="">
    <input type="hidden" id="id_fornecedor" name="id_fornecedor" value="<?php echo isset($_GET['id_fornecedor']) ? $_GET['id_fornecedor'] : ''; ?>">
    
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required value="<?php echo isset($fornecedor['nome']) ? $fornecedor['nome'] : ''; ?>"><br><br>

    <label for="cnpj">CNPJ:</label>
    <input type="number" id="cnpj" name="cnpj" required value="<?php echo isset($fornecedor['telefone']) ? $fornecedor['telefone'] : ''; ?>"><br><br>

    <button type="submit" name="submit">Editar Fornecedor</button>
</form>

<?php
    if (isset($_POST['submit'])) {
        require_once '../../Model/FornecedorModel.php';

        // Coletar dados do formulário
        $id_fornecedor = $_GET['id_fornecedor'];
        $nome = $_POST['nome'];
        $cnpj = $_POST['cnpj'];

        $fornecedor = new FornecedorModel();

        // Edita o cliente chamando a função e passando os dados
        $response = $fornecedor->editarFornecedor($id_fornecedor, $nome, $cnpj);

    // Exibir resposta, se necessário
    echo $response;
    }
?>

</body>
</html>