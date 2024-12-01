<?php
include_once "../../../Model/VendaModel.php";
session_start();
ob_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   if (isset($_POST['cliente'], $_POST['produto'])) {
      $id_cliente = trim($_POST['cliente']);
      $id_produto = trim($_POST['produto']);
      $quantidade = trim($_POST['qtd']);
      $valor_unit = trim($_POST['valor_unitProduto']);
      $valor_total = trim($_POST['totalVenda']);

      $vendaModel = new VendaModel();
      $resultado = $vendaModel->insertVenda($id_cliente, $id_produto,$quantidade,$valor_unit,$valor_total);
      // Mensagem para a sessão
      $_SESSION['mensagem'] = "Venda registrada com sucesso!";
      $_SESSION['mensagem_tipo'] = "success"; // Sucesso para o tipo de alerta
      header("location: ../../../index.php?page=venda");
      exit();
   }
}
ob_end_flush();
?>