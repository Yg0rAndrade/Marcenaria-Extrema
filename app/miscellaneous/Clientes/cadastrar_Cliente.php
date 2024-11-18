<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Cliente</title>
</head>

<body>

    <h2>Adicionar Cliente</h2>
    <!--Formulário para fazer o cadastro de um cliente -->
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

        <button type="submit" name="submit">Adicionar Cliente</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {

        //Arquivo necessário para que  o programa funcione.
        require_once '../../Model/ClienteModel.php';

        // Coleta os dados do formulário
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $telefone = $_POST['telefone'];
        $cpfcnpj = $_POST['cnpjcpf'];
        $email = $_POST['email'];
        $dataNascimento = $_POST['data_nascimento'];

        //Chama a classe para fazer o registro
        $cliente = new ClienteModel();

        // Adiciona o cliente chamando a função e passando os dados
        $response = $cliente->adicionarCliente($nome, $telefone, $dataNascimento,$sobrenome,$cpfcnpj,$email);
        
    }
    ?>

</body>

</html>