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
    <input type="hidden" id="id_cliente" name="id_cliente" value="<?php echo isset($_GET['id_cliente']) ? $_GET['id_cliente'] : ''; ?>">
    
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required value="<?php echo isset($cliente['nome']) ? $cliente['nome'] : ''; ?>"><br><br>

    <label for="telefone">Telefone:</label>
    <input type="text" id="telefone" name="telefone" required value="<?php echo isset($cliente['telefone']) ? $cliente['telefone'] : ''; ?>"><br><br>

    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="date" id="data_nascimento" name="data_nascimento" required value="<?php echo isset($cliente['data_nascimento']) ? $cliente['data_nascimento'] : ''; ?>"><br><br>

    <button type="submit" name="submit">Editar Cliente</button>
</form>

<?php
    if (isset($_POST['submit'])) {
        require_once '../../Model/ClienteModel.php';

        // Coletar dados do formulário
        $clienteId = $_GET['id_cliente'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $dataNascimento = $_POST['data_nascimento'];

        $cliente = new ClienteModel();

        // Edita o cliente chamando a função e passando os dados
        $response = $cliente->editarClientes($clienteId, $nome, $telefone,$dataNascimento);

    // Exibir resposta, se necessário
    echo $response;
    }
?>

</body>
</html>