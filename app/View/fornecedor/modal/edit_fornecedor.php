<div class="modal fade" id="edit_fornecedor" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastro de Fornecedor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form class="row g-3" method="POST" action="modal/edit_fornecedorCodigo.php">
            <h6 class="fw-bold">Dados do Fornecedor</h6>
            <input type="hidden" id="edit_fornecedor_id" name="fornecedor_id"> <!-- Campo Hidden para ID -->
            <input type="hidden" id="edit_endereco_id" name="endereco_id"> <!-- Campo Hidden para ID -->
            <div class="col-md-6">
              <label for="edit_nome" class="form-label">Nome</label>
              <input type="text" class="form-control" id="edit_nome" name="nome" required>
            </div>
            <div class="col-md-6">
              <label for="edit_email" class="form-label">Email</label>
              <input type="email" class="form-control" id="edit_email" name="email" required>
            </div>
            <div class="col-md-6">
              <label for="edit_cnpj" class="form-label">CNPJ</label>
              <input type="text" class="form-control" id="edit_cnpj" name="cnpj" required>
            </div>
            <div class="col-md-6">
              <label for="edit_telefone" class="form-label">Telefone</label>
              <input type="text" class="form-control" id="edit_telefone" name="telefone">
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
                <button type="submit" class="btn btn-primary">Editar Fornecedor</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // Máscara CPF/CNPJ
  document.getElementById('edit_cnpj').addEventListener('input', function(e) {
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

  // Preencher dados do fornecedor ao abrir o modal
  var edit_fornecedor = document.getElementById('edit_fornecedor');
  if (edit_fornecedor) {
    edit_fornecedor.addEventListener('show.bs.modal', function(event) {
      var button = event.relatedTarget;
      var fornecedorId = button.getAttribute('data-fornecedor'); // ID do fornecedor passado pelo botão

      // Buscar os dados do fornecedor
      fetch('modal/get_fornecedor.php?id=' + fornecedorId)
        .then(response => response.json())
        .then(data => {
          if (data.success && data.fornecedor.length > 0) {
            const fornecedor = data.fornecedor[0];

            // Preencher os campos do fornecedor
            document.getElementById('edit_fornecedor_id').value = fornecedor.id_fornecedor || '';
            document.getElementById('edit_endereco_id').value = fornecedor.id_endereco || '',
            document.getElementById('edit_nome').value = fornecedor.nome || '';
            document.getElementById('edit_email').value = fornecedor.email || '';
            document.getElementById('edit_cnpj').value = fornecedor.cnpj || '';
            document.getElementById('edit_telefone').value = fornecedor.telefone || '';

            // Verificar se há um ID de endereço
            if (fornecedor.id_endereco) {
              // Buscar o endereço do fornecedor
              fetch('modal/get_endereco.php?id=' + fornecedor.id_endereco)
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
            alert('Fornecedor não encontrado.');
          }
        })
        .catch(error => {
          console.error('Erro ao buscar os dados do fornecedor:', error);
        });
    });
  }
</script>
