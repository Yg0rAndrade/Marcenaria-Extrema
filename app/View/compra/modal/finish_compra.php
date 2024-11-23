<div class="modal fade" id="finish_compra" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Concluir Compra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> Deseja marcar esta compra como concluída? </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <!-- Âncora envolvendo o botão -->
                <a id="finish_compra" class="btn btn-success" href="#">
                    Concluir Compra
                </a>
            </div>
        </div>
    </div>
</div>


<script>
    var deleteModal = document.getElementById('finish_compra');

if (deleteModal) {
    deleteModal.addEventListener('show.bs.modal', function (event) {
        // Captura o botão que abriu o modal
        var button = event.relatedTarget;

        // Obtém o ID do compra do atributo data-compra
        var compraId = button.getAttribute('data-compra');

        // Define o href da âncora com o ID do compra
        var confirmDelete = deleteModal.querySelector('#finish_compra');
        confirmDelete.href = 'modal/finish_compraCodigo.php?id=' + compraId;
    });
}

</script>