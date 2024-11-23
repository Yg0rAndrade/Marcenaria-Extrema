<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include_once "../../../Model/CompraModel.php";
    
    $compraModel = new CompraModel();
    $dados_compra = $compraModel->getoneCompra($id);
    
    if ($dados_compra) {
        echo json_encode([
            'success' => true,
            'compra' => $dados_compra
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Compra não encontrada']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID do compra não especificado']);
}
?>
