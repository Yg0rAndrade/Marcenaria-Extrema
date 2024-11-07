
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Clientes</title>
</head>
<body>
    <h1>CRUD de Clientes</h1>

    <a href="miscellaneous/Clientes/listar_Clientes.php">Listar</a><br>
    <a href="miscellaneous/Clientes/cadastrar_Cliente.php">Cadastrar</a>
</body>
</html>

<?php

require_once 'Model/ClienteModel.php';

$cliente = new ClienteModel();

$clientes = $cliente->getAllClientes();
var_dump ($clientes);

?>
