<?php
include_once "db.php";

class FornecedorModel extends Db
{
    public function insertEndereco(
        $logradouro,
        $bairro,
        $cidade,
        $cep,
        $numero,
        $complemento,
        $estado
    ) {
        $url = parent::$supabaseURL . "endereco";

        $data = [
            "logradouro" => $logradouro,
            "bairro" => $bairro,
            "cidade" => $cidade,
            "cep" => $cep,
            "numero" => $numero,
            "complemento" => $complemento,
            "estado" => $estado,
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
        return $data[0]["id_endereco"];
    }

    // Método para inserir o fornecedor
    public function insertFornecedor(
        $nome,
        $telefone,
        $cnpj,
        $id_endereco,
        $email
    ) {
        $url = parent::$supabaseURL . "fornecedor";
        $data = [
            "nome" => $nome,
            "telefone" => $telefone,
            "cnpj" => $cnpj,
            "id_endereco" => $id_endereco,
            "email" => $email,
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
        return $response;
    }

    public function insertFornecedorComEndereco(
        $nome,
        $telefone,
        $cnpj,
        $email,
        $logradouro,
        $bairro,
        $cidade,
        $cep,
        $numero,
        $complemento,
        $estado
    ) {
        $id_endereco = $this->insertEndereco(
            $logradouro,
            $bairro,
            $cidade,
            $cep,
            $numero,
            $complemento,
            $estado
        );
        $response = $this->insertFornecedor(
            $nome,
            $telefone,
            $cnpj,
            $id_endereco,
            $email
        );
        return $response;
    }
    public function getAllFornecedores()
    {
        $url = parent::$supabaseURL . "fornecedores_ativos" . "?select=*";
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
    public function getoneFornecedor($id)
    {
        $url = parent::$supabaseURL . "fornecedor" ."?id_fornecedor=eq.$id" ."&select=";
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
    public function getoneEndereco($id)
{
    // Define a URL para buscar o endereço
    $url = parent::$supabaseURL . "endereco" . "?id_endereco=eq.$id" . "&select=*";
    $ch = curl_init();

    // Configurações do cURL
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

    // Executa a requisição
    $response = curl_exec($ch);

    // Verifica por erros no cURL
    if (curl_errno($ch)) {
        echo "Erro cURL: " . curl_error($ch);
    }

    // Fecha a conexão
    curl_close($ch);

    // Decodifica a resposta JSON para um array associativo
    $data = json_decode($response, true);

    return $data;
}
public function updateFornecedor(
    $id_fornecedor,
    $nome,
    $email,
    $cnpj,
    $telefone
) {
    $url = parent::$supabaseURL . "fornecedor?id_fornecedor=eq." . $id_fornecedor;
    $data = [
        "nome" => $nome, 
        "email" => $email,          
        "cnpj" => $cnpj,    
        "telefone" => $telefone,
    ];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
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

    return $response;
}
public function deleteFornecedor($id_fornecedor) {
    $url = parent::$supabaseURL . "fornecedor?id_fornecedor=eq." . $id_fornecedor;
    $data = [
        "deletado" => true
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

public function updateEndereco(
    $id_endereco,
    $logradouro,
    $bairro,
    $cidade,
    $cep,
    $numero,
    $complemento,
    $estado
) {
    $url = parent::$supabaseURL . "endereco?id_endereco=eq." . $id_endereco;
    $data = [
        "logradouro" => $logradouro,
        "bairro" => $bairro,
        "cidade" => $cidade,
        "cep" => $cep,
        "numero" => $numero,
        "complemento" => $complemento,
        "estado" => $estado,
    ];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
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

    return $response;
}


}
