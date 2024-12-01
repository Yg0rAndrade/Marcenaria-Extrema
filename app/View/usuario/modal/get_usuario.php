<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include_once "../../../Model/UserModel.php";
    
    $userModel = new User();
    $user_resultado = $userModel->getOneUser($id);
    
    if ($user_resultado) {
        echo json_encode([
            'success' => true,
            'User' => $user_resultado
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Usuario não encontrado']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'UUID do Usuario não especificado']);
}
?>
