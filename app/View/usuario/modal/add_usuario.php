<div class="modal fade" id="add_usuario" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastro de Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form class="row g-3" method="POST" action="modal/add_usuarioCodigo.php">
            <h6 class="fw-bold">Dados do Usuário</h6>
            <div class="col-md-6">
              <label for="add_nomeUsuario" class="form-label">Nome</label>
              <input type="text" class="form-control" id="add_nomeUsuario" name="nome" required>
            </div>
            <div class="col-md-6">
              <label for="add_sobrenomeUsuario" class="form-label">Sobrenome</label>
              <input type="text" class="form-control" id="add_sobrenomeUsuario" name="sobrenome" required>
            </div>
            <div class="col-md-6">
              <label for="add_senhaUsuario" class="form-label">Senha</label>
              <input type="text" class="form-control" id="add_senhaUsuario" name="senha" required>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Tipo de Usuário</label>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" id="add_tipoUsuario" name="tipo">
                  <option selected>Tipo</option>
                  <option value="1">ADM</option>
                  <option value="2">Normal</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Cadastrar Usuário</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // Usando JavaScript para adicionar a classe hide-toast após 2.5 segundos
  setTimeout(function () {
    var toastElement = document.querySelector('.toast');
    if (toastElement) {
      toastElement.classList.add('hide-toast');
      // Remover a classe 'show' após a animação para garantir que o toast desapareça completamente
      setTimeout(function () {
        toastElement.classList.remove('show');
      }, 2000); // Espera o tempo da animação (2 segundos) para remover a classe 'show'
    }
  }, 2500);  // 2500 ms = 2.5 segundos
</script>