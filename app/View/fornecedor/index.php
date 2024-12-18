<?php
include_once "../../Model/FornecedorModel.php";
$page = "Fornecedor";
include_once "../reusable_components/page_title.php";
?>
<div class="card">
   <div class="card-body">
      <div class="row d-flex align-items-center justify-content-between">
         <div class="col-lg-6">
            <h4 class="card-title">Lista de Fornecedores</h4>
         </div>
         <div class="col-lg-6 text-end">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_fornecedor">
               Cadastrar Fornecedor
            </button>
         </div>
      </div>
      <table class="table table-hover datatable">
         <thead>
            <tr>
               <th scope="col">Nome</th>
               <th scope="col">Telefone</th>
               <th scope="col">Email</th>
               <th scope="col">CNPJ</th>
               <th scope="col">Ações</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $fornecedor = new FornecedorModel();
            $lista_fornecedors = $fornecedor->getAllFornecedores();
            foreach ($lista_fornecedors as $fornecedor) {
               echo "<tr>";
               echo "<td>" . $fornecedor["nome"] . "</td>";
               echo "<td>" . $fornecedor["telefone"] . "</td>";
               echo "<td>" . $fornecedor["email"] . "</td>";
               echo "<td>" . $fornecedor["cnpj"] . "</td>";
               echo "<td>
                  <div class='d-flex justify-content-center gap-2'>
                      <a href='#"  . "' class='btn btn-sm btn-info' data-bs-toggle='modal' data-bs-target='#edit_fornecedor' data-fornecedor='" . $fornecedor['id_fornecedor'] . "'>
                          <i class='ri-pencil-line'></i>
                      </a>
                      <a href='#' class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#del_fornecedor' data-fornecedor='" . $fornecedor['id_fornecedor'] . "'>
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
include_once "modal/add_fornecedor.php";
include_once "modal/edit_fornecedor.php";
include_once "modal/del_fornecedor.php";
?>