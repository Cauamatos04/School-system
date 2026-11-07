
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Escolinha SECTI</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;1,300;1,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- CABEÇALHO -->
    <header class="header">

        <div class="header-container">

            <!-- LOGOTIPO -->
            <a href="#inicio" class="logo">
                <img src="assets/images/logo-escolinha-secti.png"
                     alt="Escolinha SECTI">
            </a>

            <!-- NAVEGAÇÃO -->
            <nav class="nav" id="nav">

                <a href="#inicio" class="nav-link active">Início</a>

                <a href="#modalidades" class="nav-link">Modalidades</a>

                <a href="#sobre" class="nav-link">Sobre</a>

                <a href="#contato" class="nav-link">Contato</a>

                <a href="#inscricao" class="btn-inscricao-mobile">
                    Inscrever-se <span>›</span>
                </a>

            </nav>

            <!-- BOTÃO DE INSCRIÇÃO -->
            <a href="#inscricao" class="btn-inscricao">
                Inscrever-se
                <span>›</span>
            </a>

            <!-- MENU MOBILE -->
            <button class="menu-toggle"
                    id="menu-toggle"
                    aria-label="Abrir menu"
                    aria-expanded="false"
                    aria-controls="nav">

                <span></span>
                <span></span>
                <span></span>

            </button>

        </div>

    </header>


<!-- ==============================
     BANNER PRINCIPAL
============================== -->

<section class="hero" id="inicio">

    <!-- IMAGEM DE FUNDO -->
    <img
        src="assets/images/banner-escolinha.png"
        alt="Crianças participando das atividades esportivas da Escolinha SECTI"
        class="hero-image"
    >

    <!-- SOBREPOSIÇÃO ESCURA -->
    <div class="hero-overlay"></div>

    <!-- CONTEÚDO -->
    <div class="hero-container">

        <div class="hero-content">

            <span class="hero-subtitle">
                ESPORTE • EDUCAÇÃO • CIDADANIA
            </span>

            <div class="hero-title-wrapper">

                <h1 class="hero-title">
                    Escolinha
                    <span>SECTI</span>
                </h1>

            </div>

            <p class="hero-description">
                Mais que esporte, uma oportunidade
                para um futuro melhor!
            </p>

            <a href="#inscricao" class="hero-button">
                Faça sua inscrição
                <span>›</span>
            </a>

        </div>

    </div>

</section>


<!-- ==============================
     SEÇÃO DE MODALIDADES
============================== -->

<section class="modalidades" id="modalidades">

    <div class="modalidades-container">

        <div class="modalidades-header">

            <div class="modalidades-heading">

                <span class="section-subtitle">
                    NOSSAS MODALIDADES
                </span>

                <h2>Escolha sua modalidade</h2>

            </div>

        </div>

       <div class="modalidades-grid">

    <button type="button" class="modalidade-card" data-modalidade="futebol">
        <span class="modalidade-icon">⚽</span>
        <h3>Futebol</h3>
    </button>

    <button type="button" class="modalidade-card" data-modalidade="volei">
        <span class="modalidade-icon">🏐</span>
        <h3>Vôlei</h3>
    </button>

    <button type="button" class="modalidade-card" data-modalidade="handebol">
        <span class="modalidade-icon">🤾</span>
        <h3>Handebol</h3>
    </button>

    <button type="button" class="modalidade-card" data-modalidade="natacao">
        <span class="modalidade-icon">🏊</span>
        <h3>Natação</h3>
    </button>

    <button type="button" class="modalidade-card" data-modalidade="judo">
        <span class="modalidade-icon">🥋</span>
        <h3>Judô</h3>
    </button>

</div>

        </div>

    </div>

</section>

<!-- ==============================
     SEÇÃO SOBRE
============================== -->

