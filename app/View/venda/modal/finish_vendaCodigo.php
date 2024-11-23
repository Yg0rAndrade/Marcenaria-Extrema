<?php
echo "esta e pagina onde voce vai deletar a venda:" . $_GET["id"];
include_once "../../../Model/VendaModel.php";
session_start();
ob_start();
$venda = new VendaModel();
$venda_deletado = $venda->finishVenda($_GET['id']);
$_SESSION['mensagem'] = "Venda concluida";
$_SESSION['mensagem_tipo'] = "success"; // Sucesso para o tipo de alerta
// Redireciona para a página de índice com a mensagem
header("Location: ../index.php");
exit();
ob_end_flush();
?>