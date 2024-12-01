<div class="modal fade" id="edit_cliente" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form class="row g-3" method="POST" action="View/cliente/modal/edit_clienteCodigo.php">
            <h6 class="fw-bold">Dados do Cliente</h6>
            <input type="hidden" id="edit_cliente_id" name="cliente_id"> <!-- Campo Hidden para ID -->
            <input type="hidden" id="edit_endereco_id" name="endereco_id"> <!-- Campo Hidden para ID -->
            <div class="col-md-6">
              <label for="edit_nome" class="form-label">Nome</label>
              <input type="text" class="form-control" id="edit_nome" name="nome" required>
            </div>
            <div class="col-md-6">
              <label for="edit_sobrenome" class="form-label">Sobrenome</label>
              <input type="text" class="form-control" id="edit_sobrenome" name="sobrenome" required>
            </div>
            <div class="col-md-6">
              <label for="edit_email" class="form-label">Email</label>
              <input type="email" class="form-control" id="edit_email" name="email" required>
            </div>
            <div class="col-md-6">
              <label for="edit_cpf_cnpj" class="form-label">CPF/CNPJ</label>
              <input type="text" class="form-control" id="edit_cpf_cnpj" name="cpf_cnpj" required>
            </div>
            <div class="col-md-6">
              <label for="edit_telefone" class="form-label">Telefone</label>
              <input type="text" class="form-control" id="edit_telefone" name="telefone">
            </div>
            <div class="col-md-6">
              <label for="edit_data_nascimento" class="form-label">Data de Nascimento</label>
              <input type="date" class="form-control" id="edit_data_nascimento" name="data_nascimento">
            </div>
            <h6 class="fw-bold">Dados de Endereço</h6>
            <div class="col-2">
              <label for="edit_cep" class="form-label">CEP</label>
              <input type="text" class="form-control" id="edit_cep" name="cep">
            </div>
            <div class="col-10">
              <label for="edit_logradouro" class="form-label">Logradouro</label>
              <input type="text" class="form-control" id="edit_logradouro" name="logradouro" placeholder="Rua, Avenida...">
            </div>
            <div class="col-6">
              <label for="edit_bairro" class="form-label">Bairro</label>
              <input type="text" class="form-control" id="edit_bairro" name="bairro">
            </div>
            <div class="col-6">
              <label for="edit_cidade" class="form-label">Cidade</label>
              <input type="text" class="form-control" id="edit_cidade" name="cidade">
            </div>
            <div class="col-md-4">
              <label for="edit_complemento" class="form-label">Complemento</label>
              <input type="text" class="form-control" id="edit_complemento" name="complemento">
            </div>
            <div class="col-md-4">
              <label for="edit_numero" class="form-label">Número</label>
              <input type="number" class="form-control" id="edit_numero" name="numero">
            </div>
            <div class="col-md-4">
              <label for="edit_estado" class="form-label">Estado</label>
              <select id="edit_estado" class="form-select" name="estado">
                <!-- Aqui estão as opções de estados -->
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
                <button type="submit" class="btn btn-info">Editar Cliente</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  

</div>
<script>
  console.log("Hello, World!")
  // Máscara CPF/CNPJ
  document.getElementById('edit_cpf_cnpj').addEventListener('input', function(e) {
    let cpf = e.target.value.replace(/\D/g, ''); // Remove qualquer caracter não numérico
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2') // Adiciona o ponto após o primeiro bloco de 3 dígitos
             .replace(/(\d{3})(\d)/, '$1.$2') // Adiciona o ponto após o segundo bloco de 3 dígitos
             .replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Adiciona o traço
    e.target.value = cpf;
  });

  // Buscar dados do CEP
  document.getElementById('edit_cep').addEventListener('blur', async function() {
    let cep = this.value.replace(/\D/g, ''); // Remove qualquer caracter não numérico
    if (cep.length === 8) {
      try {
        let response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
        let data = await response.json();
        if (!data.erro) {
          document.getElementById('edit_logradouro').value = data.logradouro || '';
          document.getElementById('edit_bairro').value = data.bairro || '';
          document.getElementById('edit_cidade').value = data.localidade || '';
          document.getElementById('edit_estado').value = data.uf || '';
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

  // Preencher dados do cliente ao abrir o modal
  var edit_cliente = document.getElementById('edit_cliente');
  if (edit_cliente) {
    
    edit_cliente.addEventListener('show.bs.modal', function(event) {
      var button = event.relatedTarget;
      var clienteId = button.getAttribute('data-cliente'); // ID do cliente passado pelo botão

      // Buscar os dados do cliente
      fetch('View/cliente/modal/get_cliente.php?id=' + clienteId)
        .then(response => response.json())
        .then(data => {
          if (data.success && data.cliente.length > 0) {
            const cliente = data.cliente[0];

            // Preencher os campos do cliente
            document.getElementById('edit_cliente_id').value = cliente.id_cliente || '';
            document.getElementById('edit_endereco_id').value = cliente.id_endereco || '',
            document.getElementById('edit_nome').value = cliente.nome || '';
            document.getElementById('edit_sobrenome').value = cliente.sobrenome || '';
            document.getElementById('edit_email').value = cliente.email || '';
            document.getElementById('edit_cpf_cnpj').value = cliente.cpf_cnpj || '';
            document.getElementById('edit_telefone').value = cliente.telefone || '';
            document.getElementById('edit_data_nascimento').value = cliente.data_nascimento || '';

            // Verificar se há um ID de endereço
            if (cliente.id_endereco) {
              // Buscar o endereço do cliente
              fetch('View/cliente/modal/get_endereco.php?id=' + cliente.id_endereco)
                .then(response => response.json())
                .then(enderecoData => {
                  if (enderecoData.success && enderecoData.endereco.length > 0) {
                    const endereco = enderecoData.endereco[0];

                    // Preencher os campos de endereço
                    document.getElementById('edit_logradouro').value = endereco.logradouro || '';
                    document.getElementById('edit_complemento').value = endereco.complemento || '';
                    document.getElementById('edit_numero').value = endereco.numero || '';
                    document.getElementById('edit_bairro').value = endereco.bairro || '';
                    document.getElementById('edit_cidade').value = endereco.cidade || '';
                    document.getElementById('edit_estado').value = endereco.estado || '';
                    document.getElementById('edit_cep').value = endereco.cep || '';
                  } else {
                    alert('Endereço não encontrado.');
                  }
                })
                .catch(error => {
                  console.error('Erro ao buscar o endereço:', error);
                });
            }
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