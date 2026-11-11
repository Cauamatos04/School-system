
// ==============================
// PAINEL ADMINISTRATIVO
// ==============================

const sidebar = document.getElementById("sidebar");
const menuToggle = document.getElementById("painel-menu-toggle");
const botaoSair = document.getElementById("btn-sair");

// ==============================
// MENU LATERAL
// ==============================

function definirSidebar(aberta) {
    sidebar.classList.toggle("aberta", aberta);
    document.body.classList.toggle("sidebar-aberta", aberta);

    menuToggle.setAttribute("aria-expanded", aberta);
    menuToggle.setAttribute("aria-label", aberta ? "Fechar menu" : "Abrir menu");
}

menuToggle.addEventListener("click", (evento) => {
    evento.stopPropagation();
    definirSidebar(!sidebar.classList.contains("aberta"));
});

document.addEventListener("click", (evento) => {
    if (sidebar.classList.contains("aberta") && !sidebar.contains(evento.target)) {
        definirSidebar(false);
    }
});

document.addEventListener("keydown", (evento) => {
    if (evento.key === "Escape") {
        definirSidebar(false);
        fecharEdicaoModalidade();
    }
});

const linksSidebar = document.querySelectorAll(".sidebar-nav .sidebar-link");

linksSidebar.forEach(link => {
    link.addEventListener("click", () => {
        linksSidebar.forEach(item => item.classList.remove("ativo"));
        link.classList.add("ativo");
        definirSidebar(false);
    });
});

// ==============================
// SAIR DO PAINEL
// ==============================

botaoSair.addEventListener("click", async (evento) => {
    evento.preventDefault();

    try {
        await fetch("routes/logout.php", {
            method: "POST",
            credentials: "same-origin"
        });
    } catch (erro) {
        // Retorna à página inicial mesmo com erro de rede.
    }

    window.location.href = "index.php";
});

// ==============================
// SEÇÃO 3 - MODALIDADES E ALUNOS
// ==============================

const listaModalidades = document.getElementById("lista-modalidades");
const listaAlunos = document.getElementById("lista-alunos");

const totalModalidades = document.getElementById("total-modalidades");
const totalAlunos = document.getElementById("total-alunos");

const tituloModalidade = document.getElementById("titulo-modalidade");

let modalidadeSelecionada = null;

// ==============================
// CARREGAR MODALIDADES
// ==============================

async function carregarModalidades() {
    try {
        const resposta = await fetch("routes/api.php/modalidades", {
            credentials: "same-origin"
        });

        const modalidades = await resposta.json();

        if (!resposta.ok || !Array.isArray(modalidades)) {
            throw new Error("Não foi possível carregar as modalidades.");
        }

        const totalModalidadesDashboard = document.getElementById("total-modalidades-dashboard");

        if (totalModalidadesDashboard) {
            totalModalidadesDashboard.textContent = modalidades.length;
        }

        listaModalidades.innerHTML = "";
        totalModalidades.textContent = modalidades.length;

        if (modalidades.length === 0) {
            modalidadeSelecionada = null;

            tituloModalidade.textContent = "Nenhuma modalidade cadastrada";
            totalAlunos.textContent = "0 alunos";

            listaModalidades.innerHTML = `
                <p class="estado-vazio">
                    Nenhuma modalidade cadastrada.
                </p>
            `;

            listaAlunos.innerHTML = `
                <div class="estado-vazio">
                    Cadastre uma modalidade para visualizar os alunos.
                </div>
            `;

            return;
        }

        modalidades.forEach(modalidade => {
            const linha = document.createElement("div");
            linha.className = "modalidade-linha";

            const botao = document.createElement("button");
            botao.type = "button";
            botao.className = "modalidade-item";
            botao.textContent = modalidade.nome;
            botao.dataset.id = modalidade.id;

            botao.addEventListener("click", () => {
                selecionarModalidade(modalidade, botao);
            });

            const acoes = document.createElement("div");
            acoes.className = "acoes-modalidade";

            const editar = document.createElement("button");
            editar.type = "button";
            editar.className = "acao-modalidade acao-editar";
            editar.title = "Editar modalidade";
            editar.setAttribute("aria-label", "Editar " + modalidade.nome);
            editar.innerHTML = "&#9998;";

            editar.addEventListener("click", () => {
                abrirEdicaoModalidade(modalidade);
            });

            const excluir = document.createElement("button");
            excluir.type = "button";
            excluir.className = "acao-modalidade acao-excluir";
            excluir.title = "Excluir modalidade";
            excluir.setAttribute("aria-label", "Excluir " + modalidade.nome);
            excluir.innerHTML = "&#128465;";

            excluir.addEventListener("click", () => {
                excluirModalidade(modalidade);
            });

            acoes.appendChild(editar);
            acoes.appendChild(excluir);

            linha.appendChild(botao);
            linha.appendChild(acoes);

            listaModalidades.appendChild(linha);
        });

        const primeiroBotao = listaModalidades.querySelector(".modalidade-item");

        if (primeiroBotao) {
            primeiroBotao.click();
        }

    } catch (erro) {
        listaModalidades.innerHTML = `
            <p class="estado-vazio estado-erro">
                Erro ao carregar modalidades.
            </p>
        `;

        console.error(erro);
    }
}

