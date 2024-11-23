<?php
echo "esta e pagina onde voce vai deletar o fornecedor:" . $_GET["id"];
include_once "../../../Model/FornecedorModel.php";
session_start();
ob_start();
$fornecedor = new FornecedorModel();
$fornecedor_deletado = $fornecedor->deleteFornecedor($_GET['id']);
$_SESSION['mensagem'] = "Fornecedor deletado";
$_SESSION['mensagem_tipo'] = "danger"; // Sucesso para o tipo de alerta
// Redireciona para a página de índice com a mensagem
header("Location: ../index.php");
exit();
ob_end_flush();
?>