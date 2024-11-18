<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <h1>CRUD de Clientes</h1>

    <a href="miscellaneous/Clientes/listar_Clientes.php">Listar</a><br>
    <a href="miscellaneous/Clientes/cadastrar_Cliente.php">Cadastrar</a>

    <h1>CRUD de Fornecedores</h1>

    <a href="miscellaneous/Fornecedores/listar_Fornecedores.php">Listar</a><br>
    <a href="miscellaneous/Fornecedores/cadastrar_Fornecedor.php">Cadastrar</a>
   
    <h1>CRUD de Produtos</h1>

    <a href="miscellaneous/Produtos/listar_Produtos.php">Listar</a><br>
    <a href="miscellaneous/Produtos/cadastrar_Produto.php">Cadastrar</a>       
</body>
</html>

<?php
require_once 'Model/ClienteModel.php';
$cliente = new ClienteModel(); 
$clientes = $cliente->getAllClientes();
#var_dump ($clientes);


#$cliente->deleteCliente( 2);