<section class="sobre" id="sobre">

    <div class="sobre-container">

        <!-- IMAGEM (troque o arquivo quando gerar a foto) -->
        <div class="sobre-imagem">
            <img
                src="assets/images/sobre-escolinha.png"
                alt="Quadra esportiva da Escolinha SECTI"
            >
        </div>

        <!-- TEXTO -->
        <div class="sobre-conteudo">

            <span class="sobre-subtitle">
                <span class="destaque">SOBRE</span> A
                <span class="destaque">ESCOLINHA</span>
            </span>

            <h2>Incentivando o esporte, construindo valores</h2>

            <p>
                A Escolinha SECTI tem como missão promover o esporte
                como ferramenta de inclusão social, desenvolvimento
                pessoal e bem-estar, oferecendo atividades esportivas
                de qualidade para crianças e jovens de Campina Grande.
            </p>

            <a href="#sobre" class="btn-saiba-mais">
                Saiba mais <span>›</span>
            </a>

        </div>

        <!-- DESTAQUES -->
        <ul class="sobre-destaques">

            <li>
                <span class="destaque-icone">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M8 21h8M12 17v4M7 4h10v5a5 5 0 0 1-10 0V4z"/>
                        <path d="M17 5h3v2a3 3 0 0 1-3 3M7 5H4v2a3 3 0 0 0 3 3"/>
                    </svg>
                </span>
                <span class="destaque-texto">Desenvolvimento esportivo</span>
            </li>

            <li>
                <span class="destaque-icone">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="12" cy="8" r="3"/>
                        <circle cx="5" cy="10" r="2"/>
                        <circle cx="19" cy="10" r="2"/>
                        <path d="M6.5 20v-2a5.5 5.5 0 0 1 11 0v2z"/>
                        <path d="M1.5 18v-1a3.5 3.5 0 0 1 3.5-3.5M22.5 18v-1a3.5 3.5 0 0 0-3.5-3.5"/>
                    </svg>
                </span>
                <span class="destaque-texto">Inclusão social</span>
            </li>

            <li>
                <span class="destaque-icone">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12 20s-7-4.4-9-9.2C1.6 7.4 3.6 4 7 4c2 0 3.5 1.1 5 3 1.5-1.9 3-3 5-3 3.4 0 5.4 3.4 4 6.8C19 15.6 12 20 12 20z"/>
                    </svg>
                </span>
                <span class="destaque-texto">Qualidade de vida</span>
            </li>

            <li>
                <span class="destaque-icone">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12 3l2.7 5.6 6.1.9-4.4 4.3 1 6.1L12 17l-5.4 2.9 1-6.1L3.2 9.5l6.1-.9z"/>
                    </svg>
                </span>
                <span class="destaque-texto">Formação cidadã</span>
            </li>

        </ul>

    </div>

</section>

<!-- ==============================
     INSCRIÇÃO + RODAPÉ
============================== -->

<footer class="footer">

    <!-- PARTE SUPERIOR: CHAMADA PARA INSCRIÇÃO -->
    <div class="footer-cta" id="inscricao">

        <img
            src="assets/images/banner-inscricao.png"
            alt=""
            class="footer-cta-image"
        >

        <div class="footer-cta-overlay"></div>

        <div class="footer-cta-container">

            <div class="footer-cta-title">
                <h2>
                    <span class="linha-leve">Inscreva-se na</span>
                    <span class="linha-forte">Escolinha SECTI</span>
                </h2>
            </div>

            <p class="footer-cta-text">
                Garanta sua vaga e faça parte do nosso projeto.
            </p>

            <a href="#inscricao" class="footer-cta-button">
                Inscrever-se
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M9 4l8 8-8 8"/>
                </svg>
            </a>

        </div>

        <!-- ONDA AMARELA -->
        <svg class="footer-wave" viewBox="0 0 1600 60" preserveAspectRatio="none" aria-hidden="true">
            <path fill="#ffc21a" d="M0,13 C350,40 650,57 900,57 C1200,57 1400,22 1600,4 L1600,60 L0,60 Z"/>
            <path fill="#051f47" d="M0,50 C400,56 700,58 900,58 C1200,58 1400,56 1600,55 L1600,60 L0,60 Z"/>
        </svg>

    </div>

    <!-- PARTE INFERIOR: RODAPÉ -->
    <div class="footer-main" id="contato">

        <div class="footer-main-container">

            <a href="#inicio" class="footer-logo">
                <img
                    src="assets/images/logo-escolinha-secti-branco.png"
                    alt="Escolinha SECTI"
                >
            </a>

            <span class="footer-divider"></span>

            <nav class="footer-nav">
                <a href="#inicio" class="footer-link">Início</a>
                <a href="#modalidades" class="footer-link">Modalidades</a>
                <a href="#sobre" class="footer-link">Sobre</a>
                <a href="#contato" class="footer-link">Contato</a>
                <a href="#" class="footer-link footer-link-destaque">Administrador</a>
            </nav>

            <span class="footer-divider"></span>

            <p class="footer-info">
                Secretaria de Ciência, Tecnologia e Inovação<br>
                Campina Grande – PB
            </p>

            <span class="footer-divider"></span>

            <img
                src="assets/images/brasao-campina-grande.png"
                alt="Brasão de Campina Grande"
                class="footer-brasao"
            >

        </div>

    </div>

</footer>

<!-- ==============================
     MODAL DE MODALIDADE
============================== -->

