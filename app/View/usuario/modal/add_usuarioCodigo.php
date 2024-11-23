<?php
include_once "../../../Model/UsuarioModel.php";
session_start();
ob_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   if (isset($_POST['nome'], $_POST['sobrenome'],$_POST['senha'])) {
      $nome = trim($_POST['nome']);
      $sobrenome = trim($_POST['sobrenome']);
      #$senha = trim($_POST['senha']);
      $tipo = trim($_POST['tipo']); 
      $usuarioModel = new UsuarioModel();
      $resultado = $usuarioModel->insertUsuarioComTipo($nome, $sobrenome,$tipo);
      // Mensagem para a sessão
      $_SESSION['mensagem'] = "Usuario $nome cadastrado com sucesso!";
      $_SESSION['mensagem_tipo'] = "success"; // Sucesso para o tipo de alerta
      var_dump($resultado);
      var_dump($tipo);
      header("Location: ../index.php");
      exit();
   }
}
ob_end_flush();
?>