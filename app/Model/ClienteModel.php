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

        /* Código modificado para retornar como lista, no meu arquivo, o return $response não existe mais.
        $data = json_decode($response, true);

        return $data;
        */

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

/* CÓDIGO ADICIONADO PELO MICKAEL --> Funções adicionadas. Essas funções são chamadas quando o botão de criar,
editar e deletar são pressionados 


    public function adicionarCliente($nome, $telefone, $dataNascimento) //Adiciona um cliente
    {

        $url = parent::$supabaseURL . 'cliente' . '?select=*'; // Endpoint para buscar todos os registros

        $data = json_encode([
            "nome" => $nome,
            "telefone" => $telefone,
            "data_nascimento" => $dataNascimento
        ]);

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
       curl_setopt($ch, CURLOPT_CAINFO, $_SERVER['DOCUMENT_ROOT'] . 'parent::$path');
    
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

    public function editarClientes($clienteId, $nome, $telefone, $dataNascimento) {
        $url = parent::$supabaseURL . 'cliente?id_cliente=eq.' . $clienteId; // Endpoint para editar um cliente específico
    
        // Dados em formato JSON
        $data = json_encode([
            "nome" => $nome,
            "telefone" => $telefone,
            "data_nascimento" => $dataNascimento
        ]);
 
        // Depuração para verificar os dados que estão sendo enviados
        echo "Dados que estão sendo enviados: " . $data .$clienteId. "<br>";

        // Iniciar cURL
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH"); // Mudança para PATCH
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'apikey: ' . parent::$apiKey,
            'Authorization: Bearer ' . parent::$apiKey,
            'Content-Type: application/json',
            'Prefer: return=minimal'
        ]);
        
        // Aqui está o ajuste correto
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // Configurando os dados
    
        // Adicionar o caminho para o arquivo cacert.pem para resolver problemas SSL
        curl_setopt($ch, CURLOPT_CAINFO, parent::$path);
    
        // Executar e checar resposta
        $response = curl_exec($ch);

        $responseData = json_decode($response, true);
        print_r($responseData);
        
        if (curl_errno($ch)) {
            echo 'Erro cURL: ' . curl_error($ch);
        } else {
            echo 'Cliente editado com sucesso!';
        }
        
        curl_close($ch);
    
        return $response; // Retorna a resposta para o chamador da função
    }
        
    public function deletarCliente($clienteId){

        $url = parent::$supabaseURL . 'cliente?id_cliente=eq.' . $clienteId; // Endpoint para editar um cliente específico

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); // Alterar para DELETE
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'apikey: ' . parent::$apiKey,
            'Authorization: Bearer ' . parent::$apiKey,
            'Content-Type: application/json',
            'Prefer: return=minimal'
        ]);
    
        // Adicionar o caminho para o arquivo cacert.pem para resolver problemas SSL
        curl_setopt($ch, CURLOPT_CAINFO, parent::$path);
    
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
                return "Erro ao deletar o cliente: " . $response; // Exibir resposta de erro se necessária
            }
        }
        curl_close($ch);
    }
*/


}


