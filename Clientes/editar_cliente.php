<?php

    require_once 'database.php';
    require_once 'Cliente.php';

    #edit ('clientes');
    #find('produtos',$_GET['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>
<body>
<h1>WIP</h1>
        <form action="" method="post">
    <header>
        <div>
            <div>
                <h2>Editar Produto</h2>
            </div>
        </div>
    </header>
    <div">
        <div>
            <label for="">ID do Cliente</label>
            <input type="text">                
        </div>
        <div>
            <label for="">Nome</label>
            <input type="text">                
        </div>
        <div>
            <label for="">E-mail</label>
            <input type="email">
        </div>
        <div>
            <label for="">Telefone</label>
            <input type="number">
        </div>
        <div>
            <label for="">Endereço</label>
            <input type="text">
        </div>
    </div>
</body>
</html>