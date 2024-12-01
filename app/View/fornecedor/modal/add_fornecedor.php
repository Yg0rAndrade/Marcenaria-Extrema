<div class="modal fade" id="add_fornecedor" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastro de Fornecedor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form class="row g-3" method="POST" action="View/fornecedor/modal/add_fornecedorCodigo.php">
            <h6 class="fw-bold">Dados do Fornecedor</h6>
            <div class="col-md-6">
              <label for="add_nomeFornecedor" class="form-label">Nome</label>
              <input type="text" class="form-control" id="add_nomeFornecedor" name="nome" required>
            </div>
            <div class="col-md-6">
              <label for="add_emailFornecedor" class="form-label">Email</label>
              <input type="email" class="form-control" id="add_emailFornecedor" name="email" required>
            </div>
            <div class="col-md-6">
              <label for="add_cnpjFornecedor" class="form-label">CNPJ</label>
              <input type="text" class="form-control" id="add_cnpjFornecedor" name="cnpj" required>
            </div>
            <div class="col-md-6">
              <label for="add_telefoneFornecedor" class="form-label">Telefone</label>
              <input type="text" class="form-control" id="add_telefoneFornecedor" name="telefone">
            </div>
            <h6 class="fw-bold">Dados de Endereço</h6>
            <div class="col-2">
              <label for="add_cepFornecedor" class="form-label">CEP</label>
              <input type="text" class="form-control" id="add_cepFornecedor" name="cep">
            </div>
            <div class="col-10">
              <label for="add_logradouroFornecedor" class="form-label">Logradouro</label>
              <input type="text" class="form-control" id="add_logradouroFornecedor" name="logradouro" placeholder="Rua, Avenida...">
            </div>
            <div class="col-6">
              <label for="add_bairroFornecedor" class="form-label">Bairro</label>
              <input type="text" class="form-control" id="add_bairroFornecedor" name="bairro">
            </div>
            <div class="col-6">
              <label for="add_cidadeFornecedor" class="form-label">Cidade</label>
              <input type="text" class="form-control" id="add_cidadeFornecedor" name="cidade">
            </div>
            <div class="col-md-4">
              <label for="add_complementoFornecedor" class="form-label">Complemento</label>
              <input type="text" class="form-control" id="add_complementoFornecedor" name="complemento">
            </div>
            <div class="col-md-4">
              <label for="add_numeroFornecedor" class="form-label">Número</label>
              <input type="number" class="form-control" id="add_numeroFornecedor" name="numero">
            </div>
            <div class="col-md-4">
              <label for="add_estadoFornecedor" class="form-label">Estado</label>
              <select id="add_estadoFornecedor" class="form-select" name="estado">
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
              </select>
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
  // Formata CPF/CNPJ automaticamente
  document.getElementById('add_cnpjFornecedor').addEventListener('input', function(e) {
    let cpf = e.target.value.replace(/\D/g, '');
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    e.target.value = cpf;
  });

  // Busca CEP e preenche endereço automaticamente
  document.getElementById('add_cepFornecedor').addEventListener('blur', async function() {
    let cep = this.value.replace(/\D/g, '');
    if (cep.length === 8) {
      try {
        let response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
        let data = await response.json();
        if (!data.erro) {
          document.getElementById('add_logradouroFornecedor').value = data.logradouro || '';
          document.getElementById('add_bairroFornecedor').value = data.bairro || '';
          document.getElementById('add_cidadeFornecedor').value = data.localidade || '';
          document.getElementById('add_estadoFornecedor').value = data.uf || '';
        } else {
          alert('CEP não encontrado.');
        }
      } catch (error) {
        console.error('Erro ao buscar o CEP:', error);
      }
    } else {
      alert('Por favor, insira um CEP válido.');
    }
  });
</script>