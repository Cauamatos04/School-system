// ==============================
// PÁGINA DE INSCRIÇÃO
// ==============================

const infoModalidades = {
    futebol:  { nome: "Futebol",  faixa: "6 a 17 anos" },
    basquete: { nome: "Basquete", faixa: "6 a 17 anos" },
    volei:    { nome: "Vôlei",    faixa: "6 a 17 anos" },
    handebol: { nome: "Handebol", faixa: "6 a 17 anos" },
    natacao:  { nome: "Natação",  faixa: "6 a 17 anos" },
    judo:     { nome: "Judô",     faixa: "6 a 17 anos" }
};

const selectModalidade = document.getElementById("modalidade");
const resumoModalidade = document.getElementById("resumo-modalidade");
const resumoFaixa = document.getElementById("resumo-faixa");

// Atualiza o card "Sobre a Inscrição" conforme a modalidade escolhida

function atualizarResumo() {

    const dados = infoModalidades[selectModalidade.value];

    resumoModalidade.textContent = dados ? dados.nome : "—";
    resumoFaixa.textContent = dados ? dados.faixa : "—";

}

selectModalidade.addEventListener("change", atualizarResumo);

// Pré-seleciona a modalidade vinda do link: inscricao.php?modalidade=futebol

const parametros = new URLSearchParams(window.location.search);
const modalidadeUrl = parametros.get("modalidade");

if (modalidadeUrl && infoModalidades[modalidadeUrl]) {
    selectModalidade.value = modalidadeUrl;
}

atualizarResumo();

// Máscara do telefone: (83) 99999-9999

const campoTelefone = document.getElementById("telefone");

campoTelefone.addEventListener("input", () => {

    let numeros = campoTelefone.value.replace(/\D/g, "").slice(0, 11);

    if (numeros.length > 10) {
        numeros = numeros.replace(/^(\d{2})(\d{5})(\d{4}).*/, "($1) $2-$3");
    } else if (numeros.length > 6) {
        numeros = numeros.replace(/^(\d{2})(\d{4})(\d{0,4}).*/, "($1) $2-$3");
    } else if (numeros.length > 2) {
        numeros = numeros.replace(/^(\d{2})(\d{0,5}).*/, "($1) $2");
    } else if (numeros.length > 0) {
        numeros = "(" + numeros;
    }

    campoTelefone.value = numeros;

});

// Data de nascimento: sem data futura e abre o calendário ao clicar

const campoData = document.getElementById("data_nascimento");

campoData.max = new Date().toISOString().split("T")[0];

campoData.addEventListener("click", () => {

    if (typeof campoData.showPicker === "function") {
        campoData.showPicker();
    }

});