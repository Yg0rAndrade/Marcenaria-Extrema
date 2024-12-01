<aside id="sidebar" class="sidebar">
   <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item menu-item" data-page="View/dashboard/index.php" data-title="Dashboard" data-path="dashboard">
         <a class="nav-link collapsed " href="#">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
         </a>
      </li>
      <!-- End Dashboard Nav -->
      <li class="nav-item menu-item" data-page="View/cliente/index.php" data-title="Cliente" data-path="cliente">
         <a class="nav-link collapsed " data-bs-target="#cliente-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person-circle"></i></i><span>Cliente</span>
         </a>
      </li>
      <!-- End Tables Nav -->
      <li class="nav-item menu-item" data-page="View/fornecedor/index.php" data-title="Fornecedor" data-path="fornecedor">
         <a class="nav-link collapsed " data-bs-target="#fornecedor-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-truck"></i><span>Fornecedor</span>
         </a>
      </li>
      <!-- End Tables Nav -->
      <li class="nav-item menu-item" data-page="View/produto/index.php" data-title="Produto" data-path="produto">
         <a class="nav-link collapsed " data-bs-target="#produto-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-box-seam"></i></i><span>Produto</span>
         </a>
      </li>
      <!-- End Tables Nav -->
      <li class="nav-item menu-item" data-page="View/compra/index.php" data-title="Compra" data-path="compra">
         <a class="nav-link collapsed " data-bs-target="#compra-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-cart-plus"></i></i><span>Compra</span>
         </a>
      </li>
      <!-- End Tables Nav -->
      <li class="nav-item menu-item" data-page="View/venda/index.php" data-title="Venda" data-path="venda">
         <a class="nav-link collapsed " data-bs-target="#venda-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-cash-stack"></i><span>Venda</span>
         </a>
      </li>
      <?php
      if ($cargo == 'Administrador') {
         echo '<li class="nav-item menu-item" data-page="View/usuario/index.php" data-title="Usuário" data-path="usuario">
           <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
           <i class="bi bi-person-badge"></i><span>Usuário</span>
           </a>
        </li>';
      }


      ?>

      <!-- End Tables Nav -->
   </ul>
</aside>