<?php
echo "esta e pagina onde voce vai deletar o produto:" . $_GET["id"];
include_once "../../../Model/ProdutoModel.php";
session_start();
ob_start();
$produto = new ProdutoModel();
$produto_deletado = $produto->deleteProduto($_GET['id']);
$_SESSION['mensagem'] = "Produto deletado";
$_SESSION['mensagem_tipo'] = "danger"; // Sucesso para o tipo de alerta
// Redireciona para a página de índice com a mensagem
header("location: ../../../index.php?page=produto");
exit();
ob_end_flush();
