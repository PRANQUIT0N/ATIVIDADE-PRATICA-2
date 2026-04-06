document.addEventListener("DOMContentLoaded", function () {
  // Tooltips
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  tooltipTriggerList.forEach(el => new bootstrap.Tooltip(el));

  // Modo escuro
  const btnModo = document.getElementById("btnModo");
  btnModo.addEventListener("click", function () {
    document.body.classList.toggle("dark");
    if (document.body.classList.contains("dark")) {
      btnModo.classList.replace("bi-moon-stars-fill", "bi-sun-fill");
      btnModo.setAttribute("data-bs-title", "Modo Claro");
    } else {
      btnModo.classList.replace("bi-sun-fill", "bi-moon-stars-fill");
      btnModo.setAttribute("data-bs-title", "Modo Escuro");
    }
    bootstrap.Tooltip.getInstance(btnModo)?.dispose();
    new bootstrap.Tooltip(btnModo);
  });

  // Cliques gerais
  document.addEventListener("click", function (e) {
    // Curtir
    if (e.target.closest(".curtir")) {
      const botao = e.target.closest(".curtir");
      const icone = botao.querySelector("i");
      const contador = botao.querySelector(".contador");
      let numero = parseInt(contador.textContent);
      if (icone.classList.contains("bi-hand-thumbs-up")) {
        icone.classList.replace("bi-hand-thumbs-up", "bi-hand-thumbs-up-fill");
        botao.classList.replace("btn-outline-primary", "btn-primary");
        contador.textContent = numero + 1;
      } else {
        icone.classList.replace("bi-hand-thumbs-up-fill", "bi-hand-thumbs-up");
        botao.classList.replace("btn-primary", "btn-outline-primary");
        contador.textContent = numero - 1;
      }
    }

    // Mostrar comentario
    if (e.target.closest(".comentar")) {
      const post = e.target.closest(".post");
      const area = post.querySelector(".comentarios");
      area.classList.toggle("d-none");
    }

    // Enviar comentario
    if (e.target.closest(".enviar")) {
      const post = e.target.closest(".post");
      const input = post.querySelector(".comentarioInput");
      const lista = post.querySelector(".comentarios");

      if (input.value.trim() === "") return;

      const novo = document.createElement("div");
      novo.classList.add("comentario");
      novo.innerHTML = `<small><strong>Eduardo:</strong> ${input.value}</small>`;
      lista.appendChild(novo);
      input.value = "";
    }
  });
});