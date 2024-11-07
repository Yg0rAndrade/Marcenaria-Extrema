<?php
require_once 'Model/ClienteModel.php';
$cliente = new ClienteModel(); 
$clientes = $cliente->getAllClientes();
var_dump ($clientes);
