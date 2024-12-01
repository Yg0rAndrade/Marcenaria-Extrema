<?php
include_once "Model/UserModel.php";

$get_user = new User();
$current_user = $get_user->getoneUser($_SESSION['uuid']);


if (isset($current_user[0])) {
    $user = $current_user[0]; 
    $id = $user['user_id'];
    $nome = $user['user_nome'];
    $sobrenome = $user['user_sobrenome'];
    $_SESSION['cargo'] = $cargo = $user['user_cargo'];
} 
?>

<header id="header" class="header fixed-top d-flex align-items-center">
   <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
      <img src="assets/img/logo.svg" alt="">
      <span class="d-none d-lg-block">Marcenaria Extrema</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
   </div>
   <!-- End Logo -->
   <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
         <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"> <?php  echo $_SESSION['email'];?> </span>
            </a><!-- End Profile Iamge Icon -->
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
               <li class="dropdown-header">
                  <?php echo '<h6>'. $nome. ' '. $sobrenome . '</h6>' ; 
                        echo isset($cargo) ? '<span>' . $cargo . '</span>': '';
                  
                  
                  ?>
               </li>
               <li>
                  <hr class="dropdown-divider">
               </li>
               <li>
                  <hr class="dropdown-divider">
               </li>
               <li>
                  <a class="dropdown-item d-flex align-items-center" href="logout.php">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Deslogar</span>
                  </a>
               </li>
            </ul>
         </li>
      </ul>
   </nav>
</header>