<!-- Ícones reutilizáveis -->
<svg width="0" height="0" style="position:absolute" aria-hidden="true">

    <symbol id="i-pessoas" viewBox="0 0 48 48">
        <circle cx="24" cy="14" r="6"/>
        <circle cx="11" cy="19" r="4"/>
        <circle cx="37" cy="19" r="4"/>
        <path d="M12 41v-3a12 12 0 0 1 24 0v3z" fill="#ffc21a"/>
        <path d="M3 37v-2a8 8 0 0 1 8-8M45 37v-2a8 8 0 0 0-8-8"/>
    </symbol>

    <symbol id="i-calendario" viewBox="0 0 48 48">
        <rect x="6" y="9" width="36" height="33" rx="5"/>
        <path d="M6 19h36M16 5v7M32 5v7"/>
        <g fill="#ffc21a" stroke="none">
            <circle cx="15" cy="26" r="2.2"/><circle cx="24" cy="26" r="2.2"/><circle cx="33" cy="26" r="2.2"/>
            <circle cx="15" cy="34" r="2.2"/><circle cx="24" cy="34" r="2.2"/><circle cx="33" cy="34" r="2.2"/>
        </g>
    </symbol>

    <symbol id="i-relogio" viewBox="0 0 48 48">
        <circle cx="24" cy="24" r="18"/>
        <path d="M24 12v13l7 5" stroke="#ffc21a"/>
    </symbol>

    <symbol id="i-nivel" viewBox="0 0 48 48">
        <rect x="6" y="30" width="9" height="12" rx="2" fill="#ffc21a"/>
        <rect x="19" y="20" width="9" height="22" rx="2" fill="#ffc21a"/>
        <rect x="32" y="8" width="9" height="34" rx="2" fill="#ffc21a"/>
    </symbol>

    <symbol id="i-trofeu" viewBox="0 0 48 48">
        <path d="M15 6h18v12a9 9 0 0 1-18 0z"/>
        <path d="M15 10H8v3a7 7 0 0 0 7 7M33 10h7v3a7 7 0 0 1-7 7"/>
        <path d="M24 27v8M17 42h14M19 35h10v7"/>
        <path d="M24 10l1.7 3.5 3.8.5-2.8 2.6.7 3.8-3.4-1.8-3.4 1.8.7-3.8-2.8-2.6 3.8-.5z" fill="#ffc21a" stroke="none"/>
    </symbol>

    <symbol id="i-formatura" viewBox="0 0 48 48">
        <path d="M3 18l21-10 21 10-21 10z"/>
        <path d="M12 23v10c0 3 5.5 6 12 6s12-3 12-6V23M42 19v12"/>
    </symbol>

    <symbol id="i-escudo" viewBox="0 0 48 48">
        <path d="M24 5l15 6v11c0 10-6.5 17-15 21-8.500-4-15-11-15-21V11z"/>
        <path d="M17 24l5 5 9-10"/>
    </symbol>

</svg>

<div class="modal-overlay" id="modal-overlay" aria-hidden="true">

    <div class="modal-card"
         role="dialog"
         aria-modal="true"
         aria-labelledby="modal-titulo">

        <button type="button" class="modal-fechar" id="modal-fechar" aria-label="Fechar">
            &times;
        </button>

        <div class="modal-conteudo">

            <!-- LADO ESQUERDO -->
            <div class="modal-esquerda">

                <span class="modal-tag">Modalidade</span>

                <h2 class="modal-titulo" id="modal-titulo">Futebol</h2>

                <p class="modal-descricao" id="modal-descricao"></p>

                <hr class="modal-linha">

                <h3 class="modal-info-titulo">Informações da modalidade</h3>

                <div class="modal-info">

                    <div class="modal-info-item">
                        <svg class="modal-info-icone" aria-hidden="true"><use href="#i-pessoas"/></svg>
                        <span class="modal-info-label">Faixa etária</span>
                        <strong id="modal-faixa"></strong>
                    </div>

                    <div class="modal-info-item">
                        <svg class="modal-info-icone" aria-hidden="true"><use href="#i-calendario"/></svg>
                        <span class="modal-info-label">Dias das aulas</span>
                        <strong id="modal-dias"></strong>
                    </div>

                    <div class="modal-info-item">
                        <svg class="modal-info-icone" aria-hidden="true"><use href="#i-relogio"/></svg>
                        <span class="modal-info-label">Horários</span>
                        <strong id="modal-horarios"></strong>
                    </div>

                    <div class="modal-info-item">
                        <svg class="modal-info-icone" aria-hidden="true"><use href="#i-nivel"/></svg>
                        <span class="modal-info-label">Nível</span>
                        <strong id="modal-nivel"></strong>
                    </div>

                </div>

            </div>

            <!-- LADO DIREITO -->
            <div class="modal-direita">

                <div class="modal-destaques">

                    <div class="modal-destaques-topo">
                        <svg class="modal-destaques-icone" aria-hidden="true"><use href="#i-trofeu"/></svg>
                        <h3>Destaques</h3>
                    </div>

                    <span class="modal-destaques-barra"></span>

                    <ul>
                        <li>
                            <span class="modal-destaque-icone">
                                <svg aria-hidden="true"><use href="#i-formatura"/></svg>
                            </span>
                            <span>Professores qualificados<br>e experientes</span>
                        </li>

                        <li>
                            <span class="modal-destaque-icone">
                                <svg aria-hidden="true"><use href="#i-escudo"/></svg>
                            </span>
                            <span>Ambiente seguro<br>e estruturado</span>
                        </li>

                        <li>
                            <span class="modal-destaque-icone">
                                <svg aria-hidden="true"><use href="#i-pessoas"/></svg>
                            </span>
                            <span>Formação esportiva<br>e cidadã</span>
                        </li>
                    </ul>

                </div>

                <a href="#" class="modal-btn-inscricao" id="modal-btn-inscricao">
                    Realizar Inscrição
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 4l8 8-8 8"/></svg>
                </a>

            </div>

        </div>

    </div>

</div>



    <script src="assets/js/main.js"></script>

</body>
</html>
