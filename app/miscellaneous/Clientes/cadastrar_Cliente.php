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
    $apiUrl = 'https://inftqfcizgvxntcipxvr.supabase.co/rest/v1/cliente';
    $apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImluZnRxZmNpemd2eG50Y2lweHZyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3Mjg2MDYwNDcsImV4cCI6MjA0NDE4MjA0N30.NHgOyD8rgby8R5n0ebhAe_sdle5wpUzNgwI8oF4ezt4';

    // Coletar dados do formulário
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $dataNascimento = $_POST['data_nascimento'];

    // Dados em formato JSON
    $data = json_encode([
        "nome" => $nome,
        "telefone" => $telefone,
        "data_nascimento" => $dataNascimento
    ]);

    // Iniciar cURL
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'apikey: ' . $apiKey,
        'Authorization: Bearer ' . $apiKey,
        'Content-Type: application/json',
        'Prefer: return=minimal'
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    // Adicionar o caminho para o arquivo cacert.pem para resolver problemas SSL
    curl_setopt($ch, CURLOPT_CAINFO, 'C:\wamp64\www\pooii\Projeto\cacert.pem');

    // Executar e checar resposta
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Erro cURL: ' . curl_error($ch);
    } else {
        echo "Cliente adicionado com sucesso!";
    }
    curl_close($ch);
}
?>

</body>
</html>
