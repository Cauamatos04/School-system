
// ==============================
// PÁGINA DE INSCRIÇÃO
// ==============================

const selectModalidade = document.getElementById("modalidade");
const resumoModalidade = document.getElementById("resumo-modalidade");
const resumoFaixa = document.getElementById("resumo-faixa");

let modalidades = [];

// Carrega as modalidades cadastradas no banco

async function carregarModalidades() {
    try {
        const resposta = await fetch("routes/api.php/modalidades");
        
        if (!resposta.ok) {
            throw new Error("Erro ao buscar modalidades");
        }

        modalidades = await resposta.json();

        selectModalidade.innerHTML = `
            <option value="" selected disabled>
                Selecione uma modalidade
            </option>
        `;

        modalidades.forEach(modalidade => {
            const opcao = document.createElement("option");

            opcao.value = modalidade.id;
            opcao.textContent = modalidade.nome;

            selectModalidade.appendChild(opcao);
        });

        // Pré-seleciona a modalidade recebida pela URL
        const parametros = new URLSearchParams(window.location.search);
        const modalidadeUrl = parametros.get("modalidade");

        if (modalidadeUrl) {
            const modalidadeEncontrada = modalidades.find(
                modalidade => String(modalidade.id) === modalidadeUrl
            );

            if (modalidadeEncontrada) {
                selectModalidade.value = modalidadeEncontrada.id;
            }
        }

        atualizarResumo();

    } catch (erro) {
        console.error("Erro ao carregar modalidades:", erro);

        selectModalidade.innerHTML = `
            <option value="" selected disabled>
                Não foi possível carregar as modalidades
            </option>
        `;
    }
}

// Atualiza o resumo conforme a modalidade escolhida

function atualizarResumo() {
    const dados = modalidades.find(
        modalidade => String(modalidade.id) === selectModalidade.value
    );

    resumoModalidade.textContent = dados ? dados.nome : "—";
    resumoFaixa.textContent = dados ? "6 a 17 anos" : "—";
}

selectModalidade.addEventListener("change", atualizarResumo);

// Inicializa o carregamento
carregarModalidades();


// ==============================
// MÁSCARA DO TELEFONE
// ==============================

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



 // ==============================
 // DATA DE NASCIMENTO
 // ==============================

const campoData = document.getElementById("data_nascimento");

campoData.addEventListener("input", () => {

    let numeros = campoData.value.replace(/\D/g, "").slice(0, 8);

    if (numeros.length > 4) {
        numeros = numeros.replace(/^(\d{2})(\d{2})(\d{1,4}).*/, "$1/$2/$3");
    } else if (numeros.length > 2) {
        numeros = numeros.replace(/^(\d{2})(\d{1,2}).*/, "$1/$2");
    }

    campoData.value = numeros;

});

// Converte DD/MM/AAAA para AAAA-MM-DD
function converterDataParaBanco(data) {

    const partes = data.split("/");

    if (partes.length !== 3 || partes.some(parte => parte.length === 0)) {
        return null;
    }

    const [dia, mes, ano] = partes.map(Number);

    const dataVerificada = new Date(ano, mes - 1, dia);

    if (
        dataVerificada.getFullYear() !== ano ||
        dataVerificada.getMonth() !== mes - 1 ||
        dataVerificada.getDate() !== dia
    ) {
        return null;
    }

    if (dataVerificada > new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate())) {
        return null;
    }

    return `${ano}-${String(mes).padStart(2, "0")}-${String(dia).padStart(2, "0")}`;
}


// ==============================
// ENVIO DA INSCRIÇÃO
// ==============================

const formulario = document.getElementById("form-inscricao");
const botaoEnviar = formulario.querySelector(".ins-btn-enviar");

// Cria a área de confirmação
const areaConfirmacao = document.createElement("section");

areaConfirmacao.className = "ins-confirmacao";
areaConfirmacao.hidden = true;

areaConfirmacao.innerHTML = `
    <div class="ins-confirmacao-conteudo">

        <div class="ins-confirmacao-icone">
            <svg viewBox="0 0 48 48" aria-hidden="true">
                <path d="M10 25l10 10L39 13"/>
            </svg>
        </div>

        <span class="ins-confirmacao-legenda">INSCRIÇÃO CONCLUÍDA</span>

        <h2>Cadastro realizado com sucesso.</h2>

        <p>
            Os dados foram recebidos e registrados.
            Agradecemos por escolher a Escolinha Municipal.
        </p>

        <div class="ins-confirmacao-acoes">

            <button type="button" id="ins-novo-aluno">
                Realizar nova inscrição
            </button>

            <button type="button" id="ins-voltar-inicio">
                Finalizar e voltar ao início
            </button>

        </div>

    </div>
`;

// Mantém o formulário e a confirmação na mesma coluna
const colunaFormulario = formulario.parentElement;

const areaFormulario = document.createElement("div");
areaFormulario.className = "ins-form-area";

colunaFormulario.insertBefore(areaFormulario, formulario);

areaFormulario.appendChild(formulario);
areaFormulario.appendChild(areaConfirmacao);

// Opção: cadastrar outro aluno
document.getElementById("ins-novo-aluno").addEventListener("click", () => {

    formulario.reset();
    atualizarResumo();

    areaConfirmacao.hidden = true;
    formulario.hidden = false;

    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });

});

// Opção: finalizar
document.getElementById("ins-voltar-inicio").addEventListener("click", () => {
    window.location.href = "index.php";
});

// Envio do formulário
formulario.addEventListener("submit", async (evento) => {

    evento.preventDefault();

    if (!selectModalidade.value) {
        alert("Selecione uma modalidade.");
        return;
    }

    // Valida e converte a data para o formato do banco
    const dataNascimentoFormatada = converterDataParaBanco(campoData.value);

    if (!dataNascimentoFormatada) {
        alert("Informe uma data de nascimento válida, no formato DD/MM/AAAA.");
        campoData.focus();
        return;
    }

    // Dados enviados ao backend
    const dados = {
        matricula: document.getElementById("matricula").value.trim(),
        nome_aluno: document.getElementById("nome_aluno").value.trim(),
        data_nascimento: dataNascimentoFormatada,
        nome_responsavel: document.getElementById("nome_responsavel").value.trim(),
        telefone: campoTelefone.value.trim(),
        id_modalidade: Number(selectModalidade.value)
    };

    botaoEnviar.disabled = true;
    botaoEnviar.textContent = "Enviando inscrição...";

    try {

        const resposta = await fetch("routes/inscricoes.php/inscricoes", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(dados)
        });

        const resultado = await resposta.json();

        if (!resposta.ok) {
            throw new Error(
                resultado.erro ||
                resultado.mensagem ||
                "Não foi possível realizar a inscrição."
            );
        }

        // Exibe a confirmação na própria página
        formulario.hidden = true;
        areaConfirmacao.hidden = false;

        areaConfirmacao.scrollIntoView({
            behavior: "smooth",
            block: "center"
        });

    } catch (erro) {

        alert(erro.message);

    } finally {

        botaoEnviar.disabled = false;

        botaoEnviar.innerHTML = `
            <svg class="ic-cheio" viewBox="0 0 48 48" aria-hidden="true">
                <path d="M45 3L3 20l14 6 6 15z"/>
                <path d="M45 3L17 26" stroke="#ffc21a" stroke-width="3"/>
            </svg>
            Enviar Inscrição
        `;

    }

});
