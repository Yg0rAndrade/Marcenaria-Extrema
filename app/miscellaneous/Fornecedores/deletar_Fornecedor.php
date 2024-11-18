<?php
if (isset($_GET['id_fornecedor'])) {
    require_once '../../Model/FornecedorModel.php';  

    // Coletar dados do formulário
    $id_fornecedor = $_GET['id_fornecedor'];
    echo $id_fornecedor;
    $fornecedor = new FornecedorModel();
    
    // Edita o cliente chamando a função e passando os dados
    $response = $fornecedor->deletarFornecedor($id_fornecedor);

// Exibir resposta, se necessário
echo $response;
}    
?>