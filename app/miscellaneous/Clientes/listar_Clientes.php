<?php
require_once '../../Model/ClienteModel.php';
$cliente = new ClienteModel();
$clientes = $cliente->getAllClientes();
//var_dump ($clientes);

// Exibe os dados em uma lista
if (is_array($clientes)) {
    echo "<ul>";
    foreach ($clientes as $lista) {
        echo "<li>Nome: " . htmlspecialchars($lista['nome']) . ", Telefone: " . htmlspecialchars($lista['telefone']) . " <a href='editar_cliente.php?id_cliente=" . htmlspecialchars($lista['id_cliente']) . "'>Editar</a>. <a href='deletar_cliente.php?id_cliente=" . htmlspecialchars($lista['id_cliente']) . "'>Deletar</a></li>";
    }
    echo "</ul>";
} else {
    echo "Erro ao buscar dados ou resposta inválida.";
}