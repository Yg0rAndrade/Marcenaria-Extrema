<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Fornecedor</title>
</head>

<body>

    <h2>Adicionar Fornecedor</h2>
    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="cnpj">CNPJ:</label>
        <input type="number" id="cnpj" name="cnpj" required><br><br>

        <button type="submit" name="submit">Adicionar Fornecedor</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {

        require_once '../../Model/FornecedorModel.php';

        // Coletar dados do formulário
        $nome = $_POST['nome'];
        $cnpj = $_POST['cnpj'];

        $fornecedor = new FornecedorModel();

        // Adiciona o cliente chamando a função e passando os dados
        $response = $fornecedor->adicionarFornecedor($nome, $cnpj);
        
    }
    ?>

</body>

</html>