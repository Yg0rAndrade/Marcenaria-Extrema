<?php
   if (isset($_SESSION['mensagem'])): ?>
      <div class="position-fixed top-0 end-0 p-3" style="z-index: 1055;">
          <div class="toast toast-fade align-items-center text-bg-<?= $_SESSION['mensagem_tipo'] ?> border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="d-flex">
                  <div class="toast-body">
                      <?= htmlspecialchars($_SESSION['mensagem'], ENT_QUOTES, 'UTF-8'); ?>
                  </div>
                  <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
          </div>
      </div>
  <?php
unset($_SESSION['mensagem'], $_SESSION['mensagem_tipo']);
endif;
?>
<style>
.toast-fade {
    opacity: 1;
    transition: opacity 2s ease-out;
}
.toast-fade.hide-toast {
    opacity: 0;
}
</style>