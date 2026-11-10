<?php
require_once __DIR__ . '/config/sessao.php';

// Só entra quem estiver logado como administrador
if (!isset($_SESSION['administrador_id'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Painel Administrativo | Escolinha SECTI</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/painel.css">
</head>
<body class="pagina-painel">

<div class="painel">

    <!-- ==============================
         SIDEBAR
    ============================== -->
    <aside class="sidebar" id="sidebar">

        <a href="#painel" class="sidebar-logo">
            <img src="assets/images/logo-escolinha-secti-branco.png" alt="Escolinha SECTI">
        </a>

        <span class="sidebar-linha"></span>

        <nav class="sidebar-nav" aria-label="Menu do painel">

            <a href="#painel" class="sidebar-link ativo">
                <svg class="ic" viewBox="0 0 24 24" aria-hidden="true">
                    <rect x="3" y="3" width="7" height="7" rx="2"/>
                    <rect x="14" y="3" width="7" height="7" rx="2"/>
                    <rect x="3" y="14" width="7" height="7" rx="2"/>
                    <rect x="14" y="14" width="7" height="7" rx="2"/>
                </svg>
                <span>Painel Administrativo</span>
            </a>

            <a href="#modalidades" class="sidebar-link">
                <svg class="ic" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M8 21h8M12 17v4M7 4h10v5a5 5 0 0 1-10 0V4z"/>
                    <path d="M17 5h3v2a3 3 0 0 1-3 3M7 5H4v2a3 3 0 0 0 3 3"/>
                </svg>
                <span>Modalidades de Turma</span>
            </a>

            <a href="#inscricoes" class="sidebar-link">
                <svg class="ic" viewBox="0 0 24 24" aria-hidden="true">
                    <rect x="5" y="4" width="14" height="17" rx="2"/>
                    <path d="M9 2.5h6v3H9zM9 13l2.2 2.2L15.5 11"/>
                </svg>
                <span>Inscrições</span>
            </a>

        </nav>

        <span class="sidebar-linha"></span>

        <a href="#" class="sidebar-link sidebar-sair" id="btn-sair">
            <svg class="ic" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M9 4H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h3"/>
                <path d="M16 8l4 4-4 4M20 12H9"/>
            </svg>
            <span>Sair</span>
        </a>

        <!-- Decoração amarela no canto inferior -->
        <svg class="sidebar-decoracao" viewBox="0 0 240 240" aria-hidden="true">
            <circle cx="40" cy="220" r="150" fill="#0c2f66"/>
            <circle cx="0" cy="260" r="120" fill="#ffc21a"/>
        </svg>

    </aside>

    <!-- ==============================
         CONTEÚDO
    ============================== -->
    <div class="painel-conteudo">

        <header class="painel-topo" id="painel">

            <button type="button"
                    class="painel-menu-toggle"
                    id="painel-menu-toggle"
                    aria-label="Abrir menu"
                    aria-expanded="false"
                    aria-controls="sidebar">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="painel-titulo">
                <h1>Painel Administrativo</h1>
                <p>Gerencie as modalidades de turma e acompanhe as inscrições.</p>
            </div>

            <span class="painel-area">
                <svg class="ic" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M12 3l7 3v5c0 4.600-3 8.200-7 10-4-1.800-7-5.400-7-10V6z"/>
                    <path d="M9 12l2.200 2.200L15 10"/>
                </svg>
                Área Administrativa
            </span>

        </header>

        <main class="painel-main">

            <!-- ==============================
     SEÇÃO 2: ESTATÍSTICAS
============================== -->

<section class="estatisticas">

    <article class="estatistica-card">

        <div class="estatistica-icone azul">
            <svg class="ic" viewBox="0 0 24 24">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
        </div>

        <div class="estatistica-info">
            <strong id="total-modalidades-dashboard">0</strong>
            <span>Modalidades cadastradas</span>
        </div>

    </article>


    <article class="estatistica-card">

        <div class="estatistica-icone amarelo">
            <svg class="ic" viewBox="0 0 24 24">
                <path d="m12 2 10 5-10 5L2 7z"/>
                <path d="m2 12 10 5 10-5"/>
                <path d="m2 17 10 5 10-5"/>
            </svg>
        </div>

        <div class="estatistica-info">
            <strong id="total-inscricoes-dashboard">0</strong>
            <span>Inscrições Totais</span>
        </div>

    </article>


    <article class="estatistica-card">

        <div class="estatistica-icone verde">
            <svg class="ic" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"/>
                <path d="m8 12 3 3 5-6"/>
            </svg>
        </div>

        <div class="estatistica-info">
            <strong id="total-aprovadas-dashboard">0</strong>
            <span>Inscrições Aprovadas</span>
        </div>

    </article>


    <article class="estatistica-card">

        <div class="estatistica-icone azul-escuro">
            <svg class="ic" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"/>
                <path d="M12 6v6l4 2"/>
            </svg>
        </div>

        <div class="estatistica-info">
            <strong id="total-aguardando-dashboard">0</strong>
            <span>Aguardando Aprovação</span>
        </div>

    </article>

</section>

           <!-- ==============================
     SEÇÃO 3: MODALIDADES E ALUNOS
============================== -->

<section class="gestao-modalidades" id="modalidades">

   <div class="secao-cabecalho">

    <div>
        <span class="secao-identificador">GERENCIAMENTO</span>
        <h2>Modalidades de turma</h2>
        <p>Selecione uma modalidade para visualizar os alunos inscritos.</p>
    </div>

    <button type="button" class="botao-nova-modalidade" id="btn-nova-modalidade">
        <span>+</span>
        Nova modalidade
    </button>

</div>
    <div class="gestao-conteudo">

        <!-- LISTA DE MODALIDADES -->
        <div class="modalidades-painel">

            <div class="painel-subtitulo">
                <h3>Modalidades</h3>
                <span id="total-modalidades">0</span>
            </div>

            <div id="lista-modalidades" class="lista-modalidades">
                <p class="estado-carregamento">Carregando modalidades...</p>
            </div>

        </div>

        <!-- ALUNOS DA MODALIDADE -->
        <div class="alunos-painel">

            <div class="painel-subtitulo alunos-cabecalho">
                <div>
                    <span class="secao-identificador">ALUNOS INSCRITOS</span>
                    <h3 id="titulo-modalidade">Selecione uma modalidade</h3>
                </div>

                <span id="total-alunos">0 alunos</span>
            </div>

            <div id="lista-alunos" class="lista-alunos" aria-live="polite">
                <div class="estado-vazio">
                    <p>Selecione uma modalidade para visualizar os alunos.</p>
                </div>
            </div>

        </div>

    </div>
    <!-- MODAL DE EDIÇÃO DE MODALIDADE -->

<div class="modal-edicao" id="modal-edicao" aria-hidden="true">

    <div class="modal-edicao-conteudo">

        <div class="modal-edicao-topo">
            <div>
                <span class="secao-identificador">GERENCIAMENTO</span>
                <h3 id="titulo-modal-modalidade">Editar modalidade</h3>
            </div>

            <button type="button" class="modal-fechar" id="fechar-modal-edicao">
                &times;
            </button>
        </div>

        <form id="form-editar-modalidade">

            <div class="campo-modalidade">
                <label for="editar-nome">Nome da modalidade</label>
                <input
                    type="text"
                    id="editar-nome"
                    maxlength="80"
                    required
                >
            </div>

            <div class="campo-modalidade">
                <label for="editar-descricao">Descrição</label>
                <textarea
                    id="editar-descricao"
                    maxlength="255"
                    rows="3"
                ></textarea>
            </div>
            <div class="campo-modalidade campo-selecao-icone">
    <label>Ícone da modalidade</label>
    <p class="descricao-selecao-icone">
        Escolha o símbolo que melhor representa essa modalidade.
    </p>

    <div class="grade-icones" id="grade-icones">

        <button type="button" class="opcao-icone selecionado" data-icone="futebol" aria-label="Futebol" title="Futebol">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="9"/>
                <path d="m12 7 3 2v4l-3 2-3-2V9l3-2Z"/>
                <path d="m9 9-4-2m10 2 4-2m-10 6-3 4m9-4 3 4m-6-3v5"/>
            </svg>
            <span>Futebol</span>
        </button>

        <button type="button" class="opcao-icone" data-icone="futsal" aria-label="Futsal" title="Futsal">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                <circle cx="12" cy="12" r="9"/>
                <path d="m12 8 3 2-1 4h-4l-1-4 3-2Zm0 0V4m3 6 4-2m-5 6 2 4m-6-4-2 4m2-8-4-2"/>
            </svg>
            <span>Futsal</span>
        </button>

        <button type="button" class="opcao-icone" data-icone="basquete" aria-label="Basquete" title="Basquete">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                <circle cx="12" cy="12" r="9"/>
                <path d="M12 3v18M3 12h18M5.6 5.6c4 3 4 9.8 0 12.8m12.8-12.8c-4 3-4 9.8 0 12.8"/>
            </svg>
            <span>Basquete</span>
        </button>

        <button type="button" class="opcao-icone" data-icone="volei" aria-label="Vôlei" title="Vôlei">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                <circle cx="12" cy="12" r="9"/>
                <path d="M12 3c-1 5 1 8 5 10M4 8c5-1 8 1 10 5m-8 7c1-5 4-7 9-7m1-9c3 3 4 7 3 11"/>
            </svg>
            <span>Vôlei</span>
        </button>

        <button type="button" class="opcao-icone" data-icone="handebol" aria-label="Handebol" title="Handebol">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                <circle cx="12" cy="12" r="9"/>
                <path d="M8 4c1 3 2 5 4 8m4-7c-1 3-2 5-4 7m8 2c-4-1-7-1-10 2m-3 3c2-3 5-5 9-5"/>
            </svg>
            <span>Handebol</span>
        </button>

        <button type="button" class="opcao-icone" data-icone="natacao" aria-label="Natação" title="Natação">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="15" cy="5" r="2"/>
                <path d="m13 8-4 3 4 2 3-3m-3 3-3 4m3-4 5 3M3 17c2-2 4 2 6 0s4 2 6 0 4 2 6 0"/>
            </svg>
            <span>Natação</span>
        </button>

        <button type="button" class="opcao-icone" data-icone="judo" aria-label="Judô" title="Judô">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                <path d="M8 3h8l2 5-3 2v11H9V10L6 8l2-5Z"/>
                <path d="m9 10 3 3 3-3m-3 3v8"/>
            </svg>
            <span>Judô</span>
        </button>

        <button type="button" class="opcao-icone" data-icone="karate" aria-label="Karatê" title="Karatê">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                <circle cx="12" cy="5" r="2"/>
                <path d="m12 7-3 5-5 2m8-7 4 4 4-1m-11 2 3 2 4-2m-4 2-3 6m7-6 3 6"/>
            </svg>
            <span>Karatê</span>
        </button>

        <button type="button" class="opcao-icone" data-icone="jiu-jitsu" aria-label="Jiu-jitsu" title="Jiu-jitsu">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                <path d="M8 3h8l2 5-3 2v11H9V10L6 8l2-5Z"/>
                <path d="m9 10 3 3 3-3m-3 3v8m-4-8h8"/>
            </svg>
            <span>Jiu-jitsu</span>
        </button>

        <button type="button" class="opcao-icone" data-icone="atletismo" aria-label="Atletismo" title="Atletismo">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="15" cy="4" r="2"/>
                <path d="m13 7-4 4-4 1m8-5 3 4 4 1m-11-1 3 4-3 5m7-8-1 5 4 4"/>
            </svg>
            <span>Atletismo</span>
        </button>

        <button type="button" class="opcao-icone" data-icone="ciclismo" aria-label="Ciclismo" title="Ciclismo">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                <circle cx="6" cy="16" r="4"/>
                <circle cx="18" cy="16" r="4"/>
                <circle cx="12" cy="5" r="1.5"/>
                <path d="m12 7-4 9h6l-2-9 6 9M9 7h4"/>
            </svg>
            <span>Ciclismo</span>
        </button>

        <button type="button" class="opcao-icone" data-icone="tenis" aria-label="Tênis" title="Tênis">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                <ellipse cx="12" cy="10" rx="5" ry="8" transform="rotate(35 12 10)"/>
                <path d="m8 4 8 11m-5-13 7 10m-10-6 8 10m-9 1 5 4"/>
            </svg>
            <span>Tênis</span>
        </button>

        <button type="button" class="opcao-icone" data-icone="tenis-mesa" aria-label="Tênis de mesa" title="Tênis de mesa">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                <path d="M4 20 15 9m-8 14 4-4m1-12 4-4 5 5-4 4"/>
                <circle cx="6" cy="5" r="2"/>
                <path d="M2 12h5m-2.5-2.5v5"/>
            </svg>
            <span>Tênis de mesa</span>
        </button>

        <button type="button" class="opcao-icone" data-icone="ginastica" aria-label="Ginástica" title="Ginástica">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                <circle cx="12" cy="4" r="2"/>
                <path d="m12 6-2 6-5 3m7-3 5-4 3 2m-10 2 4 4-3 5m-1-9-4 8m8-4 4 4"/>
            </svg>
            <span>Ginástica</span>
        </button>

        <button type="button" class="opcao-icone" data-icone="danca" aria-label="Dança" title="Dança">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                <circle cx="14" cy="4" r="2"/>
                <path d="m13 7-3 5-5 1m8-6 4 4 4-1m-8 2 3 4-2 5m-1-9-5 4-3 5"/>
            </svg>
            <span>Dança</span>
        </button>

        <button type="button" class="opcao-icone" data-icone="outros" aria-label="Outros esportes" title="Outros esportes">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="9"/>
                <path d="M8 12h8m-4-4v8"/>
            </svg>
            <span>Outros</span>
        </button>

    </div>

    <input type="hidden" id="editar-icone" value="futebol">
</div>
            <p id="erro-edicao-modalidade" class="mensagem-modalidade"></p>

            <div class="modal-edicao-acoes">
                <button type="button" class="botao-cancelar" id="cancelar-edicao">
                    Cancelar
                </button>

                <button type="submit" class="botao-salvar">
                    Salvar alterações
                </button>
            </div>

        </form>

    </div>

</div>

</section>

          
<!-- SEÇÃO 4: INSCRIÇÕES -->
<section class="gestao-inscricoes" id="inscricoes">

    <div class="secao-cabecalho">
        <div>
            <span class="secao-identificador">GERENCIAMENTO</span>
            <h2>Inscrições</h2>
            <p>Acompanhe e gerencie as inscrições dos alunos.</p>
        </div>
    </div>

    <div class="inscricoes-painel">

        <div class="painel-subtitulo">
            <div>
                <h3>Lista de inscrições</h3>
                <span class="descricao-inscricoes">
                    Inscrições realizadas nas modalidades
                </span>
            </div>

            <span id="total-inscricoes">0 inscrições</span>
        </div>

        <div class="tabela-inscricoes-container">
            <table class="tabela-inscricoes">

                <thead>
                    <tr>
                        <th>Aluno</th>
                        <th>Modalidade</th>
                        <th>Data da inscrição</th>
                        <th>Situação</th>
                        <th>Ação</th>
                    </tr>
                </thead>

                <tbody id="lista-inscricoes">
                    <tr>
                        <td colspan="5" class="estado-carregamento">
                            Carregando inscrições...
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>

    </div>

</section>


        </main>

    </div>

</div>

<script src="assets/js/painel.js"></script>

</body>
</html>