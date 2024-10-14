<?php
$host = '';
$dbname = '';
$user = '';
$pass = '';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $error){
    echo "Falha na conexão com o banco de dados: \n" . "<b>".$error->getMessage()."</b>";
    exit;
}
?>