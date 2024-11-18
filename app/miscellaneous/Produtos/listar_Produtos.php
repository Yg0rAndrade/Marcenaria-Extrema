<?php
require_once '../../Model/ProdutoModel.php';
$produto = new ProdutoModel();
$produtos = $produto->getAllProdutos();

// Exibe os dados em uma lista
if (is_array($produtos)) {
    echo "<ul>";
    foreach ($produtos as $lista) {
        echo "<li>Descrição: " . htmlspecialchars($lista['descricao']) . ", Valor em Unidades: " . htmlspecialchars($lista['valor_unit']) . " <a href='editar_produto.php?id_produto=" . htmlspecialchars($lista['id_produto']) . "'>Editar</a>. <a href='deletar_Produto.php?id_produto=" . htmlspecialchars($lista['id_produto']) . "'>Deletar</a></li>";
    }
    echo "</ul>";
} else {
    echo "Erro ao buscar dados ou resposta inválida.";
}