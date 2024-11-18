<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include_once "../../../Model/ClienteModel.php";
    
    $clienteModel = new ClienteModel();
    $dados_cliente = $clienteModel->getoneClient($id);
    
    if ($dados_cliente) {
        echo json_encode([
            'success' => true,
            'cliente' => $dados_cliente
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Cliente não encontrado']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID do cliente não especificado']);
}
?>
