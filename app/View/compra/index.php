<?php
$title = "Compras";
if (session_status() === PHP_SESSION_NONE) {
   session_start();
}
include_once "../reusable_components/head.php";
include_once "../reusable_components/header.php";
include_once "../reusable_components/aside.php";
include_once "../Alerts/alert.php";
include_once "../../Model/CompraModel.php";
?>

<main id="main" class="main">

   <?php
   $page = "Compras";
   include_once "../reusable_components/page_title.php";
   ?>

   <div class="card">
      <div class="card-body">
         <div class="row d-flex align-items-center justify-content-between">
            <div class="col-lg-6">
               <h4 class="card-title">Lista de Compras</h4>
            </div>
            <div class="col-lg-6 text-end">
               <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_compra">
                  Registrar Compra
               </button>
            </div>
         </div>
         <table class="table table-hover datatable">
            <thead>
               <tr>
                  <th scope="col">Fornecedor</th>
                  <th scope="col">Produto</th>
                  <th scope="col">Quantidade Solicitada</th>
                  <th scope="col">Valor Total</th>
                  <th scope="col">Status</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $compra = new CompraModel();
               $lista_compras = $compra->getAllCompras();
               foreach ($lista_compras as $compraItem) {
                  echo "<tr>";
                  echo "<td>" . $compraItem["nome_fornecedor"] . "</td>";
                  echo "<td>" . $compraItem["nome_produto"] . "</td>";
                  echo "<td>" . $compraItem["qtd_compra"] . "</td>";
                  echo "<td> R$ " . $compraItem["valor_total"] . "</td>";
                  echo "<td>
                  <div class='d-flex justify-content-center gap-2'>
                      <a href='#" . "' class='btn btn-sm btn-info' data-bs-toggle='modal' data-bs-target='#finish_compra' data-compra='" . $compraItem['id_compra'] . "'>
                          <i class='ri-pencil-line'></i>
                      </a>              
                      <a href='#' class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#cancel_compra' data-compra='" . $compraItem['id_compra'] . "'>
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
   setTimeout(function () {
      var toastElement = document.querySelector('.toast');
      if (toastElement) {
         var toast = new bootstrap.Toast(toastElement);
         toast.hide();
      }
   }, 2500); // 2500 ms = 2.5 segundos
</script>


<?php
include_once "modal/add_compra.php";
include_once "modal/finish_compra.php";
include_once "modal/cancel_compra.php";
include_once "../reusable_components/footer.php";
?>