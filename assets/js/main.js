
const menuToggle = document.getElementById("menu-toggle");
const nav = document.getElementById("nav");

if (menuToggle && nav) {
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
}

// Destacar o link do menu conforme a seção visível
const secoes = document.querySelectorAll("section[id]");
const linksNav = document.querySelectorAll(".nav-link");

if ("IntersectionObserver" in window) {
    const observador = new IntersectionObserver(entradas => {
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
}


// ==============================
// MODAL DE MODALIDADES
// ==============================

const modalOverlay = document.getElementById("modal-overlay");

if (modalOverlay) {

    const modalFechar = document.getElementById("modal-fechar");
    const listaModalidades = document.getElementById("lista-modalidades-publicas");

    const modalTitulo = document.getElementById("modal-titulo");
    const modalDescricao = document.getElementById("modal-descricao");
    const modalFaixa = document.getElementById("modal-faixa");
    const modalDias = document.getElementById("modal-dias");
    const modalHorarios = document.getElementById("modal-horarios");
    const modalNivel = document.getElementById("modal-nivel");
    const modalBtnInscricao = document.getElementById("modal-btn-inscricao");

    let cardAtivo = null;

    // Ícones correspondentes às modalidades
    const iconesModalidade = {
        futebol: "⚽",
        futsal: "⚽",
        basquete: "🏀",
        volei: "🏐",
        handebol: "🤾",
        natacao: "🏊",
        judo: "🥋",
        karate: "🥋",
        "jiu-jitsu": "🥋",
        atletismo: "🏃",
        ciclismo: "🚴",
        tenis: "🎾",
        "tenis-mesa": "🏓",
        ginastica: "🤸",
        danca: "💃",
        outros: "🏅"
    };

    // Abre o modal com os dados da modalidade selecionada
    function abrirModal(modalidade, card) {

        modalTitulo.textContent = modalidade.nome || "Modalidade";

        modalDescricao.textContent =
            modalidade.descricao || "Informações sobre esta modalidade.";

        modalFaixa.textContent = "6 a 17 anos";
        modalDias.textContent = "Não informado";
        modalHorarios.textContent = "Não informado";
        modalNivel.textContent = "Não informado";

        cardAtivo = card;

        // Envia o ID numérico para a página de inscrição
        modalBtnInscricao.href =
            "inscricao.php?modalidade=" + encodeURIComponent(modalidade.id);

        modalOverlay.classList.add("ativo");
        modalOverlay.setAttribute("aria-hidden", "false");
        document.body.classList.add("modal-aberto");

        modalFechar.focus();
    }

    // Fecha o modal
    function fecharModal() {

        modalOverlay.classList.remove("ativo");
        modalOverlay.setAttribute("aria-hidden", "true");
        document.body.classList.remove("modal-aberto");

        if (cardAtivo) {
            cardAtivo.focus();
        }
    }

    // Cria os cards usando os dados recebidos do banco
    function criarCardModalidade(modalidade) {

        const card = document.createElement("button");

        card.type = "button";
        card.className = "modalidade-card";
        card.dataset.modalidade = modalidade.id;

        const icone = document.createElement("span");
        icone.className = "modalidade-icon";
        icone.textContent =
            iconesModalidade[modalidade.icone] || iconesModalidade.outros;

        const titulo = document.createElement("h3");
        titulo.textContent = modalidade.nome;

        card.appendChild(icone);
        card.appendChild(titulo);

        card.addEventListener("click", () => {
            abrirModal(modalidade, card);
        });

        return card;
    }

    // Busca as modalidades cadastradas pelo administrador
    async function carregarModalidadesPublicas() {

        if (!listaModalidades) return;

        try {

            const resposta = await fetch("routes/api.php/modalidades");

            if (!resposta.ok) {
                throw new Error("Não foi possível buscar as modalidades.");
            }

            const modalidades = await resposta.json();

            listaModalidades.innerHTML = "";

            if (!Array.isArray(modalidades) || modalidades.length === 0) {

                const mensagem = document.createElement("p");
                mensagem.textContent = "Nenhuma modalidade disponível no momento.";

                listaModalidades.appendChild(mensagem);
                return;
            }

            modalidades.forEach(modalidade => {

                const card = criarCardModalidade(modalidade);

                listaModalidades.appendChild(card);

            });

        } catch (erro) {

            console.error("Erro ao carregar modalidades:", erro);

            listaModalidades.innerHTML = "";

            const mensagem = document.createElement("p");
            mensagem.textContent =
                "Não foi possível carregar as modalidades. Tente novamente.";

            listaModalidades.appendChild(mensagem);
        }
    }

    if (modalFechar) {
        modalFechar.addEventListener("click", fecharModal);
    }

    // Fechar ao clicar fora do cartão
    modalOverlay.addEventListener("click", evento => {

        if (evento.target === modalOverlay) {
            fecharModal();
        }

    });

    // Fechar com a tecla ESC
    document.addEventListener("keydown", evento => {

        if (
            evento.key === "Escape" &&
            modalOverlay.classList.contains("ativo")
        ) {
            fecharModal();
        }

    });

    carregarModalidadesPublicas();
}


// ==============================
// MODAL DE LOGIN (ADMINISTRADOR)
// ==============================

const loginOverlay = document.getElementById("login-overlay");

if (loginOverlay) {

    const loginFechar = document.getElementById("login-fechar");
    const loginUsuario = document.getElementById("login-usuario");
    const loginSenha = document.getElementById("login-senha");
    const loginOlho = document.getElementById("login-olho");
    const gatilhosLogin = document.querySelectorAll("[data-abrir-login]");
    const formLogin = document.getElementById("form-login");
    const loginErro = document.getElementById("login-erro");

    let gatilhoAtivo = null;

    function abrirLogin(gatilho) {

        gatilhoAtivo = gatilho;

        loginOverlay.classList.add("ativo");
        loginOverlay.setAttribute("aria-hidden", "false");
        document.body.classList.add("modal-aberto");

        loginUsuario.focus();
    }

    function fecharLogin() {

        loginOverlay.classList.remove("ativo");
        loginOverlay.setAttribute("aria-hidden", "true");
        document.body.classList.remove("modal-aberto");

        loginSenha.type = "password";
        loginOlho.classList.remove("ativo");
        loginOlho.setAttribute("aria-label", "Mostrar senha");

        if (gatilhoAtivo) {
            gatilhoAtivo.focus();
        }
    }

    gatilhosLogin.forEach(gatilho => {

        gatilho.addEventListener("click", evento => {
            evento.preventDefault();
            abrirLogin(gatilho);
        });

    });

    loginFechar.addEventListener("click", fecharLogin);

    // Fechar ao clicar fora da janela
    loginOverlay.addEventListener("click", evento => {

        if (evento.target === loginOverlay) {
            fecharLogin();
        }

    });

    // Fechar com ESC
    document.addEventListener("keydown", evento => {

        if (
            evento.key === "Escape" &&
            loginOverlay.classList.contains("ativo")
        ) {
            fecharLogin();
        }

    });

    // Mostrar / ocultar senha
    loginOlho.addEventListener("click", () => {

        const estavaVisivel = loginSenha.type === "text";

        loginSenha.type = estavaVisivel ? "password" : "text";

        loginOlho.classList.toggle("ativo", !estavaVisivel);

        loginOlho.setAttribute(
            "aria-label",
            estavaVisivel ? "Mostrar senha" : "Ocultar senha"
        );

    });

    // ==============================
    // AUTENTICAÇÃO DO ADMINISTRADOR
    // ==============================

    formLogin.addEventListener("submit", async evento => {

        evento.preventDefault();

        loginErro.hidden = true;
        loginErro.textContent = "";

        const usuario = loginUsuario.value.trim();
        const senha = loginSenha.value;

        try {

            const resposta = await fetch("routes/login.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                credentials: "same-origin",
                body: JSON.stringify({
                    usuario: usuario,
                    senha: senha
                })
            });

            const dados = await resposta.json();

            if (!resposta.ok) {
                loginErro.textContent =
                    dados.erro || "Não foi possível realizar o login.";

                loginErro.hidden = false;
                return;
            }

            window.location.href = "painel.php";

        } catch (erro) {

            loginErro.textContent = "Erro de conexão. Tente novamente.";
            loginErro.hidden = false;

        }

    });

}

// ==============================
// CONFIRMAÇÃO DE INSCRIÇÃO
// ==============================

const confirmacao = sessionStorage.getItem("confirmacaoInscricao");

if (confirmacao) {

    const aviso = document.createElement("div");

    aviso.className = "confirmacao-inscricao";
    aviso.textContent = confirmacao;

    document.body.appendChild(aviso);

    sessionStorage.removeItem("confirmacaoInscricao");

    setTimeout(() => {
        aviso.classList.add("visivel");
    }, 100);

    setTimeout(() => {
        aviso.classList.remove("visivel");

        setTimeout(() => {
            aviso.remove();
        }, 400);

    }, 4500);
}
