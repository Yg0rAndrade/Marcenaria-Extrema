<?php
include_once "../../../Model/UserModel.php";
session_start();
ob_start();
$usuario = new User();
$usuario_deletado = $usuario->deleteUsuario($_GET['id']);
$_SESSION['mensagem'] = "Usuário deletado";
$_SESSION['mensagem_tipo'] = "danger"; // Sucesso para o tipo de alerta
// Redireciona para a página de índice com a mensagem
header("location: ../../../index.php?page=usuario");
exit();
ob_end_flush();
