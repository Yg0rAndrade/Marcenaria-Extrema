<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include_once "../../../Model/VendaModel.php";
    
    $vendaModel = new VendaModel();
    $dados_venda = $vendaModel->getoneVenda($id);
    
    if ($dados_venda) {
        echo json_encode([
            'success' => true,
            'venda' => $dados_venda
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Venda não encontrada']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID do venda não especificado']);
}
?>