// ==============================
// SELECIONAR MODALIDADE
// ==============================

function selecionarModalidade(modalidade, botao) {
    modalidadeSelecionada = modalidade.id;

    document.querySelectorAll(".modalidade-item").forEach(item => {
        item.classList.remove("ativa");
    });

    botao.classList.add("ativa");

    tituloModalidade.textContent = modalidade.nome;

    carregarAlunos(modalidade.id);
}

// ==============================
// CARREGAR ALUNOS APROVADOS
// ==============================

async function carregarAlunos(idModalidade) {
    listaAlunos.innerHTML = `
        <p class="estado-carregamento">
            Carregando alunos...
        </p>
    `;

    totalAlunos.textContent = "0 alunos";

    try {
        const resposta = await fetch(
            `routes/inscricoes.php/modalidade/${idModalidade}/aprovados`,
            {
                credentials: "same-origin"
            }
        );

        const alunos = await resposta.json();

        if (!resposta.ok || !Array.isArray(alunos)) {
            throw new Error("Não foi possível carregar os alunos.");
        }

        if (String(modalidadeSelecionada) !== String(idModalidade)) {
            return;
        }

        listaAlunos.innerHTML = "";

        totalAlunos.textContent =
            `${alunos.length} ${alunos.length === 1 ? "aluno" : "alunos"}`;

        if (alunos.length === 0) {
            listaAlunos.innerHTML = `
                <div class="estado-vazio">
                    Nenhum aluno com inscrição aprovada nesta modalidade.
                </div>
            `;

            return;
        }

        alunos.forEach(aluno => {
            const item = document.createElement("article");
            item.className = "aluno-item";

            const informacoes = document.createElement("div");

            const nome = document.createElement("p");
            nome.className = "aluno-nome";
            nome.textContent = aluno.nome_aluno;

            const responsavel = document.createElement("p");
            responsavel.className = "aluno-responsavel";
            responsavel.textContent = `Responsável: ${aluno.nome_responsavel}`;

            informacoes.appendChild(nome);
            informacoes.appendChild(responsavel);

            const matricula = document.createElement("span");
            matricula.className = "aluno-matricula";
            matricula.textContent = `Matrícula: ${aluno.matricula}`;

            item.appendChild(informacoes);
            item.appendChild(matricula);

            listaAlunos.appendChild(item);
        });

    } catch (erro) {
        listaAlunos.innerHTML = `
            <p class="estado-vazio estado-erro">
                Erro ao carregar os alunos desta modalidade.
            </p>
        `;

        console.error(erro);
    }
}

// ==============================
// MODAL DE CADASTRO E EDIÇÃO
// ==============================

const modalEdicao = document.getElementById("modal-edicao");
const formEdicao = document.getElementById("form-editar-modalidade");

