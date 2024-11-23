<?php
include_once "../../../Model/FornecedorModel.php";
session_start();
ob_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   if (isset($_POST['nome'], $_POST['email'], $_POST['cnpj'])) {
      $nome = trim($_POST['nome']);
      $email = trim($_POST['email']);
      $cnpj = trim($_POST['cnpj']);
      $telefone = trim($_POST['telefone']);
      $cep = trim($_POST['cep']);
      $logradouro = trim($_POST['logradouro']);
      $bairro = trim($_POST['bairro']);
      $cidade = trim($_POST['cidade']);
      $complemento = trim($_POST['complemento']);
      $numero = trim($_POST['numero']);
      $estado = $_POST['estado'];
      $fornecedorModel = new FornecedorModel();
      $resultado = $fornecedorModel->insertFornecedorComEndereco($nome, $telefone,   $cnpj, $email, $logradouro, $bairro, $cidade, $cep, $numero, $complemento, $estado);
      // Mensagem para a sessão
      $_SESSION['mensagem'] = "Fornecedor $nome cadastrado com sucesso!";
      $_SESSION['mensagem_tipo'] = "success"; // Sucesso para o tipo de alerta
      header("Location: ../index.php");
      exit();
   }
}
ob_end_flush();
?>