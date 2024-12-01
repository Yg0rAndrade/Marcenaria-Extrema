<?php
include_once "../../Model/CompraModel.php";    
$compra = new CompraModel();
$produtos = $compra->getAllProdutos();
$fornecedores = $compra->getAllFornecedores();
?>

<div class="modal fade" id="add_compra" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastro de Compra</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form class="row g-3" method="POST" action="View/compra/modal/add_compraCodigo.php">
            <h6 class="fw-bold">Dados da Compra</h6>

            <div class="col-md-6">
              <label for="fornecedor" class="form-label">Fornecedor</label>
              <select class="form-select" id="fornecedor" name="fornecedor" required>
                <option value="">Selecionar Fornecedor</option>
                <?php foreach ($fornecedores as $fornecedor): ?>
                  <option value="<?php echo htmlspecialchars($fornecedor['id_fornecedor']); ?>">
                    <?php echo htmlspecialchars($fornecedor['nome']); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="col-md-6">
              <label for="id_produto" class="form-label">Produto</label>
              <select class="form-select" id="id_produto" name="produto" required onchange="atualizarValorUnitario()">
                <option value="">Selecionar Produto</option>
                <?php foreach ($produtos as $produto): ?>
                  <option value="<?php echo htmlspecialchars($produto['id_produto']); ?>" 
                          data-valor="<?php echo htmlspecialchars($produto['valor_unit']); ?>">
                    <?php echo htmlspecialchars($produto['nome']); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="col-md-6">
              <label for="qtd" class="form-label">Quantidade</label>
              <input type="number" class="form-control" id="qtd" name="qtd" required oninput="calcularValorTotal()">
            </div>

            <div class="col-md-6">
              <label for="valor_unitProduto" class="form-label">Valor Unitário</label>
              <div class="input-group">
                <span class="input-group-text">R$</span>
                <input type="number" class="form-control" id="valor_unitProduto" name="valor_unitProduto" readonly required oninput="calcularValorTotal()">
              </div>
            </div>

            <div class="col-md-12">
              <label for="totalCompra" class="form-label">Valor Total</label>
              <div class="input-group">
                <span class="input-group-text">R$</span>
                <input type="text" class="form-control" id="totalCompra" name="totalCompra" readonly>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Cadastrar Compra</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function atualizarValorUnitario() {
    const select = document.getElementById('id_produto');
    const valorUnitarioInput = document.getElementById('valor_unitProduto');
    const selectedOption = select.options[select.selectedIndex];
    if (selectedOption.value) {
      const valorUnitario = selectedOption.getAttribute('data-valor');
      valorUnitarioInput.value = valorUnitario;
    } else {
      valorUnitarioInput.value = '';
    }
    calcularValorTotal();
  }

  function calcularValorTotal() {
    const quantidade = parseFloat(document.getElementById('qtd').value) || 0;
    const valorUnitario = parseFloat(document.getElementById('valor_unitProduto').value) || 0;
    const valorTotal = quantidade * valorUnitario;
    document.getElementById('totalCompra').value = valorTotal.toFixed(2);
  }
</script>
