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
    // Defina a API Key uma vez
    $apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImluZnRxZmNpemd2eG50Y2lweHZyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3Mjg2MDYwNDcsImV4cCI6MjA0NDE4MjA0N30.NHgOyD8rgby8R5n0ebhAe_sdle5wpUzNgwI8oF4ezt4';

    // Coletar dados do formulário
    $clienteId = $_GET['id_cliente'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $dataNascimento = $_POST['data_nascimento'];

    // URL da API para o cliente específico
    $apiUrl = 'https://inftqfcizgvxntcipxvr.supabase.co/rest/v1/cliente?id_cliente=eq.' . $clienteId;
    

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
        // Verificar a resposta da API
        if ($httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE) === 204) {
            echo "Cliente editado com sucesso!";
        } else {
            echo "Erro ao editar o cliente: " . $response; // Exibir resposta de erro se necessária
        }
    }
    curl_close($ch);
}
?>

</body>
</html>