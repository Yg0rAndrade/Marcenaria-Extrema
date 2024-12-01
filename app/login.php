<?php
session_start();
include "Model/sessaoModel.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $email = (isset($_POST['email']) ? $_POST['email'] : null);
  $password = (isset($_POST['password']) ? $_POST['password'] : null);
  $Sessao = new Sessao();
  $login = $Sessao->login($email,$password);
  if (isset($login['access_token'])){
    $_SESSION['uuid'] =  $login['user']['id'];
    $_SESSION['email'] = $login['user']['email'];
    header("location: index.php");
    exit();

  }else{
    if ($login['error_code'] === 'invalid_credentials'){
      $texto = "Email ou senha incorreto";
    }
    $_SESSION['mensagem'] =  $texto;
    $_SESSION['mensagem_tipo'] = "danger";
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login | Marcenaria Extrema</title>

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Marcenaria Extrema</span>
                </a>
              </div>

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Entrar</h5>
                    <p class="text-center small">Entre com seu E-mail e senha para fazer login</p>
                  </div>

                  <form method="POST" class="row g-3" >

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">E-mail</label>
                      <div class="input-group has-validation">
                        <input type="text" name="email" class="form-control" id="email" required>
                        <div class="invalid-feedback">Por favor entre com seu email.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Senha</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Por favor entre com sua senha!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Lembrar-me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Ainda não tem uma conta? <a href="register.php">Registre-se</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <p>Hiago H. Tavares , Mickael Mineo e Ygor Andrade</p>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

<script>
  
  // Usando JavaScript para adicionar a classe hide-toast após 2.5 segundos
  setTimeout(function() {
    var toastElement = document.querySelector('.toast');
    if (toastElement) {
      toastElement.classList.add('hide-toast');
      // Remover a classe 'show' após a animação para garantir que o toast desapareça completamente
      setTimeout(function() {
        toastElement.classList.remove('show');
      }, 2000); // Espera o tempo da animação (2 segundos) para remover a classe 'show'
    }
  }, 2500);  // 2500 ms = 2.5 segundos
</script>
<?php include "View/Alerts/alert.php";?>