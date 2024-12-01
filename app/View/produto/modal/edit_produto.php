<div class="modal fade" id="edit_produto" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Produto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form class="row g-3" method="POST" action="View/produto/modal/edit_produtoCodigo.php">
        
            <h6 class="fw-bold">Dados do Produto</h6>
            <div class="col-md-12">
              <input type="hidden" class="form-control" id="edit_IdProduto" name="edit_IdProduto" required>
              <label for="edit_nomeProduto" class="form-label">Nome</label>
              <input type="text" class="form-control" id="edit_nomeProduto" name="edit_nomeProduto" required>
            </div>
            <div class="col-md-12">
              <label for="edit_descricao" class="form-label">Descrição</label>
              <textarea id="edit_descricao" name="edit_descricao" class="form-control" style="height: 100px;" required></textarea>
            </div>
            <div class="col-md-6">
              <label for="edit_valor_unitProduto" class="form-label">Valor Unitário</label>
              <div class="input-group">
                <span class="input-group-text">R$</span>
                <input type="number" step="0.01" class="form-control" id="edit_valor_unitProduto" name="edit_valor_unitProduto" min="0.1" required>
              </div>
            </div>
            <div class="col-md-6">
              <label for="edit_quantidadeProduto" class="form-label">Quantidade</label>
              <input type="number" class="form-control" id="edit_quantidadeProduto" name="edit_quantidadeProduto" min="1" required>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-info">Editar Produto</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  var edit_produto = document.getElementById('edit_produto');
  if (edit_produto) {
    edit_produto.addEventListener('show.bs.modal', function(event) {
      var button = event.relatedTarget;
      var produtoId = button.getAttribute('data-produto');
      fetch('View/produto/modal/get_produto.php?id=' + produtoId)
      
        .then(response => response.json())
        .then(data => {
          
          if (data.success && data.produto.length > 0) {
            const produto = data.produto[0];
            document.getElementById('edit_IdProduto').value = produto.id_produto || '';
            document.getElementById('edit_nomeProduto').value = produto.nome || '';
            document.getElementById('edit_valor_unitProduto').value = produto.valor_unit || '',
            document.getElementById('edit_quantidadeProduto').value = produto.qtd || '';
            document.getElementById('edit_descricao').value = produto.descricao || '';
          } else {
            alert('Cliente não encontrado.');
          }
        })
        .catch(error => {
          console.error('Erro ao buscar os dados do cliente:', error);
        });
    });
}
</script>

