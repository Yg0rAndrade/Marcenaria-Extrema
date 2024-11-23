<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include_once "../../../Model/FornecedorModel.php";
    
    $fornecedorModel = new FornecedorModel();
    $dados_fornecedor = $fornecedorModel->getoneFornecedor($id);
    
    if ($dados_fornecedor) {
        echo json_encode([
            'success' => true,
            'fornecedor' => $dados_fornecedor
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Fornecedor não encontrado']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID do fornecedor não especificado']);
}
?>
