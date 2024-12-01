<?php
include_once "../../../Model/ProdutoModel.php";
session_start();
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $nome = trim($_POST['nome']);
      $descricao = trim($_POST['descricao']);
      $valor_unit = str_replace(',','.',trim($_POST['valor_unit']));
      $quantidade = trim($_POST['quantidade']);
      $produtoModel = new ProdutoModel();
      $resultado = $produtoModel->insertProduto($nome, $descricao, $valor_unit, $quantidade);

      $_SESSION['mensagem'] = "Produto cadastrado com sucesso!";
      $_SESSION['mensagem_tipo'] = "success"; // Sucesso para o tipo de alerta
      header("location: ../../../index.php?page=produto");
      exit();
}
ob_end_flush();
?>