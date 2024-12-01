
const botoes = document.querySelectorAll('.botao');
const paginas = document.querySelectorAll('.Pagina');

if (botoes.length === 0 || paginas.length === 0) {
    console.error('Certifique-se de que existem elementos com as classes .botao e .Pagina.');
} else {
    botoes.forEach((botao, indice) => {
        botao.addEventListener("click", () => {
            desselecionarBotao();
            desselecionarPagina();

            botao.classList.add("Selecionado");
            paginas[indice].classList.add('Selecionado');
        });
    });

    function desselecionarBotao() {
        const botaoSelecionado = document.querySelector('.botao.Selecionado');
        if (botaoSelecionado) {
            botaoSelecionado.classList.remove('Selecionado');
        }
    }

    function desselecionarPagina() {
        const paginaSelecionada = document.querySelector('.Pagina.Selecionado');
        if (paginaSelecionada) {
            paginaSelecionada.classList.remove('Selecionado');
        }
    }
}