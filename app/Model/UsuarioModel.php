<?php
include_once "db.php";

class UsuarioModel extends Db
{

    #Irá retornar o id do tipo de usuário (1 para adm e 2 para usuários normais)
    public function insertTipo(
        $id,
    ) {
        $url = parent::$supabaseURL . "tipo_user" ."?id=eq.$id" ."&select=";
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

        return $data[0]["id"];
    }

    // Método para inserir o usuário
    public function insertUsuario(
        $nome,
        $sobrenome,
        #$senha
    ) {
        $url = parent::$supabaseURL . "users";
        $data = [
            "nome" => $nome,
            "sobrenome" => $sobrenome,
            #"senha" => $senha
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

    public function insertUsuarioComTipo(
        $nome,
        $sobrenome,
        $id,
    ) {
        $id = $this->insertTipo(
            $id,
        );
        $response = $this->insertUsuario(
            $nome,
            $sobrenome,
        );
        return $response;
    }
    public function getAllUsuarios()
    {
        $url = parent::$supabaseURL . "users" . "?select=*";
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
    public function getoneUser($id)
    {
        $url = parent::$supabaseURL . "users" ."?id_users=eq.$id" ."&select=";
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

public function updateUsuario(
    $id_usuario,
    $nome,
    $sobrenome,
    #$senha,
) {
    $url = parent::$supabaseURL . "users?id_users=eq." . $id_usuario;
    $data = [
        "nome" => $nome,
        "sobrenome" => $sobrenome,  
        #"senha" => $senha,          
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

/*
public function deleteUser($id_usuario) {
    $url = parent::$supabaseURL . "user?id_usuario=eq." . $id_usuario;
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
*/
}
