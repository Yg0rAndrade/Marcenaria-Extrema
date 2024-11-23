#Visivel somente para administradores. Esta página gerencia os usuários
<?php
$title = "Usuario";
if (session_status() === PHP_SESSION_NONE) {
   session_start();
}
include_once "../reusable_components/head.php";
include_once "../reusable_components/header.php";
include_once "../reusable_components/aside.php";
include_once "../Alerts/alert.php";
include_once "../../Model/UsuarioModel.php";
 ?>

<main id="main" class="main">
   <?php
   $page = "Usuarioes";
   include_once "../reusable_components/page_title.php";
   ?>

   <div class="card">
      <div class="card-body">
         <div class="row d-flex align-items-center justify-content-between">
            <div class="col-lg-6">
               <h4 class="card-title">Lista de Usuarios</h4>
            </div>
            <div class="col-lg-6 text-end">
               <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_usuario">
                  Cadastrar Usuario
               </button>
            </div>
         </div>
         <table class="table table-hover datatable">
            <thead>
               <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">Sobrenome</th>
                  <th scope="col">Permissões</th>
                  <th scope="col">Ações</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $usuario = new UsuarioModel();
               $lista_usuarios = $usuario->getAllUsuarios();
               foreach ($lista_usuarios as $usuario) {
                  echo "<tr>";
                  echo "<td>" . $usuario["nome"]. "</td>";
                  echo "<td>" . $usuario["sobrenome"] . "</td>";
                  echo "<td>" . $usuario["id_tipo_usuario"] . "</td>";
                  echo "<td>
                  <div class='d-flex justify-content-center gap-2'>
                      <a href='#"  . "' class='btn btn-sm btn-info' data-bs-toggle='modal' data-bs-target='#edit_usuario' data-usuario='" . $usuario['id'] . "'>
                          <i class='ri-pencil-line'></i>
                      </a>
                      <a href='#' class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#del_usuario' data-usuario='" . $usuario['id'] . "'>
                          <i class='ri-delete-bin-2-line'></i>
                      </a>
                  </div>
              </td>";
                  echo "</tr>";
               }
               ?>
            </tbody>
         </table>
      </div>
   </div>

</main>
<script>
   // Usando JavaScript para remover o toast após 2.5 segundos
   setTimeout(function() {
      var toastElement = document.querySelector('.toast');
      if (toastElement) {
         var toast = new bootstrap.Toast(toastElement);
         toast.hide();
      }
   }, 2500); // 2500 ms = 2.5 segundos
</script>


<?php
include_once "modal/edit_usuario.php";
include_once "modal/add_usuario.php";
include_once "modal/del_usuario.php";
include_once "../reusable_components/footer.php";
?>