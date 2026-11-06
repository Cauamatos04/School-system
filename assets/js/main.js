
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