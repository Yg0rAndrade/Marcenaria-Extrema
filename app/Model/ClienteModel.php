<?php
include_once 'Db.php';

class ClienteModel extends Db
{
    private $tableName = 'cliente';

    public function teste()
    {
        return parent::$supabaseURL;
    }

    public function getAllClientes()
    {

        $url = parent::$supabaseURL . 'cliente' . '?select=*'; // Endpoint para buscar todos os registros

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'apikey: ' . parent::$apiKey,
            'Authorization: ' . parent::$authorization,
            'Content-Type: application/json'
        ]);

        // Adicionar o caminho para o arquivo cacert.pem
        curl_setopt($ch, CURLOPT_CAINFO, $_SERVER['DOCUMENT_ROOT'] . '/poo/marcenaria_extrema/app/config/cacert.pem');

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Erro cURL: ' . curl_error($ch);
        }
        curl_close($ch);

        return $response;
    }

    public function adicionarCliente() //Adiciona um cliente
    {

        $url = parent::$supabaseURL . 'cliente' . '?select=*'; // Endpoint para buscar todos os registros



        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'apikey: ' . parent::$apiKey,
            'Authorization: Bearer ' . parent::$apiKey,
            'Content-Type: application/json',
            'Prefer: return=minimal'
        ]);
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        // Adicionar o caminho para o arquivo cacert.pem para resolver problemas SSL
       curl_setopt($ch, CURLOPT_CAINFO, $_SERVER['DOCUMENT_ROOT'] . '/poo/marcenaria_extrema/app/config/cacert.pem');
    
        // Executar e checar resposta
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Erro cURL: ' . curl_error($ch);
        }else{
            echo 'Cliente cadastrado com sucesso!';
        }
        curl_close($ch);

        return $response;
    }
}

