<?php
include_once "../../../Model/ProdutoModel.php";
session_start();
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $nome = $_POST['edit_nomeProduto'];
      $id = $_POST['edit_IdProduto'];
      $descricao = trim($_POST['edit_descricao']);
      $valor_unit = str_replace(',', '.', trim($_POST['edit_valor_unitProduto']));
      $quantidade = trim($_POST['edit_quantidadeProduto']);
      $produtoModel = new ProdutoModel();
      $resultado = $produtoModel->updateProduto($id, $nome, $descricao, $valor_unit, $quantidade);
      var_dump($_POST);
      $_SESSION['mensagem'] = "Produto editado com sucesso!";
      $_SESSION['mensagem_tipo'] = "info"; // Sucesso para o tipo de alert
      var_dump($resultado);

      header("location: ../../../index.php?page=produto");
      exit();
}
ob_end_flush();
