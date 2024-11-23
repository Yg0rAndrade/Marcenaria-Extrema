<?php
include_once "../../../Model/CompraModel.php";
session_start();
ob_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   if (isset($_POST['fornecedor'], $_POST['produto'])) {
      $id_fornecedor = trim($_POST['fornecedor']);
      $id_produto = trim($_POST['produto']);
      $quantidade = trim($_POST['qtd']);
      $valor_unit = trim($_POST['valor_unitProduto']);
      $valor_total = trim($_POST['totalCompra']);

      $compraModel = new CompraModel();
      $resultado = $compraModel->insertCompra($id_fornecedor, $id_produto,$quantidade,$valor_unit,$valor_total);
      // Mensagem para a sessão
      $_SESSION['mensagem'] = "Compra registrada com sucesso!";
      $_SESSION['mensagem_tipo'] = "success"; // Sucesso para o tipo de alerta
      header("Location: ../index.php");
      exit();
   }
}
ob_end_flush();
?>