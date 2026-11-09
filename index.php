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

            </nav>

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

            <a href="#modalidades" class="hero-button">
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

            <h2 class="modalidades-titulo">
                Primeiro, escolha uma <span>modalidade.</span>
            </h2>

            <p class="modalidades-subtitulo">
                Selecione abaixo a modalidade que deseja participar para continuar.
            </p>

        </div>

        <div class="modalidades-grid" id="lista-modalidades-publicas">
    <p>Carregando modalidades...</p>
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
     RODAPÉ
============================== -->

<footer class="rodape" id="contato">

    <!-- PARTE PRINCIPAL -->
    <div class="rodape-principal">

        <!-- Decorações -->
        <svg class="rodape-bloco" viewBox="0 0 420 190" preserveAspectRatio="none" aria-hidden="true">
            <defs>
                <linearGradient id="grad-bloco" x1="0" y1="0" x2="1" y2="1">
                    <stop offset="0" stop-color="#0b2d63"/>
                    <stop offset="1" stop-color="#071f4a"/>
                </linearGradient>
            </defs>
            <path fill="url(#grad-bloco)" d="M0,0 H420 C405,60 340,98 225,122 C130,142 50,158 0,190 Z"/>
        </svg>

        <img
            src="assets/images/figura-rodape.png"
            alt=""
            class="rodape-figura"
            aria-hidden="true"
        >

        <svg class="rodape-onda" viewBox="0 0 385 115" preserveAspectRatio="none" aria-hidden="true">
            <path fill="#ffc21a" d="M0,115 C150,112 300,80 385,0 L385,50 C320,95 200,115 0,115 Z"/>
        </svg>

        <!-- Conteúdo -->
        <div class="rodape-container">

            <!-- Marca -->
            <div class="rodape-marca">

                <a href="#inicio" class="rodape-logo">
                    <img
                        src="assets/images/logo-escolinha-secti-branco.png"
                        alt="Escolinha SECTI"
                    >
                </a>

                <p class="rodape-lema">
                    Incentivando o esporte,<br>
                    construindo valores.
                </p>

            </div>

            <span class="rodape-divisor"></span>

            <!-- Acesso rápido -->
            <nav class="rodape-nav" aria-label="Acesso rápido">

                <h3>Acesso rápido</h3>

                <a href="#inicio">Início</a>
                <a href="#modalidades">Modalidades</a>
                <a href="#sobre">Sobre</a>
                <a href="#contato">Contato</a>
                <a href="#" class="rodape-admin" data-abrir-login>Administrador</a>

            </nav>

            <span class="rodape-divisor"></span>

            <!-- Instituição -->
            <div class="rodape-instituicao">

                <h3>
                    Secretaria de Ciência,<br>
                    Tecnologia e Inovação
                </h3>

                <p>Campina Grande – PB</p>

                <div class="rodape-brasao">

                    <img
                        src="assets/images/brasao-campina-grande.png"
                        alt="Brasão de Campina Grande"
                    >

                    <span>Campina<br>Grande</span>

                </div>

            </div>

        </div>

    </div>

    <!-- BARRA INFERIOR -->
    <div class="rodape-base">

        <div class="rodape-base-container">

            <p class="rodape-copy">
                © <?= date("Y") ?> Escolinha SECTI. Todos os direitos reservados.
            </p>

            <div class="rodape-extra">

                <span class="rodape-local">

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12 2C8.1 2 5 5.1 5 9c0 5.2 7 13 7 13s7-7.800 7-13c0-3.900-3.100-7-7-7zm0 9.500A2.500 2.500 0 1 1 12 6.500a2.500 2.500 0 0 1 0 5z"/>
                    </svg>

                    Campina Grande – PB

                </span>

                <span class="rodape-divisor-curto"></span>

                <div class="rodape-redes">

                    <!-- Troque os # pelos links das redes -->
                    <a href="#" aria-label="Instagram">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <rect x="3" y="3" width="18" height="18" rx="5" fill="none" stroke="currentColor" stroke-width="2"/>
                            <circle cx="12" cy="12" r="4.200" fill="none" stroke="currentColor" stroke-width="2"/>
                            <circle cx="17.300" cy="6.700" r="1.200"/>
                        </svg>
                    </a>

                    <a href="#" aria-label="YouTube">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M21.600 7.200a2.500 2.500 0 0 0-1.800-1.800C18.200 5 12 5 12 5s-6.200 0-7.800.4A2.500 2.500 0 0 0 2.400 7.200C2 8.800 2 12 2 12s0 3.200.4 4.800a2.500 2.500 0 0 0 1.800 1.800C5.800 19 12 19 12 19s6.200 0 7.800-.4a2.500 2.500 0 0 0 1.800-1.800C22 15.200 22 12 22 12s0-3.200-.4-4.800z"/>
                            <path d="M10 9.200v5.600l4.800-2.800z" fill="#04183a"/>
                        </svg>
                    </a>

                    <a href="#" aria-label="Facebook">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M13.500 21v-8h2.700l.4-3.200h-3.100V7.800c0-.9.3-1.500 1.600-1.500h1.700V3.400C16.500 3.300 15.500 3.200 14.400 3.200c-2.400 0-4 1.400-4 4.100v2.500H7.700V13h2.700v8z"/>
                        </svg>
                    </a>

                </div>

            </div>

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

