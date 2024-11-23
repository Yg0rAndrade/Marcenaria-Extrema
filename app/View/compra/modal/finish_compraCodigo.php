<?php
echo "esta e pagina onde voce vai deletar a compra:" . $_GET["id"];
include_once "../../../Model/CompraModel.php";
session_start();
ob_start();
$compra = new CompraModel();
$compra_deletado = $compra->finishCompra($_GET['id']);
$_SESSION['mensagem'] = "Compra concluida";
$_SESSION['mensagem_tipo'] = "success"; // Sucesso para o tipo de alerta
// Redireciona para a página de índice com a mensagem
header("Location: ../index.php");
exit();
ob_end_flush();
?>