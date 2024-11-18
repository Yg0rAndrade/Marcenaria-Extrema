<div class="modal fade" id="add_cliente" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastro de Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form class="row g-3" method="POST" action="modal/add_clienteCodigo.php">
            <h6 class="fw-bold">Dados do Cliente</h6>
            <div class="col-md-6">
              <label for="add_nomeCliente" class="form-label">Nome</label>
              <input type="text" class="form-control" id="add_nomeCliente" name="nome" required>
            </div>
            <div class="col-md-6">
              <label for="add_sobrenomeCliente" class="form-label">Sobrenome</label>
              <input type="text" class="form-control" id="add_sobrenomeCliente" name="sobrenome" required>
            </div>
            <div class="col-md-6">
              <label for="add_emailCliente" class="form-label">Email</label>
              <input type="email" class="form-control" id="add_emailCliente" name="email" required>
            </div>
            <div class="col-md-6">
              <label for="add_cpfCnpjCliente" class="form-label">CPF/CNPJ</label>
              <input type="text" class="form-control" id="add_cpfCnpjCliente" name="cpf_cnpj" required>
            </div>
            <div class="col-md-6">
              <label for="add_telefoneCliente" class="form-label">Telefone</label>
              <input type="text" class="form-control" id="add_telefoneCliente" name="telefone">
            </div>
            <div class="col-md-6">
              <label for="add_dataNascimentoCliente" class="form-label">Data de Nascimento</label>
              <input type="date" class="form-control" id="add_dataNascimentoCliente" name="data_nascimento">
            </div>
            <h6 class="fw-bold">Dados de Endereço</h6>
            <div class="col-2">
              <label for="add_cepCliente" class="form-label">CEP</label>
              <input type="text" class="form-control" id="add_cepCliente" name="cep">
            </div>
            <div class="col-10">
              <label for="add_logradouroCliente" class="form-label">Logradouro</label>
              <input type="text" class="form-control" id="add_logradouroCliente" name="logradouro" placeholder="Rua, Avenida...">
            </div>
            <div class="col-6">
              <label for="add_bairroCliente" class="form-label">Bairro</label>
              <input type="text" class="form-control" id="add_bairroCliente" name="bairro">
            </div>
            <div class="col-6">
              <label for="add_cidadeCliente" class="form-label">Cidade</label>
              <input type="text" class="form-control" id="add_cidadeCliente" name="cidade">
            </div>
            <div class="col-md-4">
              <label for="add_complementoCliente" class="form-label">Complemento</label>
              <input type="text" class="form-control" id="add_complementoCliente" name="complemento">
            </div>
            <div class="col-md-4">
              <label for="add_numeroCliente" class="form-label">Número</label>
              <input type="number" class="form-control" id="add_numeroCliente" name="numero">
            </div>
            <div class="col-md-4">
              <label for="add_estadoCliente" class="form-label">Estado</label>
              <select id="add_estadoCliente" class="form-select" name="estado">
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
              <button type="submit" class="btn btn-success">Cadastrar Cliente</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  // Formata CPF/CNPJ automaticamente
  document.getElementById('add_cpfCnpjCliente').addEventListener('input', function(e) {
    let cpf = e.target.value.replace(/\D/g, '');
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    e.target.value = cpf;
  });

  // Busca CEP e preenche endereço automaticamente
  document.getElementById('add_cepCliente').addEventListener('blur', async function() {
    let cep = this.value.replace(/\D/g, '');
    if (cep.length === 8) {
      try {
        let response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
        let data = await response.json();
        if (!data.erro) {
          document.getElementById('add_logradouroCliente').value = data.logradouro || '';
          document.getElementById('add_bairroCliente').value = data.bairro || '';
          document.getElementById('add_cidadeCliente').value = data.localidade || '';
          document.getElementById('add_estadoCliente').value = data.uf || '';
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

  // Usando JavaScript para adicionar a classe hide-toast após 2.5 segundos
  setTimeout(function() {
    var toastElement = document.querySelector('.toast');
    if (toastElement) {
      toastElement.classList.add('hide-toast');
      // Remover a classe 'show' após a animação para garantir que o toast desapareça completamente
      setTimeout(function() {
        toastElement.classList.remove('show');
      }, 2000); // Espera o tempo da animação (2 segundos) para remover a classe 'show'
    }
  }, 2500);  // 2500 ms = 2.5 segundos
</script>