const campoNome = document.getElementById("editar-nome");
const campoDescricao = document.getElementById("editar-descricao");
const campoIcone = document.getElementById("editar-icone");
const opcoesIcone = document.querySelectorAll(".opcao-icone");

const erroEdicao = document.getElementById("erro-edicao-modalidade");

const botaoSalvar = formEdicao.querySelector(".botao-salvar");

let modalidadeEmEdicao = null;

// ==============================
// SELECIONAR ÍCONE
// ==============================

function selecionarIcone(icone) {
    const iconeValido = document.querySelector(
        `.opcao-icone[data-icone="${icone}"]`
    );

    const iconeSelecionado = iconeValido ? icone : "outros";

    campoIcone.value = iconeSelecionado;

    opcoesIcone.forEach(opcao => {
        const selecionado = opcao.dataset.icone === iconeSelecionado;

        opcao.classList.toggle("selecionado", selecionado);
        opcao.setAttribute("aria-pressed", selecionado);
    });
}

opcoesIcone.forEach(opcao => {
    opcao.addEventListener("click", () => {
        selecionarIcone(opcao.dataset.icone);
    });
});

selecionarIcone("futebol");

// ==============================
// ABRIR EDIÇÃO
// ==============================

function abrirEdicaoModalidade(modalidade) {
    modalidadeEmEdicao = modalidade.id;

    document.getElementById("titulo-modal-modalidade").textContent =
        "Editar modalidade";

    botaoSalvar.textContent = "Salvar alterações";

    campoNome.value = modalidade.nome;
    campoDescricao.value = modalidade.descricao || "";

    selecionarIcone(modalidade.icone || "outros");

    erroEdicao.textContent = "";

    modalEdicao.classList.add("aberto");
    modalEdicao.setAttribute("aria-hidden", "false");

    campoNome.focus();
}

// ==============================
// ABRIR NOVA MODALIDADE
// ==============================

document.getElementById("btn-nova-modalidade")
    .addEventListener("click", () => {

        modalidadeEmEdicao = null;

        document.getElementById("titulo-modal-modalidade").textContent =
            "Nova modalidade";

        botaoSalvar.textContent = "Cadastrar modalidade";

        campoNome.value = "";
        campoDescricao.value = "";

        selecionarIcone("futebol");

        erroEdicao.textContent = "";

        modalEdicao.classList.add("aberto");
        modalEdicao.setAttribute("aria-hidden", "false");

        campoNome.focus();
    });

// ==============================
// FECHAR MODAL
// ==============================

function fecharEdicaoModalidade() {
    if (!modalEdicao) return;

    modalEdicao.classList.remove("aberto");
    modalEdicao.setAttribute("aria-hidden", "true");

    modalidadeEmEdicao = null;

    botaoSalvar.textContent = "Salvar alterações";

    erroEdicao.textContent = "";
}

document.getElementById("fechar-modal-edicao")
    .addEventListener("click", fecharEdicaoModalidade);

document.getElementById("cancelar-edicao")
    .addEventListener("click", fecharEdicaoModalidade);

modalEdicao.addEventListener("click", (evento) => {
    if (evento.target === modalEdicao) {
        fecharEdicaoModalidade();
    }
});

// ==============================
// CADASTRAR / EDITAR MODALIDADE
// ==============================

formEdicao.addEventListener("submit", async (evento) => {
    evento.preventDefault();

    const nome = campoNome.value.trim();
    const descricao = campoDescricao.value.trim();
    const icone = campoIcone.value;

    if (!nome) {
        erroEdicao.textContent = "Informe o nome da modalidade.";
        return;
    }

    const editando = modalidadeEmEdicao !== null;
    const idModalidade = modalidadeEmEdicao;

    botaoSalvar.disabled = true;
    botaoSalvar.textContent = "Salvando...";

    erroEdicao.textContent = "";

    try {
        const url = editando
            ? `routes/api.php/modalidades/${idModalidade}`
            : "routes/api.php/modalidades";

        const resposta = await fetch(url, {
            method: editando ? "PUT" : "POST",

            headers: {
                "Content-Type": "application/json"
            },

            credentials: "same-origin",

            body: JSON.stringify({
                nome: nome,
                descricao: descricao,
                icone: icone
            })
        });

        const resultado = await resposta.json();

        if (!resposta.ok) {
            throw new Error(
                resultado.erro || "Não foi possível salvar a modalidade."
            );
        }

        fecharEdicaoModalidade();

        await carregarModalidades();

    } catch (erro) {
        erroEdicao.textContent = erro.message;
        console.error(erro);

    } finally {
        botaoSalvar.disabled = false;

        botaoSalvar.textContent = editando
            ? "Salvar alterações"
            : "Cadastrar modalidade";
    }
});

