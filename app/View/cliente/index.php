<?php
      include_once "../../Model/ClienteModel.php";
      $page = "Cliente";
      include_once "../reusable_components/page_title.php";
 ?>
      <div class="card">
         <div class="card-body">
            <div class="row d-flex align-items-center justify-content-between">
               <div class="col-lg-6">
                  <h4 class="card-title">Lista de Clientes</h4>
               </div>
               <div class="col-lg-6 text-end">
               
                 <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_cliente">
                 Cadastrar Cliente
              </button>
               
                  
               </div>
            </div>
            <table class="table table-hover datatable">
               <thead>
                  <tr>
                     <th scope="col">Nome</th>
                     <th scope="col">Telefone</th>
                     <th scope="col">Email</th>
                     <th scope="col">CPF</th>
                     <th scope="col">Ações</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $cliente = new ClienteModel();
                  $lista_clientes = $cliente->getAllClientes();
                  foreach ($lista_clientes as $cliente) {
                     echo "<tr>";
                     echo "<td>" . $cliente["nome"] . " " . $cliente["sobrenome"] . "</td>";
                     echo "<td>" . $cliente["telefone"] . "</td>";
                     echo "<td>" . $cliente["email"] . "</td>";
                     echo "<td>" . $cliente["cpf"] . "</td>";
                     echo "<td>
                     <div class='d-flex justify-content-center gap-2'>
                         <a href='#"  . "' class='btn btn-sm btn-info' data-bs-toggle='modal' data-bs-target='#edit_cliente' data-cliente='" . $cliente['id_cliente'] . "'>
                             <i class='ri-pencil-line'></i>
                         </a>
                         <a href='#' class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#del_cliente' data-cliente='" . $cliente['id_cliente'] . "'>
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
      <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
<?php
      include_once "modal/add_cliente.php";
      include_once "modal/edit_cliente.php";
      include_once "modal/del_cliente.php";
?>
