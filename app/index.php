<?php
session_start();

// Verificar se o usuário está logado
if (empty($_SESSION['email'])) {
   header('Location: login.php');
   exit();
}

// Incluir componentes reutilizáveis do cabeçalho
include_once "View/reusable_components/head.php";
include_once "View/reusable_components/header.php";
include_once "View/reusable_components/aside.php";
?>

<style>
   .loader {
      margin: auto;
      width: 100px;
      aspect-ratio: 1;
      border-radius: 50%;
      border: 8px solid;
      border-color: #000 #0000;
      animation: l1 1s infinite;
   }

   @keyframes l1 {
      to {
         transform: rotate(.5turn)
      }
   }
</style>

<main id="main" class="main">
   <section id="conteudo-principal">
     
   </section>
</main>

<div class="modal load" id="verticalycentered" tabindex="-1">
   <div class="modal-dialog modal-dialog-centered">
      <div class="loader"></div>
   </div>
</div>

<script>
function carregarSecao(pagina) {
    const loadmodal = document.querySelector('.load');
    loadmodal.classList.add("show");
    const ativarLoader = document.querySelector('.loader');
    ativarLoader.classList.add("ativado");
    const conteudoPrincipal = document.getElementById('conteudo-principal');
    fetch(pagina)
        .then(response => {
            if (!response.ok) throw new Error('Erro ao carregar a página.');
            return response.text();
        })
        .then(data => {
            conteudoPrincipal.innerHTML = data;
            desativarLoader();
            const scripts = conteudoPrincipal.querySelectorAll('script');
            scripts.forEach(script => {
                const newScript = document.createElement('script');
                newScript.textContent = script.textContent;
                document.body.appendChild(newScript);
                document.body.removeChild(newScript);
            });
            const tabela = conteudoPrincipal.querySelector('.datatable');
            if (tabela) {
                const dataTable = new simpleDatatables.DataTable(tabela);
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            conteudoPrincipal.innerHTML = '<p>Erro ao carregar o conteúdo.</p>';
        });
}

function desativarLoader() {
    const loaderAtivado = document.querySelector('.loader.ativado');
    loaderAtivado.classList.remove('ativado');
    const modalLoad = document.querySelector('.modal.load.show');
    modalLoad.classList.remove('show');
}

document.querySelectorAll('.menu-item').forEach(item => {
    item.addEventListener('click', function() {
        const pagina = this.dataset.page;
        document.title = 'Marcenaria Extrema | ' + this.dataset.title;
        updatePageParameter(this.dataset.path);
        carregarSecao(pagina);
    });
});

setTimeout(function() {
    var toastElement = document.querySelector('.toast');
    if (toastElement) {
        var toast = new bootstrap.Toast(toastElement);
        toast.hide();
    }
}, 2500);

function getUrlParameter(name) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
}

function atualizarTitulo(pageValue) {
    const menuItem = document.querySelector(`.menu-item[data-path="${pageValue}"]`);
    if (menuItem) {
        const title = menuItem.dataset.title;
        document.title = 'Marcenaria Extrema | ' + title;
    }
}

const page = getUrlParameter('page');

if (page) {  
    carregarSecao("View/" + page + "/index.php");
    atualizarTitulo(page);
} else {
    carregarSecao("View/dashboard/index.php");
    atualizarTitulo('dashboard');
}

function updatePageParameter(pageValue) {
    const url = new URL(window.location.href);
    url.searchParams.set('page', pageValue);
    window.history.pushState({}, '', url);
}

</script>

<?php
include "View/Alerts/alert.php";
include_once "View/reusable_components/footer.php";
?>