<?php
include_once "db.php";

class User extends Db
{
    public function createUser($uuid, $nome, $sobrenome)
    {
        $url = parent::$supabaseURL . "users";
        if (empty($cargo)) {
            $cargo = 2;
        }


        $data = [
            "uuid" => $uuid,
            "nome" => $nome,
            "sobrenome" => $sobrenome,
            "cargo" => $cargo
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
            "Prefer: return=minimal",
        ]);
        curl_setopt($ch, CURLOPT_CAINFO, $_SERVER["DOCUMENT_ROOT"] . parent::$path);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo "Erro cURL: " . curl_error($ch);
        }

        curl_close($ch);
        return json_decode($response, true);
    }

    public function getOneUser($id)
    {
        $url = parent::$supabaseURL . "user_view?user_uuid=eq.$id&select=";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
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
        return json_decode($response, true);
    }

    public function getAllUsuarios()
    {
        $url = parent::$supabaseURL . "user_view?select=*";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
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
        return json_decode($response, true);
    }

    public function insertTipo($id)
    {
        $url = parent::$supabaseURL . "tipo_user?id=eq.$id&select=";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
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
        $data = json_decode($response, true);

        return $data[0]["id"] ?? null;
    }

    public function updateUsuario($id_usuario, $nome, $sobrenome, $cargo)
    {
        $url = parent::$supabaseURL . "users?id=eq." . $id_usuario;
        $data = [
            "nome" => $nome,
            "sobrenome" => $sobrenome,
            "cargo" => $cargo
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
            "Prefer: return=representation"
        ]);
        curl_setopt($ch, CURLOPT_CAINFO, $_SERVER["DOCUMENT_ROOT"] . parent::$path);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo "Erro cURL: " . curl_error($ch);
        }

        curl_close($ch);
        $data_decode = json_decode($response, true);
        return ($data_decode);
    }
    public function deleteUsuario($id_usuario){
        $url = parent::$supabaseURL . "users?id=eq." . $id_usuario;
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
            "Prefer: return=representation"
        ]);
        curl_setopt($ch, CURLOPT_CAINFO, $_SERVER["DOCUMENT_ROOT"] . parent::$path);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo "Erro cURL: " . curl_error($ch);
        }

        curl_close($ch);
        $data_decode = json_decode($response, true);
        return ($data_decode);
    }
}
