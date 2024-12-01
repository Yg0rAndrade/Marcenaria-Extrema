<div class="modal fade" id="add_produto" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Criar Produto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form class="row g-3" method="POST" action="View/produto/modal/add_produtoCodigo.php">
            <h6 class="fw-bold">Dados do Produto</h6>
            <div class="col-md-12">
              <label for="add_nomeProduto" class="form-label">Nome</label>
              <input type="text" class="form-control" id="add_nomeProduto" name="nome" required>
            </div>
            <div class="col-md-12">
              <label for="descricao" class="form-label">Descrição</label>
              <textarea id="descricao" name="descricao" class="form-control" style="height: 100px;" required></textarea>
            </div>
            <div class="col-md-6">
              <label for="add_valor_unitProduto" class="form-label">Valor Unitário</label>
              <div class="input-group">
                <span class="input-group-text">R$</span>
                <input type="number" step="0.01" class="form-control" id="add_valor_unitProduto" name="valor_unit" min="0.1" required>
              </div>
            </div>
            <div class="col-md-6">
              <label for="add_quantidadeProduto" class="form-label">Quantidade</label>
              <input type="number" class="form-control" id="add_quantidadeProduto" name="quantidade" min="1" required>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Cadastrar Produto</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
