<?php

//Arquivo necessário para que  o programa funcione.        
require_once '../../Model/CompraModel.php';

//Cria a classe para adicionar        
$compra = new CompraModel();

//Puxa o nome dos clientes e produtos
$produtos = $compra->getAllProdutos();
$fornecedores = $compra->getAllFornecedores();
?>

<div class="modal fade" id="add_compra" tabindex="-1">
  <div class="modal-dialog modal-l">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastro de Compra</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form class="row g-3" method="POST" action="modal/add_compraCodigo.php">
            <h6 class="fw-bold">Cadastro de Compra</h6>
            <div class="col-md-6">
              <label for="add_nomeFornecedor" class="form-label">Fornecedor</label>
              <select class="form-select" aria-label="Default select example" id="fornecedor" name="fornecedor" required>
                <option value="">Fornecedor</option>
                <?php foreach ($fornecedores as $fornecedor): //Irá puxar os fornecedores da tabela ?>
                  <option value="<?php echo htmlspecialchars($fornecedor['id_fornecedor']); ?>">
                    <?php echo htmlspecialchars($fornecedor['nome']); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6">
              <label for="add_nomeProduto" class="form-label">Produto</label>
              <select class="form-select" aria-label="Default select example" id="id_produto" name="produto" required onchange="atualizarValorUnitario()">
                <option value="">Produto</option>
                <?php foreach ($produtos as $produto): //Irá puxar os produtos da tabela ?>
                  <option value="<?php echo htmlspecialchars($produto['id_produto']); ?>"
                    data-valor="<?php echo htmlspecialchars($produto['valor_unit']); //Váriavel utilizada para jogar o valor no campo do valor unitario ?>">
                    <?php echo htmlspecialchars($produto['descricao']); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6">
              <label for="add_qtdCompra" class="form-label">Quantidade</label>
              <input type="number" id="qtd" name="qtd" required oninput="calcularValorTotal()">
            </div>
            <div class="col-md-6">
              <label for="add_valor_unitProduto" class="form-label">Valor Unitário</label>
              <input type="number" id="valor_unitProduto" name="valor_unitProduto" required readonly oninput="calcularValorTotal()">
            </div>
            <div class="col-md-6">
              <label for="add_totalCompra" class="form-label">Valor Total</label>
              <input type="text" id="totalCompra" name="totalCompra" readonly><br><br>
            </div>            
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Cadastrar Fornecedor</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  // Usando JavaScript para adicionar a classe hide-toast após 2.5 segundos
  setTimeout(function () {
    var toastElement = document.querySelector('.toast');
    if (toastElement) {
      toastElement.classList.add('hide-toast');
      // Remover a classe 'show' após a animação para garantir que o toast desapareça completamente
      setTimeout(function () {
        toastElement.classList.remove('show');
      }, 2000); // Espera o tempo da animação (2 segundos) para remover a classe 'show'
    }
  }, 2500);  // 2500 ms = 2.5 segundos

  function atualizarValorUnitario() {
    const select = document.getElementById('id_produto');
    const valorUnitarioInput = document.getElementById('valor_unitProduto');
    const selectedOption = select.options[select.selectedIndex];

    if (selectedOption.value) {
      // Obtém o valor unitário do atributo data
      const valorUnitario = selectedOption.getAttribute('data-valor');
      valorUnitarioInput.value = valorUnitario; // Atualiza o valor no campo de valor unitário
    } else {
      valorUnitarioInput.value = ''; // Limpa o valor caso nenhum produto seja selecionado
    }

    calcularValorTotal(); // Atualiza o valor total com o novo valor unitário
  }

  function calcularValorTotal() {
    const quantidade = parseFloat(document.getElementById('qtd').value) || 0;
    const valorUnitario = parseFloat(document.getElementById('valor_unitProduto').value) || 0;

    const valorTotal = quantidade * valorUnitario;
    document.getElementById('totalCompra').value = valorTotal.toFixed(2);
  }  
</script>