<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscrição | Escolinha SECTI</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;1,300;1,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/inscricao.css">
</head>
<body class="pagina-inscricao">

    <!-- CABEÇALHO -->
    <header class="header">

        <div class="header-container">

            <a href="index.php#inicio" class="logo">
                <img src="assets/images/logo-escolinha-secti.png"
                     alt="Escolinha SECTI">
            </a>

            <nav class="nav" id="nav">

                <a href="index.php#inicio" class="nav-link active">Início</a>

                <a href="index.php#modalidades" class="nav-link">Modalidades</a>

                <a href="index.php#sobre" class="nav-link">Sobre</a>

                <a href="index.php#contato" class="nav-link">Contato</a>

                <a href="inscricao.php" class="btn-inscricao-mobile">
                    Inscrever-se <span>›</span>
                </a>

            </nav>

            <a href="inscricao.php" class="btn-inscricao">
                Inscrever-se
                <span>›</span>
            </a>

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


    <!-- BANNER -->
    <section class="ins-hero">

        <div class="ins-hero-container">

            <div class="ins-hero-content">

                <h1>
                    <span class="linha-1">Realize sua</span>
                    <span class="linha-2">Inscrição</span>
                </h1>

                <p>
                    Faça parte da nossa escolinha e descubra o esporte
                    como caminho para um futuro melhor!
                </p>

            </div>

        </div>

        <div class="ins-hero-tiles" aria-hidden="true">

            <div class="ins-tile tile-pessoas">
                <svg class="ic-linha" viewBox="0 0 48 48">
                    <circle cx="24" cy="14" r="6"/>
                    <circle cx="10" cy="20" r="4"/>
                    <circle cx="38" cy="20" r="4"/>
                    <path d="M12 41v-3a12 12 0 0 1 24 0v3z"/>
                    <path d="M2 37v-2a8 8 0 0 1 8-6M46 37v-2a8 8 0 0 0-8-6"/>
                </svg>
            </div>

            <div class="ins-tile tile-trofeu">
                <svg class="ic-linha" viewBox="0 0 48 48">
                    <path d="M15 6h18v12a9 9 0 0 1-18 0z"/>
                    <path d="M15 10H8v3a7 7 0 0 0 7 7M33 10h7v3a7 7 0 0 1-7 7"/>
                    <path d="M24 27v8M17 42h14M19 35h10v7"/>
                    <path d="M24 10l1.7 3.5 3.8.5-2.8 2.6.7 3.8-3.4-1.8-3.4 1.8.7-3.8-2.8-2.6 3.8-.5z" fill="currentColor" stroke="none"/>
                </svg>
            </div>

            <div class="ins-tile tile-calendario">
                <svg class="ic-linha" viewBox="0 0 48 48">
                    <rect x="6" y="9" width="36" height="33" rx="5"/>
                    <path d="M6 19h36M16 5v7M32 5v7"/>
                    <g fill="currentColor" stroke="none">
                        <circle cx="15" cy="26" r="2.2"/>
                        <circle cx="24" cy="26" r="2.2"/>
                        <circle cx="33" cy="26" r="2.2"/>
                        <circle cx="15" cy="34" r="2.2"/>
                        <circle cx="24" cy="34" r="2.2"/>
                    </g>
                </svg>
            </div>

            <div class="ins-tile tile-escudo">
                <svg class="ic-linha" viewBox="0 0 48 48">
                    <path d="M24 5l15 6v11c0 10-6.5 17-15 21-8.5-4-15-11-15-21V11z"/>
                    <path d="M17 24l5 5 9-10"/>
                </svg>
            </div>

        </div>

        <svg class="ins-hero-onda" viewBox="0 0 500 160" preserveAspectRatio="none" aria-hidden="true">
            <defs>
                <linearGradient id="grad-onda" x1="0" y1="1" x2="1" y2="0">
                    <stop offset="0" stop-color="#ffc21a"/>
                    <stop offset="1" stop-color="#f5a800"/>
                </linearGradient>
            </defs>
            <path fill="url(#grad-onda)" d="M0,160 C150,150 360,100 500,8 L500,62 C380,122 200,156 0,160 Z"/>
            <path fill="#051f47" d="M0,160 C200,156 380,122 500,62 L500,160 Z"/>
        </svg>

    </section>


    <!-- CONTEÚDO -->
    <main class="ins-main">

        <div class="ins-container">

            <aside class="ins-sobre">

                <div class="ins-sobre-topo">

                    <span class="ins-icone-caixa">
                        <svg class="ic-linha" viewBox="0 0 48 48" aria-hidden="true">
                            <rect x="7" y="6" width="28" height="36" rx="4"/>
                            <path d="M14 17h14M14 25h10M14 33h6"/>
                            <path d="M43 21L28 36l-6 1 1-6 15-15zM37 18l5 5"/>
                        </svg>
                    </span>

                    <h2>Sobre a Inscrição</h2>

                </div>

                <p class="ins-sobre-texto">
                    A inscrição é rápida e fácil! Preencha os dados ao lado
                    e garanta a vaga do seu filho na modalidade escolhida.
                </p>

                <hr class="ins-linha">

                <ul class="ins-resumo">

                    <li>
                        <span class="ins-icone-amarelo">
                            <svg class="ic-linha" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M15 6h18v12a9 9 0 0 1-18 0z"/>
                                <path d="M15 10H8v3a7 7 0 0 0 7 7M33 10h7v3a7 7 0 0 1-7 7"/>
                                <path d="M24 27v8M17 42h14M19 35h10v7"/>
                            </svg>
                        </span>
                        <div>
                            <span>Modalidade selecionada</span>
                            <strong id="resumo-modalidade">—</strong>
                        </div>
                    </li>

                    <li>
                        <span class="ins-icone-amarelo">
                            <svg class="ic-cheio" viewBox="0 0 48 48" aria-hidden="true">
                                <circle cx="24" cy="14" r="6"/>
                                <circle cx="10" cy="20" r="4.5"/>
                                <circle cx="38" cy="20" r="4.5"/>
                                <path d="M12 41v-2a12 12 0 0 1 24 0v2z"/>
                                <path d="M1 38v-1a8 8 0 0 1 9-8c1.5 0 3 .4 4 1.2-2 2-3 4.5-3 7.8z"/>
                                <path d="M47 38v-1a8 8 0 0 0-9-8c-1.5 0-3 .4-4 1.2 2 2 3 4.5 3 7.8z"/>
                            </svg>
                        </span>
                        <div>
                            <span>Faixa etária</span>
                            <strong id="resumo-faixa">—</strong>
                        </div>
                    </li>

                    <li>
                        <span class="ins-icone-amarelo">
                            <svg class="ic-cheio" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M24 3c-8.5 0-15 6.5-15 15 0 11 15 27 15 27s15-16 15-27c0-8.5-6.5-15-15-15z"/>
                                <circle cx="24" cy="18" r="5.5" fill="#fdf1d3"/>
                            </svg>
                        </span>
                        <div>
                            <span>Local das aulas</span>
                            <strong>Complexo Esportivo SECTI</strong>
                        </div>
                    </li>

                </ul>

                <svg class="ins-sobre-onda" viewBox="0 0 383 80" preserveAspectRatio="none" aria-hidden="true">
                    <path fill="#ffc21a" d="M150,72 C240,64 330,34 383,0 L383,36 C330,58 260,66 190,62 Z"/>
                    <path fill="#0a2a52" d="M0,30 C60,8 130,22 200,54 C270,76 340,56 383,36 L383,80 L0,80 Z"/>
                </svg>

            </aside>

            <form class="ins-form" action="#" method="post" id="form-inscricao">

                <div class="ins-form-topo">

                    <span class="ins-icone-caixa grande">
                        <svg class="ic-cheio" viewBox="0 0 48 48" aria-hidden="true">
                            <circle cx="24" cy="15" r="8"/>
                            <path d="M8 42c0-9 7-14 16-14s16 5 16 14z"/>
                        </svg>
                    </span>

                    <div>
                        <h2>Dados do Aluno</h2>
                        <p>Preencha as informações corretamente.</p>
                    </div>

                </div>

                <div class="ins-grid">

                    <div class="ins-campo">
                        <label for="matricula">Matrícula *</label>
                        <input type="text" id="matricula" name="matricula" placeholder="Ex: 2026001" required>
                    </div>

                    <div class="ins-campo">
                        <label for="nome_aluno">Nome do Aluno *</label>
                        <input type="text" id="nome_aluno" name="nome_aluno" placeholder="Digite o nome completo" required>
                    </div>

                    <div class="ins-campo">
                        <label for="data_nascimento">Data de Nascimento *</label>
                        <div class="ins-campo-icone">
                            <input type="date" id="data_nascimento" name="data_nascimento" required>
                            <svg class="ic-linha ic-direita" viewBox="0 0 48 48" aria-hidden="true">
                                <rect x="6" y="9" width="36" height="33" rx="5"/>
                                <path d="M6 19h36M16 5v7M32 5v7"/>
                                <g fill="currentColor" stroke="none">
                                    <circle cx="15" cy="26" r="2.2"/>
                                    <circle cx="24" cy="26" r="2.2"/>
                                    <circle cx="33" cy="26" r="2.2"/>
                                    <circle cx="15" cy="34" r="2.2"/>
                                    <circle cx="24" cy="34" r="2.2"/>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <div class="ins-campo">
                        <label for="modalidade">Modalidade *</label>
                        <div class="ins-campo-icone">
                            <select id="modalidade" name="modalidade" required>
                                <option value="" selected disabled>Selecione uma modalidade</option>
                                <option value="futebol">Futebol</option>
                                <option value="basquete">Basquete</option>
                                <option value="volei">Vôlei</option>
                                <option value="handebol">Handebol</option>
                                <option value="natacao">Natação</option>
                                <option value="judo">Judô</option>
                            </select>
                            <svg class="ic-linha ic-direita ic-seta" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M10 17l14 14 14-14" stroke-width="5"/>
                            </svg>
                        </div>
                    </div>

                </div>

                <hr class="ins-linha">

                <div class="ins-form-topo responsavel">

                    <span class="ins-icone-caixa">
                        <svg class="ic-cheio" viewBox="0 0 48 48" aria-hidden="true">
                            <circle cx="24" cy="14" r="6"/>
                            <circle cx="10" cy="20" r="4.5"/>
                            <circle cx="38" cy="20" r="4.5"/>
                            <path d="M12 41v-2a12 12 0 0 1 24 0v2z"/>
                            <path d="M1 38v-1a8 8 0 0 1 9-8c1.5 0 3 .4 4 1.2-2 2-3 4.5-3 7.8z"/>
                            <path d="M47 38v-1a8 8 0 0 0-9-8c-1.5 0-3 .4-4 1.2 2 2 3 4.5 3 7.8z"/>
                        </svg>
                    </span>

                    <h2>Dados do Responsável</h2>

                </div>

                <div class="ins-grid responsavel-grid">

                    <div class="ins-campo">
                        <label for="nome_responsavel">Nome do Responsável *</label>
                        <input type="text" id="nome_responsavel" name="nome_responsavel" placeholder="Digite o nome completo" required>
                    </div>

                    <div class="ins-campo">
                        <label for="telefone">Telefone *</label>
                        <input type="tel" id="telefone" name="telefone" placeholder="(83) 99999-9999" maxlength="15" required>
                    </div>

                </div>

                <button type="submit" class="ins-btn-enviar">
                    <svg class="ic-cheio" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M45 3L3 20l14 6 6 15z"/>
                        <path d="M45 3L17 26" stroke="#ffc21a" stroke-width="3"/>
                    </svg>
                    Enviar Inscrição
                </button>

                <p class="ins-seguro">
                    <svg class="ic-linha" viewBox="0 0 48 48" aria-hidden="true">
                        <rect x="10" y="21" width="28" height="21" rx="4"/>
                        <path d="M16 21v-6a8 8 0 0 1 16 0v6"/>
                        <circle cx="24" cy="31" r="2.5" fill="currentColor" stroke="none"/>
                    </svg>
                    Seus dados estão seguros conosco.
                </p>

            </form>

        </div>

    </main>


    <!-- RODAPÉ -->
    <footer class="footer footer-inscricao">

        <div class="footer-main">

            <div class="footer-main-container">

                <a href="index.php#inicio" class="footer-logo">
                    <img
                        src="assets/images/logo-escolinha-secti-branco.png"
                        alt="Escolinha SECTI"
                    >
                </a>

                <span class="footer-divider"></span>

                <nav class="footer-nav">
                    <a href="index.php#inicio" class="footer-link">Início</a>
                    <a href="index.php#modalidades" class="footer-link">Modalidades</a>
                    <a href="index.php#sobre" class="footer-link">Sobre</a>
                    <a href="index.php#contato" class="footer-link">Contato</a>
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

        <div class="footer-admin">

            <a href="#" class="footer-admin-link">
                <svg class="ic-linha" viewBox="0 0 48 48" aria-hidden="true">
                    <rect x="10" y="21" width="28" height="21" rx="4"/>
                    <path d="M16 21v-6a8 8 0 0 1 16 0v6"/>
                    <circle cx="24" cy="31" r="2.5" fill="currentColor" stroke="none"/>
                </svg>
                Área administrativa
            </a>

        </div>

        <svg class="footer-onda" viewBox="0 0 520 80" preserveAspectRatio="none" aria-hidden="true">
            <path fill="#ffc21a" d="M0,80 C220,76 400,40 520,4 L520,46 C400,72 220,80 0,80 Z"/>
        </svg>

    </footer>


    <script src="assets/js/main.js"></script>
    <script src="assets/js/inscricao.js"></script>

</body>
</html>