<?php


$apiUrl = 'https://inftqfcizgvxntcipxvr.supabase.co'; // URL base da sua instância do Supabase, certifique-se de incluir 'https://'/
$apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImluZnRxZmNpemd2eG50Y2lweHZyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3Mjg2MDYwNDcsImV4cCI6MjA0NDE4MjA0N30.NHgOyD8rgby8R5n0ebhAe_sdle5wpUzNgwI8oF4ezt4'; 
$tableName = 'cliente'; 

// Função para fazer uma requisição GET
function supabaseGet($apiUrl, $apiKey, $tableName) {
    $url = $apiUrl . '/rest/v1/' . $tableName . '?select=*'; // Endpoint para buscar todos os registros

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'apikey: ' . $apiKey,
        'Authorization: Bearer ' . $apiKey,
        'Content-Type: application/json'
    ]);
    
    // Adicionar o caminho para o arquivo cacert.pem
    curl_setopt($ch, CURLOPT_CAINFO, 'C:\wamp64\www\poo\test_marcenaria\cacert.pem');

    $response = curl_exec($ch);
    if(curl_errno($ch)) {
        echo 'Erro cURL: ' . curl_error($ch);
    }
    curl_close($ch);

    return $response;
}

// Exemplo de uso
$result = supabaseGet($apiUrl, $apiKey, $tableName);
var_dump($result) ;
