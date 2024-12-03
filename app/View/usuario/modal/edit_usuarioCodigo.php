<?php
echo "Editando Usuario..";
include_once "../../../Model/UserModel.php";
session_start();
ob_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // Verificar se todos os campos necessários estão presentes
   if (isset($_POST['edit_usuario_id'])) {

      // Dados do usuario
      $uuid = trim($_POST['edit_usuario_id']);
      $nome = trim($_POST['edit_nomeUsuario']);
      $sobrenome = trim($_POST['edit_sobrenomeUsuario']);
      $cargo = trim($_POST['edit_cargoUsuario']);

      // Instanciar o modelo de usuario
      $usuarioModel = new User();

      // Atualizar dados do usuario
      $resultado_usuario = $usuarioModel->updateUsuario($uuid, $nome,  $sobrenome, $cargo);
      // Verificar se as atualizações ocorreram com sucesso
         $_SESSION['mensagem'] = "Usuário editado com sucesso!";
         $_SESSION['mensagem_tipo'] = "info"; // Sucesso para o tipo de alerta
      // Redireciona para a página de índice com a mensagem
      header("location: ../../../index.php?page=usuario");
      exit();
   }
}

ob_end_flush();
?>