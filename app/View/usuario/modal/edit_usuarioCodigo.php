<?php
include_once "../../../Model/UsuarioModel.php";
session_start();
ob_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // Verificar se todos os campos necessários estão presentes
   if (isset($_POST['nome'], $_POST['sobrenome'])) {

      // Dados do usuario
      $id = trim($_POST['usuario_id']);
      $nome = trim($_POST['nome']);
      $sobrenome = trim($_POST['sobrenome']);
      $senha = trim($_POST['senha']);

      // Instanciar o modelo de usuario
      $usuarioModel = new UsuarioModel();

      // Atualizar dados do usuario
      $resultado_usuario = $usuarioModel->updateUsuario($id, $nome,  $sobrenome, $senha);
      
      // Verificar se as atualizações ocorreram com sucesso
         $_SESSION['mensagem'] = "Fornecedor e endereço editados com sucesso!";
         $_SESSION['mensagem_tipo'] = "info"; // Sucesso para o tipo de alerta
      // Redireciona para a página de índice com a mensagem
      header("Location: ../index.php");
      exit();

   }
}

ob_end_flush();
?>