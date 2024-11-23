<?php
$title = "Vendas";
if (session_status() === PHP_SESSION_NONE) {
   session_start();
}
include_once "../reusable_components/head.php";
include_once "../reusable_components/header.php";
include_once "../reusable_components/aside.php";
include_once "../Alerts/alert.php";
include_once "../../Model/VendaModel.php";
?>

<main id="main" class="main">

   <?php
   $page = "Vendas";
   include_once "../reusable_components/page_title.php";
   ?>

   <div class="card">
      <div class="card-body">
         <div class="row d-flex align-items-center justify-content-between">
            <div class="col-lg-6">
               <h4 class="card-title">Lista de Vendas</h4>
            </div>
            <div class="col-lg-6 text-end">
               <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_venda">
                  Registrar Venda
               </button>
            </div>
         </div>
         <table class="table table-hover datatable">
            <thead>
               <tr>
                  <th scope="col">Cliente</th>
                  <th scope="col">Produto</th>
                  <th scope="col">Quantidade Solicitada</th>
                  <th scope="col">Valor Total</th>
                  <th scope="col">Status</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $venda = new VendaModel();
               $lista_vendas = $venda->getAllVendas();
               foreach ($lista_vendas as $vendaItem) {
                  echo "<tr>";
                  echo "<td>" . $vendaItem["nome_cliente"] . "</td>";
                  echo "<td>" . $vendaItem["descricao_produto"] . "</td>";
                  echo "<td>" . $vendaItem["quantidade_vendida"] . "</td>";
                  echo "<td>  R$ " . $vendaItem["valor_total"] . "</td>";
                  echo "<td>
                  <div class='d-flex justify-content-center gap-2'>
                      <a href='#" . "' class='btn btn-sm btn-info' data-bs-toggle='modal' data-bs-target='#finish_venda' data-venda='" . $vendaItem['id_venda'] . "'>
                          <i class='ri-pencil-line'></i>
                      </a>
                      <a href='#' class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#cancel_venda' data-venda='" . $vendaItem['id_venda'] . "'>
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
include_once "modal/add_venda.php";
include_once "modal/finish_venda.php";
include_once "modal/cancel_venda.php";
include_once "../reusable_components/footer.php";
?>