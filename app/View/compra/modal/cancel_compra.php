<div class="modal fade" id="cancel_compra" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cancelar Compra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> Deseja realmente cancelar esta compra? </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <!-- Âncora envolvendo o botão -->
                <a id="confirmar_cancelamento" class="btn btn-danger" href="#">
                    Cancelar Compra
                </a>
            </div>
        </div>
    </div>
</div>


<script>
    var deleteModal = document.getElementById('cancel_compra');

    if (deleteModal) {
        deleteModal.addEventListener('show.bs.modal', function (event) {
            // Captura o botão que abriu o modal
            var button = event.relatedTarget;

            // Obtém o ID do venda do atributo data-venda
            var vendaId = button.getAttribute('data-compra');

            // Define o href da âncora com o ID do venda
            var confirmDelete = deleteModal.querySelector('#confirmar_cancelamento');
            confirmDelete.href = 'modal/cancel_compraCodigo.php?id=' + vendaId;
        });
    }

</script>