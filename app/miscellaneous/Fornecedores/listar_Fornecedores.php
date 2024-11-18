<?php
require_once '../../Model/FornecedorModel.php';
$fornecedor = new FornecedorModel();
$fornecedores = $fornecedor->getAllFornecedores();

// Exibe os dados em uma lista
if (is_array($fornecedores)) {
    echo "<ul>";
    foreach ($fornecedores as $lista) {
        echo "<li>Nome: " . htmlspecialchars($lista['nome']) . ", CNPJ: " . htmlspecialchars($lista['cnpj']) . " <a href='editar_fornecedor.php?id_fornecedor=" . htmlspecialchars($lista['id_fornecedor']) . "'>Editar</a>. <a href='deletar_Fornecedor.php?id_fornecedor=" . htmlspecialchars($lista['id_fornecedor']) . "'>Deletar</a></li>";
    }
    echo "</ul>";
} else {
    echo "Erro ao buscar dados ou resposta inválida.";
}