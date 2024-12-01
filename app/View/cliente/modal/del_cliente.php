<div class="modal fade" id="del_cliente" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deletar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> Deseja realmente deletar este cliente? </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <!-- Âncora envolvendo o botão -->
                <a id="deletar_cliente" class="btn btn-danger" href="#">
                    Deletar Cliente
                </a>
            </div>
        </div>
    </div>
</div>


<script>
    var deleteModal = document.getElementById('del_cliente');

if (deleteModal) {
    deleteModal.addEventListener('show.bs.modal', function (event) {
        // Captura o botão que abriu o modal
        var button = event.relatedTarget;

        // Obtém o ID do cliente do atributo data-cliente
        var clienteId = button.getAttribute('data-cliente');

        // Define o href da âncora com o ID do cliente
        var confirmDelete = deleteModal.querySelector('#deletar_cliente');
        confirmDelete.href = 'View/cliente/modal/del_clienteCodigo.php?id=' + clienteId;
    });
}

</script>