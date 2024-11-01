<?php
if (isset($_GET['id_cliente'])) {
    // Defina a API Key uma vez
    $apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImluZnRxZmNpemd2eG50Y2lweHZyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3Mjg2MDYwNDcsImV4cCI6MjA0NDE4MjA0N30.NHgOyD8rgby8R5n0ebhAe_sdle5wpUzNgwI8oF4ezt4';

    // Coletar dados do formulário
    $clienteId = $_GET['id_cliente'];

    // URL da API para deletar o cliente específico
    $apiUrl = 'https://inftqfcizgvxntcipxvr.supabase.co/rest/v1/cliente?id_cliente=eq.' . $clienteId;

    // Iniciar cURL
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); // Alterar para DELETE
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'apikey: ' . $apiKey,
        'Authorization: Bearer ' . $apiKey,
        'Content-Type: application/json',
        'Prefer: return=minimal'
    ]);

    // Adicionar o caminho para o arquivo cacert.pem para resolver problemas SSL
    curl_setopt($ch, CURLOPT_CAINFO, 'C:\wamp64\www\pooii\Projeto\cacert.pem');

    // Executar e checar resposta
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Erro cURL: ' . curl_error($ch);
    } else {
        // Verificar a resposta da API
        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) === 204) {
            // Redirecionar para a página inicial
            header('Location: listar_Clientes.php'); // Altere para a URL da sua página inicial
            exit; // Sempre chame exit após um redirecionamento
        } else {
            echo "Erro ao deletar o cliente: " . $response; // Exibir resposta de erro se necessária
        }
    }
    curl_close($ch);
}
?>