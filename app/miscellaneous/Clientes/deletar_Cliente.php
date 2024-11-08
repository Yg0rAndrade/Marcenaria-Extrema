<?php
if (isset($_GET['id_cliente'])) {
    require_once '../../Model/ClienteModel.php';    

    // Coletar dados do formulário
    $clienteId = $_GET['id_cliente'];
    echo $clienteId;
    $cliente = new ClienteModel();
    
    // Edita o cliente chamando a função e passando os dados
    $response = $cliente->deletarCliente($clienteId);

// Exibir resposta, se necessário
echo $response;
}    
?>