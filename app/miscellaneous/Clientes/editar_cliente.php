<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>
<body>

<h2>Editar Cliente</h2>
<form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="sobrenome">Sobrenome:</label>
        <input type="text" id="sobrenome" name="sobrenome" required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" maxlength='11' required><br><br>

        <label for="cnpjcpf">CPF ou CNPJ:</label>
        <input type="text" id="cnpjcpf" name="cnpjcpf" maxlength='14' required><br><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" required><br><br>

        <button type="submit" name="submit">Editar Cliente</button>
    </form>

<?php
    if (isset($_POST['submit'])) {
        require_once '../../Model/ClienteModel.php';

        // Coletar dados do formulário
        $clienteId = $_GET['id_cliente'];
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $telefone = $_POST['telefone'];
        $cpfcnpj = $_POST['cnpjcpf'];
        $email = $_POST['email'];
        $dataNascimento = $_POST['data_nascimento'];

        $cliente = new ClienteModel();

        // Edita o cliente chamando a função e passando os dados
        $response = $cliente->editarClientes($clienteId, $nome, $telefone, $dataNascimento,$sobrenome,$cpfcnpj,$email);

    // Exibir resposta, se necessário
    echo $response;
    }
?>

</body>
</html>