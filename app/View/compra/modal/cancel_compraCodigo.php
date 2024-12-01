<?php
echo "esta e pagina onde voce vai cancelar a compra:" . $_GET["id"];
include_once "../../../Model/CompraModel.php";
session_start();
ob_start();
$compra = new CompraModel();
$compra_deletado = $compra->cancelCompra($_GET['id']);
$_SESSION['mensagem'] = "Compra cancelada";
$_SESSION['mensagem_tipo'] = "danger"; // Sucesso para o tipo de alerta
// Redireciona para a página de índice com a mensagem
header("location: ../../../index.php?page=compra");
exit();
ob_end_flush();
?>