<div class="modal fade" id="del_usuario" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deletar Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> Deseja realmente deletar este usuário? </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <!-- Âncora envolvendo o botão -->
                <a id="deletar_usuario" class="btn btn-danger" href="#">
                    Deletar Usuário
                </a>
            </div>
        </div>
    </div>
</div>


<script>
    var deleteModal = document.getElementById('del_usuario');

if (deleteModal) {
    deleteModal.addEventListener('show.bs.modal', function (event) {
        // Captura o botão que abriu o modal
        var button = event.relatedTarget;

        // Obtém o ID do usuario do atributo data-usuario
        var usuarioId = button.getAttribute('data-usuario');

        // Define o href da âncora com o ID do usuario
        var confirmDelete = deleteModal.querySelector('#deletar_usuario');
        confirmDelete.href = 'View/usuario/modal/del_usuarioCodigo.php?id=' + usuarioId;
    });
}

</script>