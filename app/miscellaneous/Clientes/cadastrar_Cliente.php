<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Cliente</title>
</head>

<body>

    <h2>Adicionar Cliente</h2>
    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required><br><br>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" required><br><br>

        <button type="submit" name="submit">Adicionar Cliente</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {

        require_once '../../Model/ClienteModel.php';

        // Coletar dados do formulário
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $dataNascimento = $_POST['data_nascimento'];

        $cliente = new ClienteModel();

        // Adiciona o cliente chamando a função e passando os dados
        // Código apresenta erro pois a função está comentada
        $response = $cliente->adicionarCliente($nome, $telefone, $dataNascimento);
        
    }
    ?>

</body>

</html>