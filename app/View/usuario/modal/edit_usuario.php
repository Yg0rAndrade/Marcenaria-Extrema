<div class="modal fade" id="edit_usuario" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastro de Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form class="row g-3" method="POST" action="modal/edit_usuarioCodigo.php">
            <h6 class="fw-bold">Dados do Usuário</h6>
            <input type="hidden" id="edit_usuario_id" name="usuario_id"> <!-- ID do tipo de usuario -->
            <input type="hidden" id="edit_tipo_user_id" name="edit_tipo_user_id"> <!-- ID do usuario -->
            <div class="col-md-6">
              <label for="edit_nome" class="form-label">Nome</label>
              <input type="text" class="form-control" id="edit_nome" name="nome" required>
            </div>
            <div class="col-md-6">
              <label for="edit_sobrenome" class="form-label">Sobrenome</label>
              <input type="text" class="form-control" id="edit_sobrenome" name="sobrenome" required>
            </div>
            <div class="col-md-6">
              <label for="add_senhaUsuario" class="form-label">Nova Senha</label>
              <input type="text" class="form-control" id="edit_senhaUsuario" name="senha" required>
            </div>             
           <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>    
                <button type="submit" class="btn btn-primary">Editar Usuario</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // Preencher dados do usuario ao abrir o modal
  var edit_usuario = document.getElementById('edit_usuario');
  if (edit_usuario) {
    edit_usuario.addEventListener('show.bs.modal', function(event) {
      var button = event.relatedTarget;
      var usuarioId = button.getAttribute('data-usuario'); // ID do usuario passado pelo botão

      // Buscar os dados do usuario
      fetch('modal/get_usuario.php?id=' + usuarioId)
        .then(response => response.json())
        .then(data => {
          if (data.success && data.usuario.length > 0) {
            const usuario = data.usuario[0];

            // Preencher os campos do usuario
            document.getElementById('edit_usuario_id').value = usuario.id_usuario || '';
            //document.getElementById('edit_endereco_id').value = usuario.id_endereco || '',
            document.getElementById('edit_nome').value = usuario.nome || '';
            document.getElementById('edit_sobrenome').value = usuario.sobrenome || '';
            //document.getElementById('edit_cnpj').value = usuario.cnpj || '';
          } else {
            alert('Usuario não encontrado.');
          }
        })
        .catch(error => {
          console.error('Erro ao buscar os dados do usuário:', error);
        });
    });
  }
</script>
