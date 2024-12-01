<?php
echo "esta e pagina onde voce vai deletar o cliente:" . $_GET["id"];
include_once "../../../Model/ClienteModel.php";
session_start();
ob_start();
$cliente = new ClienteModel();
$cliente_deletado = $cliente->deleteCliente($_GET['id']);
$_SESSION['mensagem'] = "Cliente deletado";
$_SESSION['mensagem_tipo'] = "danger"; // Sucesso para o tipo de alerta
// Redireciona para a página de índice com a mensagem
header("location: ../../../index.php?page=cliente");
exit();
ob_end_flush();
?>