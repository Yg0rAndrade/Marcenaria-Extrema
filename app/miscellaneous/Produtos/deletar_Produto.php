<?php
if (isset($_GET['id_produto'])) {
    require_once '../../Model/ProdutoModel.php';  

    // Coletar dados do formulário
    $id_produto = $_GET['id_produto'];
    echo $id_produto;
    $produto = new ProdutoModel();
    
    // Edita o cliente chamando a função e passando os dados
    $response = $produto->deletarProduto($id_produto);

// Exibir resposta, se necessário
echo $response;
}    
?>