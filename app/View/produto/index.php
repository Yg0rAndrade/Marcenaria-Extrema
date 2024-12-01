<?php
      include_once "../../Model/ProdutoModel.php";
      $page = "Produto";
      include_once "../reusable_components/page_title.php";
?>

   <div class="card">
      <div class="card-body">
         <div class="row d-flex align-items-center justify-content-between">
            <div class="col-lg-6">
               <h4 class="card-title">Lista de Produtos</h4>
            </div>
            <div class="col-lg-6 text-end">
               <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_produto">
                  Cadastrar Produto
               </button>
            </div>
         </div>
         <table class="table table-hover datatable">
            <thead>
               <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">Valor unitario</th>
                  <th scope="col">Quantidade</th>
                  <th scope="col">Ações</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $prod = new ProdutoModel();
               $produtos = $prod->getAllProdutos();
               foreach ($produtos as $produto) {
                  echo "<tr>";
                  echo "<td>" . $produto["nome"] . " </td>";
                  echo "<td>"."R$ " . $produto["valor_unit"] . "</td>";
                  echo "<td>" . $produto["qtd"] . "</td>";
                  echo "<td>
                  <div class='d-flex justify-content-center gap-2'>
                      <a href='#"  . "' class='btn btn-sm btn-info' data-bs-toggle='modal' data-bs-target='#edit_produto' data-produto='" . $produto['id_produto'] . "'>
                          <i class='ri-pencil-line'></i>
                      </a>
                      <a href='#' class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#del_produto' data-produto='" . $produto['id_produto'] . "'>
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

   <?php
      include_once "modal/add_produto.php";
      include_once "modal/edit_produto.php";
      include_once "modal/del_produto.php";
?>
