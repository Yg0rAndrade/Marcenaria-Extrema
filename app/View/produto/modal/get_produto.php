<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include_once "../../../Model/ProdutoModel.php";
    
    $produtoModel = new ProdutoModel();
    $dados_produto = $produtoModel->getoneProduto($id);
    
    if ($dados_produto) {
        echo json_encode([
            'success' => true,
            'produto' => $dados_produto
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Produto não encontrado']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID do produto não especificado']);
}
?>
