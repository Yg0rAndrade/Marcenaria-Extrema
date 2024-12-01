<?php   
require_once '../../Model/VendaModel.php';       
$venda = new VendaModel();
$produtos = $venda->getAllProdutos();
$clientes = $venda->getAllClientes();
?>

<div class="modal fade" id="add_venda" tabindex="-1" aria-labelledby="addVendaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addVendaLabel">Cadastro de Venda</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3" method="POST" action="View/venda/modal/add_vendaCodigo.php">
          <h6 class="fw-bold mb-3">Cadastro de Venda</h6>
          
          <div class="col-md-6">
            <label for="cliente" class="form-label">Cliente</label>
            <select class="form-select" id="cliente" name="cliente" required>
              <option value="" selected disabled>Selecione um cliente</option>
              <?php foreach ($clientes as $cliente): ?>
                <option value="<?php echo htmlspecialchars($cliente['id_cliente']); ?>">
                  <?php echo htmlspecialchars($cliente['nome']); ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          
          <div class="col-md-6">
            <label for="id_produto" class="form-label">Produto</label>
            <select class="form-select" id="id_produto" name="produto" required onchange="atualizarValorUnitario()">
              <option value="" selected disabled>Selecione um produto</option>
              <?php foreach ($produtos as $produto): ?>
                <option value="<?php echo htmlspecialchars($produto['id_produto']); ?>" data-valor="<?php echo htmlspecialchars($produto['valor_unit']); ?>">
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
            <input type="number" class="form-control" id="valor_unitProduto" name="valor_unitProduto" readonly required>
          </div>
          
          <div class="col-md-6">
            <label for="totalVenda" class="form-label">Valor Total</label>
            <input type="text" class="form-control" id="totalVenda" name="totalVenda" readonly>
          </div>
          
          <div class="modal-footer mt-3">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Cadastrar Venda</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function atualizarValorUnitario() {
    const selectProduto = document.getElementById('id_produto');
    const valorUnitarioInput = document.getElementById('valor_unitProduto');
    const produtoSelecionado = selectProduto.options[selectProduto.selectedIndex];
    
    if (produtoSelecionado.value) {
      const valorUnitario = produtoSelecionado.getAttribute('data-valor');
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

    document.getElementById('totalVenda').value = valorTotal.toFixed(2);
  }
</script>
