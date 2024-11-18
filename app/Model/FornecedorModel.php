<?php
include_once 'Db.php';

class FornecedorModel extends Db
{
    private $tableName = 'fornecedor';

    public function teste()
    {
        return parent::$supabaseURL;
    }

    public function getAllFornecedores()
    {

        $url = parent::$supabaseURL . 'fornecedor' . '?select=*'; // Endpoint para buscar todos os registros

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

        $data = json_decode($response, true);

        return $data;
    }
/* Funções adicionadas
    public function adicionarFornecedor($nome, $cnpj) //Adiciona um fornecedor
    {

        $url = parent::$supabaseURL . 'fornecedor' . '?select=*'; // Endpoint para buscar todos os registros

        $data = json_encode([
            "nome" => $nome,
            "cnpj" => $cnpj,
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
       curl_setopt($ch, CURLOPT_CAINFO, $_SERVER['DOCUMENT_ROOT'] . '/poo/marcenaria_extrema/app/config/cacert.pem');
    
        // Executar e checar resposta
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Erro cURL: ' . curl_error($ch);
        }else{
            echo 'Fornecedor cadastrado com sucesso!';
        }
        curl_close($ch);

        return $response;
    }
    public function editarFornecedor($id_fornecedor, $nome, $cnpj) {
        $url = parent::$supabaseURL . 'fornecedor?id_fornecedor=eq.' . $id_fornecedor; // Endpoint para editar um cliente específico
    
        // Dados em formato JSON
        $data = json_encode([
            "nome" => $nome,
            "cnpj" => $cnpj,
        ]);
 
        // Depuração para verificar os dados que estão sendo enviados
        echo "Dados que estão sendo enviados: " . $data .$id_fornecedor. "<br>";

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
        curl_setopt($ch, CURLOPT_CAINFO, 'C:\wamp64\www\pooii\Projeto\cacert.pem');
    
        // Executar e checar resposta
        $response = curl_exec($ch);

        $responseData = json_decode($response, true);
        print_r($responseData);
        
        if (curl_errno($ch)) {
            echo 'Erro cURL: ' . curl_error($ch);
        } else {
            echo 'Fornecedor editado com sucesso!';
        }
        
        curl_close($ch);
    
        return $response; // Retorna a resposta para o chamador da função
    }
    public function deletarFornecedor($id_fornecedor){

        $url = parent::$supabaseURL . 'fornecedor?id_fornecedor=eq.' . $id_fornecedor; // Endpoint para editar um cliente específico

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
        curl_setopt($ch, CURLOPT_CAINFO, 'C:\wamp64\www\pooii\Projeto\cacert.pem');
    
        // Executar e checar resposta
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Erro cURL: ' . curl_error($ch);
        } else {
            // Verificar a resposta da API
            if (curl_getinfo($ch, CURLINFO_HTTP_CODE) === 204) {
                // Redirecionar para a página inicial
                header('Location: listar_Fornecedores.php'); // Altere para a URL da sua página inicial
                exit; // Sempre chame exit após um redirecionamento
            } else {
                return "Erro ao deletar o fornecedor: " . $response; // Exibir resposta de erro se necessária
            }
        }
        curl_close($ch);
    }
*/
    }

