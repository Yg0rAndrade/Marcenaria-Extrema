<?php
    require_once "Model/ClienteModel.php";
    $cliente = new ClienteModel();
    $cliente = $cliente->getAllClientes();
    var_dump($cliente);