<?php
include_once "db.php";

class DashboardModel extends Db
{

    public function getUltimaVenda()
    {
        $url = parent::$supabaseURL . "view_vendas_detalhadas" . "?select=*&order=valor_total.desc&limit=1";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "apikey: " . parent::$apiKey,
            "Authorization: " . parent::$authorization,
            "Content-Type: application/json",
        ]);
        curl_setopt(
            $ch,
            CURLOPT_CAINFO,
            $_SERVER["DOCUMENT_ROOT"] . parent::$path
        );

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo "Erro cURL: " . curl_error($ch);
        }
        curl_close($ch);

        $data = json_decode($response, true);

        return $data;
    }
    public function getUltimaCompra()
    {
        $url = parent::$supabaseURL . "view_compras_detalhadas" . "?select=*&order=valor_total.desc&limit=1";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "apikey: " . parent::$apiKey,
            "Authorization: " . parent::$authorization,
            "Content-Type: application/json",
        ]);
        curl_setopt(
            $ch,
            CURLOPT_CAINFO,
            $_SERVER["DOCUMENT_ROOT"] . parent::$path
        );
    
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo "Erro cURL: " . curl_error($ch);
        }
        curl_close($ch);
    
        $data = json_decode($response, true);
    
        return $data;
    }    

    public function getUltimoCliente() //Busca todos os clientes cadastrados
    {

        $url = parent::$supabaseURL . "clientes_ativos" . "?select=*&order=id_cliente.desc&limit=1";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'apikey: ' . parent::$apiKey,
            'Authorization: ' . parent::$authorization,
            'Content-Type: application/json'
        ]);

        // Caminho de certificados Cacert.pem
        curl_setopt($ch, CURLOPT_CAINFO, $_SERVER['DOCUMENT_ROOT'] . parent::$path);

        // Executa e retorna uma resposta
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            // Verifica a resposta do supabase            
            echo 'Erro cURL: ' . curl_error($ch);  // Mensagem de erro
        }
        curl_close($ch);

        $data = json_decode($response, true); //Decodifica o json para que o PHP consiga ler

        return $data;
    }
    public function getUltimoFornecedor() //Busca todos os fornecedores cadastrados
    {

        $url = parent::$supabaseURL . "fornecedores_ativos" . "?select=*&order=id_fornecedor.desc&limit=1";       
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'apikey: ' . parent::$apiKey,
            'Authorization: ' . parent::$authorization,
            'Content-Type: application/json'
        ]);

        // Caminho de certificados Cacert.pem
        curl_setopt($ch, CURLOPT_CAINFO, $_SERVER['DOCUMENT_ROOT'] . parent::$path);

        // Executa e retorna uma resposta
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            // Verifica a resposta do supabase            
            echo 'Erro cURL: ' . curl_error($ch);  // Mensagem de erro
        }
        curl_close($ch);

        $data = json_decode($response, true); //Decodifica o json para que o PHP consiga ler

        return $data;
    }
}