<?php
session_start();
include "../../../Model/sessaoModel.php";
include "../../../Model/UserModel.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $email = (isset($_POST['email']) ? $_POST['email'] : null);
   $password = (isset($_POST['senha']) ? $_POST['senha'] : null);
   $Sessao = new Sessao();
   $singup = $Sessao->singup($email, $password);
   if (isset($singup['access_token'])) {
      $User = new User();
      $newUser = $User->createUser($singup['user']['id'], $_POST['nome'], $_POST['sobrenome'],$_POST['cargo']);
   } else {
      if ($singup['error_code'] === 'weak_password') {
         $texto = "Senha inválida, mínimo de 6 caracteres";
      } elseif ($singup['error_code'] === 'user_already_exists') {
         $texto = "Usuário inválido ou já existente";
      }
      $_SESSION['mensagem'] =  $texto;
      $_SESSION['mensagem_tipo'] = "danger";
   }
   header("location: ../../../index.php?page=usuario");
   exit();
}
