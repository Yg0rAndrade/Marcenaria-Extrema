<?php
echo "Edidanto Cliente...";
include_once "../../../Model/ClienteModel.php";
session_start();
ob_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // Verificar se todos os campos necessários estão presentes
   if (isset($_POST['nome'], $_POST['sobrenome'], $_POST['email'], $_POST['cpf_cnpj'], $_POST['endereco_id'])) {

      // Dados do cliente
      $id = trim($_POST['cliente_id']);
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

      // Instanciar o modelo de cliente
      $clienteModel = new ClienteModel();

      // Atualizar dados do cliente
      $resultado_cliente = $clienteModel->updateCliente($id, $nome, $sobrenome, $email, $cpfCnpj, $telefone, $data_nascimento_formatada);

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
    $resultado_endereco = $clienteModel->updateEndereco($endereco_id, $logradouro, $bairro, $cidade, $cep, $numero, $complemento, $estado);
      // Verificar se as atualizações ocorreram com sucesso
         $_SESSION['mensagem'] = "Cliente e endereço editados com sucesso!";
         $_SESSION['mensagem_tipo'] = "info"; // Sucesso para o tipo de alerta
      // Redireciona para a página de índice com a mensagem
      header("location: ../../../index.php?page=cliente");
      exit();

   }
}

ob_end_flush();
?>