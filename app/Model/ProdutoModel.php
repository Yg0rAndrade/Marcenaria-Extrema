<?php
include_once 'Db.php';

class ProdutoModel extends Db
{
    private $tableName = 'produto';

    public function teste()
    {
        return parent::$supabaseURL;
    }

    public function getAllProdutos()
    {

        $url = parent::$supabaseURL . 'produto' . '?select=*'; // Endpoint para buscar todos os registros

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
    public function adicionarProduto($descricao, $valor_unit) //Adiciona um produto
    {

        $url = parent::$supabaseURL . 'produtos' . '?select=*'; // Endpoint para buscar todos os registros

        $data = json_encode([
            "descricao" => $descricao,
            "valor_unit" => $valor_unit,
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
            echo 'Produto cadastrado com sucesso!';
        }
        curl_close($ch);

        return $response;
    }
    public function editarProduto($id_produto, $descricao, $valor_unit) {
        $url = parent::$supabaseURL . 'produto?id_produto=eq.' . $id_produto; // Endpoint para editar um cliente específico
    
        // Dados em formato JSON
        $data = json_encode([
            "nome" => $nome,
            "cnpj" => $cnpj,
        ]);
 
        // Depuração para verificar os dados que estão sendo enviados
        echo "Dados que estão sendo enviados: " . $data .$id_produto. "<br>";

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
            echo 'Produto editado com sucesso!';
        }
        
        curl_close($ch);
    
        return $response; // Retorna a resposta para o chamador da função
    }
    public function deletarProduto($id_produto){

        $url = parent::$supabaseURL . 'produto?id_produto=eq.' . $id_produto; // Endpoint para editar um cliente específico

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
                header('Location: listar_Produtos.php'); // Altere para a URL da sua página inicial
                exit; // Sempre chame exit após um redirecionamento
            } else {
                return "Erro ao deletar o produto: " . $response; // Exibir resposta de erro se necessária
            }
        }
        curl_close($ch);
    }
*/
    }