<!-- ==============================
     MODAL DE LOGIN (ADMINISTRADOR)
============================== -->

<div class="login-overlay" id="login-overlay" aria-hidden="true">

    <div class="login-card"
         role="dialog"
         aria-modal="true"
         aria-labelledby="login-titulo">

        <button type="button" class="login-fechar" id="login-fechar" aria-label="Fechar">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M5 5l14 14M19 5L5 19"/>
            </svg>
        </button>

        <!-- LADO ESQUERDO -->
        <div class="login-lado">

            <svg class="login-arco" viewBox="0 0 162 138" aria-hidden="true">
                <path fill="#ffc21a" d="M0,0 C70,22 130,75 162,138 L82,138 C62,108 32,90 0,80 Z"/>
            </svg>

            <div class="login-lado-conteudo">

                <img
                    src="assets/images/logo-escolinha-secti-branco.png"
                    alt="Escolinha SECTI"
                    class="login-logo"
                >

                <span class="login-traco"></span>

                <h3>
                    Acesso restrito<br>
                    para <span>administradores</span>
                </h3>

                <p>
                    Faça login para acessar<br>
                    o painel administrativo.
                </p>

            </div>

        </div>

        <!-- LADO DIREITO -->
        <div class="login-area">

            <h2 class="login-titulo" id="login-titulo">Bem-vindo de volta!</h2>

            <p class="login-sub">Entre com suas credenciais para continuar.</p>

            <form class="login-form" action="#" method="post" id="form-login">

                <div class="login-campo">
                    <svg class="login-icone" viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="12" cy="8" r="4.2"/>
                        <path d="M4 21c0-4.6 3.6-7.5 8-7.5s8 2.9 8 7.5z"/>
                    </svg>
                    <input type="text" id="login-usuario" name="usuario" placeholder="Usuário" autocomplete="username" required>
                </div>

                <div class="login-campo">
                    <svg class="login-icone" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7 10V7.5a5 5 0 0 1 10 0V10h.5A1.500 1.500 0 0 1 19 11.500v8a1.500 1.500 0 0 1-1.500 1.500h-11A1.500 1.500 0 0 1 5 19.500v-8A1.500 1.500 0 0 1 6.500 10H7zm2.200 0h5.600V7.500a2.800 2.800 0 0 0-5.600 0V10z"/>
                    </svg>
                    <input type="password" id="login-senha" name="senha" placeholder="Senha" autocomplete="current-password" required>

                    <button type="button" class="login-olho" id="login-olho" aria-label="Mostrar senha">

                        <svg class="olho-fechado" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M2 12s3.600-7 10-7 10 7 10 7-3.600 7-10 7S2 12 2 12z"/>
                            <circle cx="12" cy="12" r="3"/>
                            <path d="M4 4l16 16"/>
                        </svg>

                        <svg class="olho-aberto" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M2 12s3.600-7 10-7 10 7 10 7-3.600 7-10 7S2 12 2 12z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>

                    </button>
                </div>
                <p class="login-erro" id="login-erro" role="alert" hidden></p>
                <button type="submit" class="login-btn">
                    Entrar
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M5 12h14M13 6l6 6-6 6"/>
                    </svg>
                </button>

            </form>

            <div class="login-marca">
                <img src="assets/images/logo-secti-curta.png" alt="SECTI">
            </div>

        </div>

    </div>

</div>


    <script src="assets/js/main.js"></script>

</body>
</html>