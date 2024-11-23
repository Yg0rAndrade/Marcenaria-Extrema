<?php
echo "esta e pagina onde voce vai deletar o usuario:" . $_GET["id"];
include_once "../../../Model/UsuarioModel.php";
session_start();
ob_start();
$usuario = new UsuarioModel();
$usuario_deletado = $usuario->deleteUsuario($_GET['id']);
$_SESSION['mensagem'] = "Usuário deletado";
$_SESSION['mensagem_tipo'] = "danger"; // Sucesso para o tipo de alerta
// Redireciona para a página de índice com a mensagem
header("Location: ../index.php");
exit();
ob_end_flush();
?>