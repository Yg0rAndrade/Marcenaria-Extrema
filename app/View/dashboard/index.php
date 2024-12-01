<?php    
 require_once '../../Model/DashboardModel.php';

 $page = "Dashboard";
 $caminho = "../reusable_components/page_title.php";  // Caminho do arquivo a ser incluído

 if (file_exists($caminho)) {
    include_once $caminho;
 }

 $listagem = new DashboardModel();
 $lista_clientes = $listagem->getUltimoCliente();
 $lista_fornecedor = $listagem->getUltimoFornecedor();
 $lista_vendas = $listagem->getUltimaVenda();
 $lista_compras = $listagem->getUltimaCompra();
?>
<div class="row">

   <!-- Left side columns -->
   <div class="col-lg-10">
      <div class="row">

         <!-- Ultimo Cliente cadastrado -->
         <div class="col-xxl-5 col-xxl-10">
            <div class="card info-card sales-card">
               <div class="card-body">
                  <h5 class="card-title">Ultimo Cliente Cadastrado</h5>

                  <div class="d-flex align-items-center">
                     <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="ri-user-add-fill"></i>
                     </div>
                     <div class="ps-3">
                        <h4>
                           <?php
                           if (!empty($lista_clientes) && isset($lista_clientes[0])) {
                              // Acessa o primeiro item do array
                              $ultimoCliente = $lista_clientes[0];

                              // Irá puxar o nome e o sobrenome
                              $nome = $ultimoCliente['nome'];
                              $sobrenome = $ultimoCliente['sobrenome'];
                              // Irá retornar o nome completo
                              echo "$nome $sobrenome";
                           } else {
                              echo "Nenhum cliente encontrado.";
                           }
                           ?>
                        </h4>
                        <span class="small pt-1 fw-bold">
                           <?php
                           if (!empty($lista_clientes) && isset($lista_clientes[0])) {
                              // Acessa o primeiro item do array
                              $ultimoCliente = $lista_clientes[0];

                              //Irá puxar o telefone
                              $telefone = $ultimoCliente['telefone'];
                              //Irá retornar o numero de telefone
                              echo "Contato: $telefone";
                           } else {
                              echo "Nenhum dado encontrado.";
                           }
                           ?>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!-- Ultimo Fornecedor cadastrado -->
         <div class="col-xxl-5 col-xxl-10">
            <div class="card info-card sales-card">
               <div class="card-body">
                  <h5 class="card-title">Ultimo Fornecedor Cadastrado</h5>

                  <div class="d-flex align-items-center">
                     <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="ri-user-add-fill"></i>
                     </div>
                     <div class="ps-3">
                        <h4>
                           <?php
                           if (!empty($lista_fornecedor) && isset($lista_fornecedor[0])) {
                              // Acessa o primeiro item do array
                              $ultimoFornecedor = $lista_fornecedor[0];

                              //Irá puxar o nome
                              $nome = $ultimoFornecedor['nome'];
                              //Irá retornar o nome
                              echo "$nome";
                           } else {
                              echo "Nenhum fornecedor encontrado.";
                           }
                           ?>
                        </h4>
                        <span class="small pt-1 fw-bold">
                           <?php
                           if (!empty($lista_fornecedor) && isset($lista_fornecedor[0])) {
                              // Acessa o primeiro item do array
                              $ultimoFornecedor = $lista_fornecedor[0];

                              //Irá puxar o telefone
                              $telefone = $ultimoFornecedor['telefone'];
                              //Irá retornar o numero de telefone
                              echo "Contato: $telefone";
                           } else {
                              echo "Nenhum dado encontrado.";
                           }
                           ?>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!-- Maior venda já feita -->
         <div class="col-xxl-5 col-xxl-10">
            <div class="card info-card sales-card">
               <div class="card-body">
                  <h5 class="card-title">Maior Venda Registrada</h5>

                  <div class="d-flex align-items-center">
                     <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="ri-takeaway-fill"></i>
                     </div>
                     <div class="ps-3">
                        <h4>
                           <?php
                           if (!empty($lista_vendas) && isset($lista_vendas[0])) {
                              // Acessa o primeiro item do array
                              $ultimaVenda = $lista_vendas[0];

                              //Irá acessar o ultimo item vendido
                              $ultimoitem = $ultimaVenda['descricao_produto'];

                              //Irá retornar o utlimo item vendido
                              echo "$ultimoitem";
                           } else {
                              echo "Nenhuma venda encontrada.";
                           }
                           ?>
                        </h4>
                        <span class="small pt-1 fw-bold">
                           <?php
                           if (!empty($lista_vendas) && isset($lista_vendas[0])) {
                              // Acessa o primeiro item do array
                              $ultimaVenda = $lista_vendas[0];

                              //Irá puxar o valor total desta venda
                              $total = $ultimaVenda['valor_total'];
                              //Irá retornar o valor total desta venda
                              echo "Total: R$$total";
                           } else {
                              echo "Nenhum dado encontrado.";
                           }
                           ?>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!-- Maior compra ja feita -->
         <div class="col-xxl-5 col-xxl-10">
            <div class="card info-card sales-card">
               <div class="card-body">
                  <h5 class="card-title">Maior Compra Registrada</h5>

                  <div class="d-flex align-items-center">
                     <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="ri-shopping-cart-fill"></i>
                     </div>
                     <div class="ps-3">
                        <h4>
                           <?php
                           if (!empty($lista_compras) && isset($lista_compras[0])) {
                              // Acessa o primeiro item do array
                              $ultimaCompra = $lista_compras[0];

                              //Irá acessar o ultimo item comprado
                              $ultimoitem = $ultimaCompra['nome_produto'];

                              //Irá retornar o utlimo item comprado
                              echo "$ultimoitem";
                           } else {
                              echo "Nenhuma compra encontrada.";
                           }
                           ?>
                        </h4>
                        <span class="small pt-1 fw-bold">
                           <?php
                           if (!empty($lista_compras) && isset($lista_compras[0])) {
                              // Acessa o primeiro item do array
                              $ultimaCompra = $lista_compras[0];

                              //Irá puxar o valor total desta compra
                              $total = $ultimaCompra['valor_total'];
                              //Irá retornar o valor total desta compra
                              echo "Total: R$$total";
                           } else {
                              echo "Nenhum dado encontrado.";
                           }
                           ?>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


</div>
</div><!-- End Recent Activity -->

</div><!-- End Right side columns -->
</div>
<script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>