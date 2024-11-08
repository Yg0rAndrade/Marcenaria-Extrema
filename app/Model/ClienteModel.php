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
        curl_setopt($ch, CURLOPT_CAINFO, $_SERVER['DOCUMENT_ROOT'] . parent::$path);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Erro cURL: ' . curl_error($ch);
        }
        curl_close($ch);

        return $response;
    }

    public function insertCliente($nome, $telefone, $data_nascimento)
    {
        $url = parent::$supabaseURL . 'cliente'; // Endpoint para inserir um novo registro
    
        $data = [
            'nome' => $nome,
            'telefone' => $telefone,
            'data_nascimento' => $data_nascimento
        ];
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'apikey: ' . parent::$apiKey,
            'Authorization: ' . parent::$authorization,
            'Content-Type: application/json'
        ]);
    
        // Adicionar o caminho para o arquivo cacert.pem
        curl_setopt($ch, CURLOPT_CAINFO, $_SERVER['DOCUMENT_ROOT'] . parent::$path);
    
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Erro cURL: ' . curl_error($ch);
        }
        curl_close($ch);
    
        return $response;
    }

    public function updateCliente($id_cliente, $nome, $telefone, $data_nascimento)
    {
        $url = parent::$supabaseURL . 'cliente?id_cliente=eq.' . $id_cliente; // Endpoint para atualizar um registro específico
    
        $data = [
            'nome' => $nome,
            'telefone' => $telefone,
            'data_nascimento' => $data_nascimento
        ];
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'apikey: ' . parent::$apiKey,
            'Authorization: ' . parent::$authorization,
            'Content-Type: application/json'
        ]);
    
        // Adicionar o caminho para o arquivo cacert.pem
        curl_setopt($ch, CURLOPT_CAINFO, $_SERVER['DOCUMENT_ROOT'] . parent::$path);
    
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Erro cURL: ' . curl_error($ch);
        }
        curl_close($ch);
    
        return $response;
    }

    public function deleteCliente($id_cliente)
{
    $url = parent::$supabaseURL . 'cliente?id_cliente=eq.' . $id_cliente; // Endpoint para deletar um registro específico

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE'); // Define a requisição como DELETE
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'apikey: ' . parent::$apiKey,
        'Authorization: ' . parent::$authorization,
        'Content-Type: application/json'
    ]);

    // Adicionar o caminho para o arquivo cacert.pem
    curl_setopt($ch, CURLOPT_CAINFO, $_SERVER['DOCUMENT_ROOT'] . parent::$path);

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Erro cURL: ' . curl_error($ch);
    }
    curl_close($ch);

    return $response;
}




    /* public function adicionarCliente() //Adiciona um cliente
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
       curl_setopt($ch, CURLOPT_CAINFO, $_SERVER['DOCUMENT_ROOT'] . '/poo/Projeto/app/config/cacert.pem');
    
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
*/
    }


