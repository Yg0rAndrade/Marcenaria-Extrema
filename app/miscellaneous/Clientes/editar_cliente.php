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
    <input type="hidden" id="id" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
    
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
    $apiUrl = 'https://inftqfcizgvxntcipxvr.supabase.co/rest/v1/cliente/' . $_POST['id'];
    $apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImluZnRxZmNpemd2eG50Y2lpeHZyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3Mjg2MDYwNDcsImV4cCI6MjA0NDE4MjA0N30.NHgOyD8rgby8R5n0ebhAe_sdle5wpUzNgwI8oF4ezt4';

    // Coletar dados do formulário
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $dataNascimento = $_POST['data_nascimento'];

    // Inicializar $cliente como um array vazio

if (isset($_GET['id_cliente'])) {
    $clienteId = $_GET['id_cliente'];

    // Aqui você deve fazer a consulta ao banco de dados para obter os dados do cliente
    // Este é um exemplo de como você pode fazer isso, ajustando para sua implementação real
    $apiUrl = 'https://inftqfcizgvxntcipxvr.supabase.co/rest/v1/cliente?id=eq.' . $clienteId;
    $apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImluZnRxZmNpemd2eG50Y2lpeHZyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3Mjg2MDYwNDcsImV4cCI6MjA0NDE4MjA0N30.NHgOyD8rgby8R5n0ebhAe_sdle5wpUzNgwI8oF4ezt4';

    // Iniciar cURL para buscar os dados do cliente
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'apikey: ' . $apiKey,
        'Authorization: Bearer ' . $apiKey,
        'Content-Type: application/json'
    ]);

    // Executar a requisição
    $response = curl_exec($ch);
    if (!curl_errno($ch)) {
        $data = json_decode($response, true); // Decodificar a resposta em JSON
        if (isset($data[0])) {
            $cliente = $data[0]; // Acessar o primeiro cliente encontrado
        }
    }
    curl_close($ch);
}

    // Dados em formato JSON
    $data = json_encode([
        "nome" => $nome,
        "telefone" => $telefone,
        "data_nascimento" => $dataNascimento
    ]);

    // Iniciar cURL
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH"); // Mudar para PATCH
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
        echo "Cliente editado com sucesso!";
    }
    curl_close($ch);
}
?>

</body>
</html>