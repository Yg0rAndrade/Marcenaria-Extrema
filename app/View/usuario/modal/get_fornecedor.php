<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include_once "../../../Model/UsuarioModel.php";
    
    $usuarioModel = new UsuarioModel();
    $dados_usuario = $usuarioModel->getoneUsuario($id);
    
    if ($dados_usuario) {
        echo json_encode([
            'success' => true,
            'usuario' => $dados_usuario
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Usuário não encontrado']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID do usuário não especificado']);
}
?>
