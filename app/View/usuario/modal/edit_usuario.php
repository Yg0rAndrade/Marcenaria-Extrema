<div class="modal fade" id="edit_usuario" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Dados do Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form class="row g-3" method="POST" action="View/usuario/modal/edit_usuarioCodigo.php">
            <h6 class="fw-bold">Dados do Usuário</h6>
            <input type="hidden" class="form-control" id="edit_usuario_id" name="edit_usuario_id" required>
            <div class="col-md-6">
              <label for="edit_nomeUsuario" class="form-label">Nome</label>
              <input type="text" class="form-control" id="edit_nomeUsuario" name="edit_nomeUsuario" required>
            </div>
            <div class="col-md-6">
              <label for="edit_sobrenomeUsuario" class="form-label">Sobrenome</label>
              <input type="text" class="form-control" id="edit_sobrenomeUsuario" name="edit_sobrenomeUsuario" required>
            </div>
            <div class="col-md-12">
              <label for="edit_cargoUsuario" class="form-label">Cargo</label>
              <select class="form-select" id="edit_cargoUsuario" name="edit_cargoUsuario" required>
                <option selected disabled>Selecione o Cargo</option>
                <option value="1">Administrador</option>
                <option value="2">Cliente</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Salvar Alterações</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  var edit_usuario = document.getElementById('edit_usuario');
  if (edit_usuario) {
    edit_usuario.addEventListener('show.bs.modal', function(event) {
      var button = event.relatedTarget;
      var user_id = button.getAttribute('data-usuario'); // ID do usuario passado pelo botão
      console.log(user_id);
      console.log(fetch('View/usuario/modal/get_usuario.php?id=' + user_id));
      fetch('View/usuario/modal/get_usuario.php?id=' + user_id)
        .then(response => response.json())
        .then(data => {
          if (data.success && data.User.length > 0) {
            const usuario = data.User[0]; 

            document.getElementById('edit_usuario_id').value = usuario.user_id || '';
            document.getElementById('edit_nomeUsuario').value = usuario.user_nome || '';
            document.getElementById('edit_sobrenomeUsuario').value = usuario.user_sobrenome || '';
            if (usuario.user_cargo == 'Administrador'){
              document.getElementById('edit_cargoUsuario').value = 1;
            }else{
              document.getElementById('edit_cargoUsuario').value = 2;
            }
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
