<?php
    require_once 'database.php';
    require_once 'Cliente.php';

    if(isset($_POST['cadastrar'])){
        $cadastro = new Cliente($pdo);
        $cadastro->cadastrarCliente($_POST['nome'],$_POST['email'],$_POST['telefone'],$_POST['endereco']);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
</head>
<body>
    <h1>Cadastrar Cliente</h1>
    <form action="" method="push">
        <label for="">Nome</label>
        <input type="text" name="nome">
        <label for="">E-mail</label>
        <input type="email" name="email">
        <label for="">Telefone</label>
        <input type="number" name="telefone">
        <label for="">Endereço</label>
        <input type="text" name="endereco">                
        <button type="submit" name="cadastrar">Cadastrar Cliente</button>
    </form>
</body>
</html>