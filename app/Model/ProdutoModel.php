<?php
include_once 'db.php';

class ProdutoModel extends Db
{
    private $tableName = 'produto';

    public function teste()
    {
        return parent::$supabaseURL;
    }

    public function getAllProdutos()
    {

        $url = parent::$supabaseURL . 'produtos_ativos' . '?select=*'; // Endpoint para buscar todos os registros

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'apikey: ' . parent::$apiKey,
            'Authorization: ' . parent::$authorization,
            'Content-Type: application/json'
        ]);

        // Adicionar o caminho para o arquivo cacert.pem
        curl_setopt($ch, CURLOPT_CAINFO, $_SERVER['DOCUMENT_ROOT'] . '/marcenaria_extrema/app/config/cacert.pem');

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Erro cURL: ' . curl_error($ch);
        }
        curl_close($ch);

        $data = json_decode($response, true);

        return $data;
    }


    // Método para inserir o produto
    public function insertProduto(
        $nome,
        $descricao,
        $valor_unit,
        $quantidade

    ) {
        $url = parent::$supabaseURL . "produto";
        $data = [
            "nome" => $nome,
            "descricao" => $descricao,
            "valor_unit" => $valor_unit,
            "qtd" => $quantidade
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

    public function getoneProduto($id)
    {
        $url = parent::$supabaseURL . "produto" . "?id_produto=eq.$id" . "&select=";
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



    public function updateProduto(
        $id_produto,
        $nome,
        $descricao,
        $valor_unit,
        $quantidade
    ) {
        $url = parent::$supabaseURL . "produto?id_produto=eq." . $id_produto;
        $data = [
            "descricao" => $descricao,
            "nome" => $nome,
            "valor_unit" => $valor_unit,
            "qtd" => $quantidade
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
    public function deleteProduto(
        $id_produto
    ) {
        $url = parent::$supabaseURL . "produto?id_produto=eq." . $id_produto;
        $data = [
            "deletado" => true
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
