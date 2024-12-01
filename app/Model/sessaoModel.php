<?php
include_once 'db.php';
class Sessao extends Db
{
    public function singup($email, $password)
    {
        $url = parent::$supabaseAuthURL . "signup";
        $data = [
            "email" => $email,
            "password" => $password
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "apikey: " . parent::$apiKey,
            "Authorization: " . parent::$authorization,
            "Content-Type: application/json"
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
        $data = json_decode($response, true);
        return($data);
    }   
    public function login($email, $password )
    {
        $url = parent::$supabaseAuthURL . "token?grant_type=password";
        $data = [
            "email" => $email,
            "password" => $password
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "apikey: " . parent::$apiKey,
            "Authorization: " . parent::$authorization,
            "Content-Type: application/json"
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
        $data = json_decode($response, true);
        return ($data);
    }   

    public function recover($email)
    {
        $url = parent::$supabaseAuthURL . "recover";
        $data = [
            "email" => $email
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "apikey: " . parent::$apiKey,
            "Authorization: " . parent::$authorization,
            "Content-Type: application/json"
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
        $data = json_decode($response, true);
        return ($data);
    }
}
?>