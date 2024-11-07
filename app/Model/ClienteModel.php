
<?php
    include_once 'Db.php';

    class ClienteModel extends Db{
        private $tableName = 'cliente';

        public function teste(){
            return parent::$supabaseURL;
        }

        public function getAllClientes(){
           
                
               
                
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
    curl_setopt($ch, CURLOPT_CAINFO, $_SERVER['DOCUMENT_ROOT'].'/poo/marcenaria_extrema/app/config/cacert.pem');

    $response = curl_exec($ch);
    if(curl_errno($ch)) {
        echo 'Erro cURL: ' . curl_error($ch);
    }
    curl_close($ch);

    return $response;
}
    }

 