// ==============================
// EXCLUIR MODALIDADE
// ==============================

async function excluirModalidade(modalidade) {
    const confirmar = confirm(
        `Deseja realmente excluir a modalidade "${modalidade.nome}"?\n\n` +
        "Atenção: as inscrições vinculadas a esta modalidade também serão excluídas.\n\n" +
        "Essa ação não poderá ser desfeita."
    );

    if (!confirmar) return;

    try {
        const resposta = await fetch(
            `routes/api.php/modalidades/${modalidade.id}`,
            {
                method: "DELETE",
                credentials: "same-origin"
            }
        );

        const resultado = await resposta.json();

        if (!resposta.ok) {
            throw new Error(
                resultado.erro || "Não foi possível excluir a modalidade."
            );
        }

        await carregarModalidades();

    } catch (erro) {
        alert(erro.message);
        console.error(erro);
    }
}

// ==============================
// INICIALIZAR PAINEL
// ==============================

if (listaModalidades && listaAlunos) {
    carregarModalidades();
}

// ==============================
// SEÇÃO 4 - GERENCIAMENTO DE INSCRIÇÕES
// ==============================

const listaInscricoes = document.getElementById("lista-inscricoes");
const totalInscricoes = document.getElementById("total-inscricoes");

// ==============================
// FORMATAR DATA
// ==============================

function formatarDataInscricao(data) {
    if (!data) return "Não informada";

    const dataFormatada = new Date(data.replace(" ", "T"));

    if (isNaN(dataFormatada.getTime())) {
        return data;
    }

    return dataFormatada.toLocaleDateString("pt-BR", {
        day: "2-digit",
        month: "2-digit",
        year: "numeric"
    });
}

// ==============================
// CARREGAR INSCRIÇÕES
// ==============================

