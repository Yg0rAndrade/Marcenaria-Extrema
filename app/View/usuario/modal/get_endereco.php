<?php
#Talvez de para modificar para outra coisa.
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include_once "../../../Model/FornecedorModel.php";
    
    $enderecoModel = new FornecedorModel();
    $dados_endereco = $enderecoModel->getoneEndereco($id);
    
    if ($dados_endereco) {
        echo json_encode([
            'success' => true,
            'endereco' => $dados_endereco
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Endereço não encontrado']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID do endereço não especificado']);
}
?>