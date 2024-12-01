<?php
include_once "../../../Model/FornecedorModel.php";
session_start();
ob_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   if (isset($_POST['nome'], $_POST['email'], $_POST['cnpj'], $_POST['endereco_id'])) {
      $id = trim($_POST['fornecedor_id']);
      $nome = trim($_POST['nome']);
      $email = trim($_POST['email']);
      $cnpj = trim($_POST['cnpj']);
      $telefone = trim($_POST['telefone']);
      $fornecedorModel = new FornecedorModel();
      $resultado_fornecedor = $fornecedorModel->updateFornecedor($id, $nome,  $email, $cnpj, $telefone);
      $endereco_id = trim($_POST['endereco_id']);
      $logradouro = trim($_POST['logradouro']);
      $bairro = trim($_POST['bairro']);
      $cidade = trim($_POST['cidade']);
      $cep = trim($_POST['cep']);
      $numero = trim($_POST['numero']);
      $complemento = trim($_POST['complemento']);
      $estado = trim($_POST['estado']);
    $resultado_endereco = $fornecedorModel->updateEndereco($endereco_id, $logradouro, $bairro, $cidade, $cep, $numero, $complemento, $estado);
         $_SESSION['mensagem'] = "Fornecedor e endereço editados com sucesso!";
         $_SESSION['mensagem_tipo'] = "info";
      header("location: ../../../index.php?page=fornecedor");
      exit();

   }
}

ob_end_flush();
?>