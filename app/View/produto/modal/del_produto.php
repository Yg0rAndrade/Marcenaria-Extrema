<div class="modal fade" id="del_produto" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deletar Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> Deseja realmente deletar este produto? </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <!-- Âncora envolvendo o botão -->
                <a id="deletar_produto" class="btn btn-danger" href="#">
                    Deletar Produto
                </a>
            </div>
        </div>
    </div>
</div>


<script>
    var deleteModal = document.getElementById('del_produto');

if (deleteModal) {
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var produtoId = button.getAttribute('data-produto');
        var confirmDelete = deleteModal.querySelector('#deletar_produto');
        confirmDelete.href ='View/produto/modal/del_produtoCodigo.php?id='  + produtoId;
    });
}
</script>