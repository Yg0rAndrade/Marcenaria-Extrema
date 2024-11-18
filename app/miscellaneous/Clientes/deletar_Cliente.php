<?php
if (isset($_GET['id_cliente'])) {
    require_once '../../Model/ClienteModel.php';    

    //Coleta o id do cliente que será deletado.
    $clienteId = $_GET['id_cliente'];
    echo $clienteId;
    $cliente = new ClienteModel();
    
    //Função que irá remover o cliente.
    $response = $cliente->deletarCliente($clienteId);
}    
?>