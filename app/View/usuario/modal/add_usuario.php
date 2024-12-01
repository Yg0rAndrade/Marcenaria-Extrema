<div class="modal fade" id="add_usuario" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastro de Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form class="row g-3" method="POST" action="View/usuario/modal/add_usuarioCodigo.php">
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
              <label for="add_emailUsuario" class="form-label">E-mail</label>
              <input type="email" class="form-control" id="add_emailUsuario" name="email" required>
            </div>
            <div class="col-md-6">
              <label for="add_senhaUsuario" class="form-label">Senha</label>
              <input type="password" class="form-control" id="add_senhaUsuario" name="senha" required>
            </div>
            <div class="col-md-12">
              <label for="add_tipoUsuario" class="form-label">Tipo de Usuário</label>
              <select class="form-select" id="add_tipoUsuario" name="cargo" required>
                <option selected disabled>Selecione o Tipo</option>
                <option value="1">Administrador</option>
                <option value="2">Cliente</option>
              </select>
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
