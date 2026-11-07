const menuToggle = document.getElementById("menu-toggle");
const nav = document.getElementById("nav");

menuToggle.addEventListener("click", () => {

    nav.classList.toggle("active");

    const menuAberto = nav.classList.contains("active");

    menuToggle.setAttribute("aria-expanded", menuAberto);

    menuToggle.setAttribute(
        "aria-label",
        menuAberto ? "Fechar menu" : "Abrir menu"
    );

});

// Fechar menu ao clicar em um link

const linksMenu = document.querySelectorAll(".nav-link, .btn-inscricao-mobile");

linksMenu.forEach(link => {

    link.addEventListener("click", () => {

        nav.classList.remove("active");

        menuToggle.setAttribute("aria-expanded", "false");

        menuToggle.setAttribute("aria-label", "Abrir menu");

    });

});

// Destacar o link do menu conforme a seção visível

const secoes = document.querySelectorAll("section[id]");
const linksNav = document.querySelectorAll(".nav-link");

const observador = new IntersectionObserver((entradas) => {

    entradas.forEach(entrada => {

        if (entrada.isIntersecting) {

            linksNav.forEach(link => {
                link.classList.toggle(
                    "active",
                    link.getAttribute("href") === "#" + entrada.target.id
                );
            });

        }

    });

}, { threshold: 0.4 });

secoes.forEach(secao => observador.observe(secao));

// ==============================
// MODAL DE MODALIDADES
// (só roda na página que tem o modal)
// ==============================

if (document.getElementById("modal-overlay")) {

    const modalidades = {

        futebol: {
            nome: "Futebol",
            descricao: "Desenvolva suas habilidades, faça novas amizades e <strong>aprenda</strong> valores importantes através do futebol. Nossa escolinha oferece treinamento qualificado, com foco no desenvolvimento físico, técnico e social das crianças e jovens.",
            faixa: "6 a 17 anos",
            dias: "Segunda a Sexta",
            horarios: "Manhã e Tarde",
            nivel: "Iniciante ao Avançado"
        },

        basquete: {
            nome: "Basquete",
            descricao: "Desenvolva suas habilidades, faça novas amizades e <strong>aprenda</strong> valores importantes através do basquete. Nossa escolinha oferece treinamento qualificado, com foco no desenvolvimento físico, técnico e social das crianças e jovens.",
            faixa: "6 a 17 anos",
            dias: "Segunda a Sexta",
            horarios: "Manhã e Tarde",
            nivel: "Iniciante ao Avançado"
        },

        volei: {
            nome: "Vôlei",
            descricao: "Desenvolva suas habilidades, faça novas amizades e <strong>aprenda</strong> valores importantes através do vôlei. Nossa escolinha oferece treinamento qualificado, com foco no desenvolvimento físico, técnico e social das crianças e jovens.",
            faixa: "6 a 17 anos",
            dias: "Segunda a Sexta",
            horarios: "Manhã e Tarde",
            nivel: "Iniciante ao Avançado"
        },

        handebol: {
            nome: "Handebol",
            descricao: "Desenvolva suas habilidades, faça novas amizades e <strong>aprenda</strong> valores importantes através do handebol. Nossa escolinha oferece treinamento qualificado, com foco no desenvolvimento físico, técnico e social das crianças e jovens.",
            faixa: "6 a 17 anos",
            dias: "Segunda a Sexta",
            horarios: "Manhã e Tarde",
            nivel: "Iniciante ao Avançado"
        },

        natacao: {
            nome: "Natação",
            descricao: "Desenvolva suas habilidades, faça novas amizades e <strong>aprenda</strong> valores importantes através da natação. Nossa escolinha oferece treinamento qualificado, com foco no desenvolvimento físico, técnico e social das crianças e jovens.",
            faixa: "6 a 17 anos",
            dias: "Segunda a Sexta",
            horarios: "Manhã e Tarde",
            nivel: "Iniciante ao Avançado"
        },

        judo: {
            nome: "Judô",
            descricao: "Desenvolva suas habilidades, faça novas amizades e <strong>aprenda</strong> valores importantes através do judô. Nossa escolinha oferece treinamento qualificado, com foco no desenvolvimento físico, técnico e social das crianças e jovens.",
            faixa: "6 a 17 anos",
            dias: "Segunda a Sexta",
            horarios: "Manhã e Tarde",
            nivel: "Iniciante ao Avançado"
        }

    };

    const modalOverlay = document.getElementById("modal-overlay");
    const modalFechar = document.getElementById("modal-fechar");
    const cardsModalidade = document.querySelectorAll(".modalidade-card[data-modalidade]");

    let cardAtivo = null;

    function abrirModal(id, card) {

        const dados = modalidades[id];

        if (!dados) return;

        document.getElementById("modal-titulo").textContent = dados.nome;
        document.getElementById("modal-descricao").innerHTML = dados.descricao;
        document.getElementById("modal-faixa").textContent = dados.faixa;
        document.getElementById("modal-dias").textContent = dados.dias;
        document.getElementById("modal-horarios").textContent = dados.horarios;
        document.getElementById("modal-nivel").textContent = dados.nivel;

        cardAtivo = card;

        // Liga o botão "Realizar Inscrição" à página de inscrição
        document.getElementById("modal-btn-inscricao").href = "inscricao.php?modalidade=" + id;

        modalOverlay.classList.add("ativo");
        modalOverlay.setAttribute("aria-hidden", "false");
        document.body.classList.add("modal-aberto");

        modalFechar.focus();

    }

    function fecharModal() {

        modalOverlay.classList.remove("ativo");
        modalOverlay.setAttribute("aria-hidden", "true");
        document.body.classList.remove("modal-aberto");

        if (cardAtivo) {
            cardAtivo.focus();
        }

    }

    cardsModalidade.forEach(card => {

        card.addEventListener("click", () => {
            abrirModal(card.dataset.modalidade, card);
        });

    });

    modalFechar.addEventListener("click", fecharModal);

    // Fechar ao clicar fora do cartão

    modalOverlay.addEventListener("click", (evento) => {

        if (evento.target === modalOverlay) {
            fecharModal();
        }

    });

    // Fechar com a tecla ESC

    document.addEventListener("keydown", (evento) => {

        if (evento.key === "Escape" && modalOverlay.classList.contains("ativo")) {
            fecharModal();
        }

    });

}