async function carregarInscricoes() {
    if (!listaInscricoes) return;

    listaInscricoes.innerHTML = `
        <tr>
            <td colspan="5" class="estado-carregamento">
                Carregando inscrições...
            </td>
        </tr>
    `;

    try {
        const resposta = await fetch("routes/inscricoes.php/inscricoes", {
            credentials: "same-origin"
        });

        const inscricoes = await resposta.json();

        if (!resposta.ok || !Array.isArray(inscricoes)) {
            throw new Error(
                inscricoes.erro || "Não foi possível carregar as inscrições."
            );
        }

        const totalInscricoesDashboard =
            document.getElementById("total-inscricoes-dashboard");

        const totalAprovadasDashboard =
            document.getElementById("total-aprovadas-dashboard");

        const totalPendentesDashboard =
            document.getElementById("total-pendentes-dashboard");

        const aprovadas = inscricoes.filter(
            inscricao => inscricao.status === "aprovada"
        ).length;

        const pendentes = inscricoes.filter(
            inscricao => inscricao.status === "pendente"
        ).length;

        if (totalInscricoesDashboard) {
            totalInscricoesDashboard.textContent = inscricoes.length;
        }

        if (totalAprovadasDashboard) {
            totalAprovadasDashboard.textContent = aprovadas;
        }

        if (totalPendentesDashboard) {
            totalPendentesDashboard.textContent = pendentes;
        }

        listaInscricoes.innerHTML = "";

        totalInscricoes.textContent =
            `${inscricoes.length} ${inscricoes.length === 1 ? "inscrição" : "inscrições"}`;

        if (inscricoes.length === 0) {
            listaInscricoes.innerHTML = `
                <tr>
                    <td colspan="5" class="estado-vazio">
                        Nenhuma inscrição encontrada.
                    </td>
                </tr>
            `;

            return;
        }

        inscricoes.forEach(inscricao => {
            const linha = document.createElement("tr");

            // Aluno
            const colunaAluno = document.createElement("td");
            colunaAluno.className = "inscricao-aluno";
            colunaAluno.dataset.label = "Aluno";
            colunaAluno.textContent = inscricao.nome_aluno;

            // Modalidade
            const colunaModalidade = document.createElement("td");
            colunaModalidade.dataset.label = "Modalidade";
            colunaModalidade.textContent = inscricao.nome_modalidade;

            // Data
            const colunaData = document.createElement("td");
            colunaData.className = "inscricao-data";
            colunaData.dataset.label = "Data da inscrição";
            colunaData.textContent = formatarDataInscricao(inscricao.criada_em);

            // Situação
            const colunaStatus = document.createElement("td");
            colunaStatus.dataset.label = "Situação";

            const status = document.createElement("span");

            status.className = inscricao.status === "aprovada"
                ? "status-inscricao aprovada"
                : "status-inscricao pendente";

            status.textContent = inscricao.status === "aprovada"
                ? "Aprovada"
                : "Pendente";

            colunaStatus.appendChild(status);

            // Ação
            const colunaAcao = document.createElement("td");
            colunaAcao.className = "inscricao-acao";
            colunaAcao.dataset.label = "Ação";

            if (inscricao.status === "pendente") {
                const botaoAprovar = document.createElement("button");

                botaoAprovar.type = "button";
                botaoAprovar.className = "botao-aprovar";
                botaoAprovar.innerHTML = "&#10003;";
                botaoAprovar.title = "Aprovar inscrição";

                botaoAprovar.setAttribute(
                    "aria-label",
                    `Aprovar inscrição de ${inscricao.nome_aluno}`
                );

                botaoAprovar.addEventListener("click", () => {
                    aprovarInscricao(inscricao.id, botaoAprovar);
                });

                colunaAcao.appendChild(botaoAprovar);

            } else {
                const aprovado = document.createElement("span");

                aprovado.className = "inscricao-aprovada";
                aprovado.innerHTML = "&#10003;";
                aprovado.title = "Inscrição aprovada";

                colunaAcao.appendChild(aprovado);
            }

            linha.appendChild(colunaAluno);
            linha.appendChild(colunaModalidade);
            linha.appendChild(colunaData);
            linha.appendChild(colunaStatus);
            linha.appendChild(colunaAcao);

            listaInscricoes.appendChild(linha);
        });

    } catch (erro) {
        listaInscricoes.innerHTML = `
            <tr>
                <td colspan="5" class="estado-erro">
                    Erro ao carregar as inscrições.
                </td>
            </tr>
        `;

        console.error(erro);
    }
}

// ==============================
// APROVAR INSCRIÇÃO
// ==============================

async function aprovarInscricao(id, botao) {
    botao.disabled = true;
    botao.textContent = "...";

    try {
        const resposta = await fetch(`routes/inscricoes.php/${id}`, {
            method: "PUT",

            headers: {
                "Content-Type": "application/json"
            },

            credentials: "same-origin",

            body: JSON.stringify({
                status: "aprovada"
            })
        });

        const resultado = await resposta.json();

        if (!resposta.ok) {
            throw new Error(
                resultado.erro || "Não foi possível aprovar a inscrição."
            );
        }

        await carregarInscricoes();

        if (modalidadeSelecionada !== null) {
            await carregarAlunos(modalidadeSelecionada);
        }

    } catch (erro) {
        alert(erro.message);

        botao.disabled = false;
        botao.innerHTML = "&#10003;";

        console.error(erro);
    }
}

// ==============================
// INICIALIZAR LISTAGEM
// ==============================

carregarInscricoes();
