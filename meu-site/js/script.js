document.addEventListener('DOMContentLoaded', () => {
    const formPost = document.getElementById('formPost');
    const areaPosts = document.getElementById('areaPosts');

    formPost.addEventListener('submit', (e) => {
        e.preventDefault();
        const campo = formPost.querySelector('input');
        const valor = campo.value.trim();

        if (valor === "") {
            alert("Digite algo para postar!");
            return;
        }

        // Usa os dados que vieram do PHP (USUARIO_LOGADO)
        const template = `
            <div class="post card p-3 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <img src="${USUARIO_LOGADO.foto}" class="fotopost me-2">
                    <div>
                        <label class="nome">${USUARIO_LOGADO.nome}</label>
                        <br>
                        <small class="text-muted">${USUARIO_LOGADO.usuario}</small>
                    </div>
                </div>
                <label class="conteudo-post">${valor}</label>
                <div class="mt-2">
                    <button class="btn btn-sm btn-outline-primary curtir">
                        <i class="bi bi-hand-thumbs-up"></i> <span>Curtir</span> <span class="contador">0</span>
                    </button>
                </div>
            </div>`;

        areaPosts.insertAdjacentHTML('afterbegin', template);
        campo.value = "";
    });

    areaPosts.addEventListener('click', (e) => {
        const btn = e.target.closest('.curtir');
        if (btn) {
            const span = btn.querySelector('.contador');
            span.innerText = parseInt(span.innerText) + 1;
        }
    });
});