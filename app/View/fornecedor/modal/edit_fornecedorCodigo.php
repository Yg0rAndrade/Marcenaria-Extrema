<?php
include_once "../../../Model/FornecedorModel.php";
session_start();
ob_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // Verificar se todos os campos necessários estão presentes
   if (isset($_POST['nome'], $_POST['email'], $_POST['cnpj'], $_POST['endereco_id'])) {

      // Dados do fornecedor
      $id = trim($_POST['fornecedor_id']);
      $nome = trim($_POST['nome']);
      $email = trim($_POST['email']);
      $cnpj = trim($_POST['cnpj']);
      $telefone = trim($_POST['telefone']);

      // Instanciar o modelo de fornecedor
      $fornecedorModel = new FornecedorModel();

      // Atualizar dados do fornecedor
      $resultado_fornecedor = $fornecedorModel->updateFornecedor($id, $nome,  $email, $cnpj, $telefone);

      // Dados do endereço
      $endereco_id = trim($_POST['endereco_id']);
      $logradouro = trim($_POST['logradouro']);
      $bairro = trim($_POST['bairro']);
      $cidade = trim($_POST['cidade']);
      $cep = trim($_POST['cep']);
      $numero = trim($_POST['numero']);
      $complemento = trim($_POST['complemento']);
      $estado = trim($_POST['estado']);

      // Atualizar dados do endereço
    $resultado_endereco = $fornecedorModel->updateEndereco($endereco_id, $logradouro, $bairro, $cidade, $cep, $numero, $complemento, $estado);
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