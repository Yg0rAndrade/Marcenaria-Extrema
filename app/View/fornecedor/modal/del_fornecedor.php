<div class="modal fade" id="del_fornecedor" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deletar Fornecedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> Deseja realmente deletar este fornecedor? </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <!-- Âncora envolvendo o botão -->
                <a id="deletar_fornecedor" class="btn btn-danger" href="#">
                    Deletar Fornecedor
                </a>
            </div>
        </div>
    </div>
</div>


<script>
    var deleteModal = document.getElementById('del_fornecedor');

if (deleteModal) {
    deleteModal.addEventListener('show.bs.modal', function (event) {
        // Captura o botão que abriu o modal
        var button = event.relatedTarget;

        // Obtém o ID do fornecedor do atributo data-fornecedor
        var fornecedorId = button.getAttribute('data-fornecedor');

        // Define o href da âncora com o ID do fornecedor
        var confirmDelete = deleteModal.querySelector('#deletar_fornecedor');
        confirmDelete.href = 'View/fornecedor/modal/del_fornecedorCodigo.php?id='  + fornecedorId;
    });
}

</script>