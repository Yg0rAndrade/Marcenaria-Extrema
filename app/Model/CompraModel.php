<?php
include_once "db.php";

class CompraModel extends Db
{
    //Função para inserir os ids do fornecedor e de compra
    public function insertCompra(
        $id_fornecedor,
        $id_produto,
        $quantidade,
        $valor_unit,
        $valor_total     
    ) {
        $url = parent::$supabaseURL . "compra";

        $data = [
            "id_fornecedor" => $id_fornecedor,
            "id_produto" => $id_produto,
            "qtd" => $quantidade,
            "valor_unit" => $valor_unit,          
            "valor_total" => $valor_total
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "apikey: " . parent::$apiKey,
            "Authorization: " . parent::$authorization,
            "Content-Type: application/json",
            "Prefer: return=representation",
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
        return $data[0]["id_compra"];
    }

    public function getAllCompras()
    {
        $url = parent::$supabaseURL . "view_compras_detalhadas" . "?select=*";
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
    public function getAllFornecedores() //Busca todos os fornecedores cadastrados
    {

        $url = parent::$supabaseURL . 'fornecedor' . '?select=*'; // Irá buscar todos os fornecedores

        
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
    public function getAllProdutos()//Busca todos os produtos cadastrados
    {

        $url = parent::$supabaseURL . 'produto' . '?select=*'; // Irá buscar todos os produtos

        // Inicia o processo de listagem através de cURL         
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
            echo 'Erro cURL: ' . curl_error($ch); // Mensagem de erro
        }
        curl_close($ch);

        $data = json_decode($response, true); //Decodifica o json para que o PHP consiga ler

        return $data;
    }

    public function getoneCompra($id)
    {
        $url = parent::$supabaseURL . "compra" ."?id_compra=eq.$id" ."&select=";
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

public function cancelCompra($id_compra) {
    $url = parent::$supabaseURL . "compra?id_compra=eq." . $id_compra;
    $data = [
        "concluido" => false
    ];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "apikey: " . parent::$apiKey,
        "Authorization: " . parent::$authorization,
        "Content-Type: application/json",
    ]);
    curl_setopt($ch, CURLOPT_CAINFO, $_SERVER["DOCUMENT_ROOT"] . parent::$path);
    
    $response = curl_exec($ch);
    
    if (curl_errno($ch)) {
        echo "Erro cURL: " . curl_error($ch);
    }
    
    curl_close($ch);

    return $response;
}

public function finishCompra($id_compra) {
    $url = parent::$supabaseURL . "compra?id_compra=eq." . $id_compra;
    $data = [
        "concluido" => true
    ];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "apikey: " . parent::$apiKey,
        "Authorization: " . parent::$authorization,
        "Content-Type: application/json",
    ]);
    curl_setopt($ch, CURLOPT_CAINFO, $_SERVER["DOCUMENT_ROOT"] . parent::$path);
    
    $response = curl_exec($ch);
    
    if (curl_errno($ch)) {
        echo "Erro cURL: " . curl_error($ch);
    }
    
    curl_close($ch);

    return $response;
}

}
