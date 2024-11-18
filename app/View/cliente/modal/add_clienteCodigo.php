<?php
include_once "../../../Model/ClienteModel.php";
session_start();
ob_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   if (isset($_POST['nome'], $_POST['sobrenome'], $_POST['email'], $_POST['cpf_cnpj'])) {
      $nome = trim($_POST['nome']);
      $sobrenome = trim($_POST['sobrenome']);
      $email = trim($_POST['email']);
      $cpfCnpj = trim($_POST['cpf_cnpj']);
      $telefone = trim($_POST['telefone']);
      $data_nascimento_formatada = null;
      if (!empty($_POST['data_nascimento'])) {
         $data_nascimento = $_POST['data_nascimento'];
         $data_nascimento_formatada = date('Y-m-d', strtotime($data_nascimento));
      }
      $cep = trim($_POST['cep']);
      $logradouro = trim($_POST['logradouro']);
      $bairro = trim($_POST['bairro']);
      $cidade = trim($_POST['cidade']);
      $complemento = trim($_POST['complemento']);
      $numero = trim($_POST['numero']);
      $estado = $_POST['estado'];
      $clienteModel = new ClienteModel();
      $resultado = $clienteModel->insertClienteComEndereco($nome, $telefone, $data_nascimento_formatada, $sobrenome, $cpfCnpj, $email, $logradouro, $bairro, $cidade, $cep, $numero, $complemento, $estado);
      // Mensagem para a sessão
      $_SESSION['mensagem'] = "Cliente $nome $sobrenome cadastrado com sucesso!";
      $_SESSION['mensagem_tipo'] = "success"; // Sucesso para o tipo de alerta
      header("Location: ../index.php");
      exit();
   }
}
ob_end_flush();
?>