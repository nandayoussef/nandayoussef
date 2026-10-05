<?php
/**
 * Portfólio Profissional Bilíngue - Fernanda (Nanda) Youssef
 * Web Developer | Front-End & PHP / MySQL
 */

require_once __DIR__ . '/config.php';
$projects = getProjects();
$dbConnected = (getDbConnection() !== null);
?>
<!DOCTYPE html>
<html lang="pt-BR" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- SEO Primary Meta Tags -->
  <title>Fernanda Youssef | Desenvolvedora Web & UI/UX</title>
  <meta name="title" content="Fernanda Youssef | Desenvolvedora Web & UI/UX">
  <meta name="description" content="Portfólio de Fernanda (Nanda) Youssef. Desenvolvedora Web com foco em PHP, MySQL, JavaScript e design de alto padrão.">
  <meta name="keywords" content="Fernanda Youssef, Nanda Youssef, Desenvolvedora Web, Web Developer, PHP, MySQL, JavaScript, Front-end, Portfólio">
  <meta name="author" content="Fernanda Youssef">
  <meta name="robots" content="index, follow">

  <!-- Open Graph / Facebook / WhatsApp -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="http://localhost/nandayoussef/">
  <meta property="og:title" content="Fernanda Youssef | Desenvolvedora Web">
  <meta property="og:description" content="Desenvolvendo experiências digitais modernas, elegantes e funcionais. Conheça meus projetos em PHP, MySQL e Front-End.">
  <meta property="og:image" content="assets/images/nanda_portrait.jpg">

  <!-- Favicon / Touch Icon -->
  <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>✨</text></svg>">

  <!-- Google Fonts Preconnect -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <!-- Ambient Glow & Background Pattern -->
  <div class="ambient-glow" aria-hidden="true">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
  </div>
  <div class="ambient-grid" aria-hidden="true"></div>

  <!-- Header & Navigation Bar -->
  <header class="navbar" id="headerNavbar">
    <div class="container navbar-container">
      <a href="#hero" class="brand-logo" id="brandLogoLink">
        <div class="logo-monogram">NY</div>
        <div class="logo-text">
          <span class="logo-title">FERNANDA YOUSSEF</span>
          <span class="logo-tag">WEB DEVELOPER</span>
        </div>
      </a>

      <!-- Overlay backdrop para fechar o menu mobile ao tocar fora -->
      <div class="nav-backdrop" id="navBackdrop" aria-hidden="true"></div>

      <nav aria-label="Navegação Principal">
        <ul class="nav-menu" id="navMenu">
          <li><a href="#hero" class="nav-link active" data-i18n="nav_home">Início</a></li>
          <li><a href="#about" class="nav-link" data-i18n="nav_about">Sobre</a></li>
          <li><a href="#projects" class="nav-link" data-i18n="nav_projects">Projetos</a></li>
          <li><a href="#skills" class="nav-link" data-i18n="nav_skills">Habilidades</a></li>
          <li><a href="#journey" class="nav-link" data-i18n="nav_journey">Trajetória</a></li>
          <li><a href="#contact" class="nav-link" data-i18n="nav_contact">Contato</a></li>
          <li class="mobile-cta-item">
            <a href="#contact" class="btn btn-primary btn-sm mobile-menu-cta" data-i18n="nav_cta">
              Fale Comigo &rarr;
            </a>
          </li>
        </ul>
      </nav>

      <div class="nav-actions">
        <!-- Seletor Bilíngue (Bandeiras PT / EN) -->
        <div class="lang-switcher" id="langSwitcher" role="group" aria-label="Seletor de Idioma">
          <button type="button" class="lang-btn active" data-lang="pt" title="Português">
            <span class="flag-icon">🇧🇷</span>
            <span class="lang-code">PT</span>
          </button>
          <button type="button" class="lang-btn" data-lang="en" title="English">
            <span class="flag-icon">🇺🇸</span>
            <span class="lang-code">EN</span>
          </button>
        </div>

        <!-- Alternador Dark / Light Mode -->
        <button type="button" class="theme-toggle" id="themeToggle" aria-label="Alternar tema de cores" title="Modo Claro / Escuro">
          ☀️
        </button>

        <a href="#contact" class="btn btn-primary btn-sm nav-cta-btn" id="navContactCta" data-i18n="nav_cta">
          Fale Comigo
        </a>

        <button type="button" class="mobile-toggle" id="mobileToggle" aria-label="Abrir Menu">
          ☰
        </button>
      </div>
    </div>
  </header>

  <main>
    <!-- Hero Section -->
    <section class="hero-section" id="hero">
      <div class="container hero-grid">
        <div class="hero-content hero-animate-left">
          <div class="hero-badge">
            <span class="status-dot"></span>
            <span data-i18n="hero_badge">Iniciando Novos Projetos Web</span>
          </div>

          <h1 class="hero-title">
            <span data-i18n="hero_title_prefix">Transformando ideias em código com</span> <span class="text-gradient" data-i18n="hero_title_accent">elegância & técnica.</span>
          </h1>

          <div class="role-ticker-wrapper">
            <span id="roleTicker"></span><span class="typed-cursor">|</span>
          </div>

          <p class="hero-description" data-i18n="hero_desc">
            Olá! Sou a <strong>Fernanda (Nanda) Youssef</strong>. Estou iniciando minha jornada no desenvolvimento web, construindo aplicações dinâmicas com <strong>PHP</strong>, <strong>MySQL</strong> e interfaces sofisticadas com <strong>JavaScript, HTML5 e CSS3</strong>.
          </p>

          <div class="hero-cta-group">
            <a href="#projects" class="btn btn-primary" id="heroViewProjectsBtn">
              <span data-i18n="hero_btn_projects">Ver Projetos</span>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17l9.2-9.2M17 17V8H8"/></svg>
            </a>
            <a href="#contact" class="btn btn-outline" id="heroContactBtn" data-i18n="hero_btn_contact">
              Iniciar Conversa
            </a>
          </div>

          <div class="hero-socials">
            <a href="https://github.com/nandayoussef" target="_blank" rel="noopener noreferrer" class="social-icon-btn" title="GitHub">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
            </a>
            <a href="https://linkedin.com/in/nandayoussef" target="_blank" rel="noopener noreferrer" class="social-icon-btn" title="LinkedIn">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
            </a>
            <a href="https://wa.me/5511999999999" target="_blank" rel="noopener noreferrer" class="social-icon-btn" title="WhatsApp">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
            </a>
          </div>
        </div>

        <!-- Hero Visual: Portrait + Floating Badges + Developer Terminal -->
        <div class="hero-visual hero-animate-right">
          <div class="portrait-frame-container">
            <div class="portrait-glow"></div>
            <div class="portrait-card">
              <img src="assets/images/nanda_portrait.jpg" alt="Foto de Fernanda (Nanda) Youssef" class="portrait-img">
            </div>

            <!-- Floating Badges -->
            <div class="floating-badge badge-top-left">
              <div class="badge-icon">💻</div>
              <div>
                <div class="badge-text-title" data-i18n="hero_badge_stack_title">Stack Moderna</div>
                <div class="badge-text-sub" data-i18n="hero_badge_stack_sub">PHP 8 & MySQL</div>
              </div>
            </div>

            <div class="floating-badge badge-bottom-right">
              <div class="badge-icon">✨</div>
              <div>
                <div class="badge-text-title" data-i18n="hero_badge_design_title">Design Sofisticado</div>
                <div class="badge-text-sub" data-i18n="hero_badge_design_sub">UI/UX & Código Limpo</div>
              </div>
            </div>
          </div>

          <!-- Interactive Developer Code Widget -->
          <div class="dev-terminal-widget hero-animate-up" id="terminalWidget">
            <div class="terminal-header">
              <div class="terminal-dots">
                <span class="dot dot-red"></span>
                <span class="dot dot-yellow"></span>
                <span class="dot dot-green"></span>
              </div>
              <div class="terminal-title">FernandaYoussef.php</div>
              <div style="display: flex; gap: 8px;">
                <button type="button" class="btn btn-outline btn-sm" id="copyCodeBtn" style="padding: 4px 10px; font-size: 0.7rem;" data-i18n="hero_terminal_copy">Copiar</button>
                <button type="button" class="btn btn-primary btn-sm" id="runCodeBtn" style="padding: 4px 10px; font-size: 0.7rem;" data-i18n="hero_terminal_run">Executar ▶</button>
              </div>
            </div>
            <div class="terminal-body">
              <span class="code-keyword">&lt;?php</span><br>
              <span class="code-keyword">namespace</span> <span class="code-class">Dev</span>;<br><br>
              <span class="code-keyword">class</span> <span class="code-class">FernandaYoussef</span> {<br>
              &nbsp;&nbsp;<span class="code-keyword">public string</span> <span class="code-var">$status</span> = <span class="code-str" data-i18n="hero_terminal_status">"Criando projetos web modernos"</span>;<br>
              &nbsp;&nbsp;<span class="code-keyword">public array</span> <span class="code-var">$stack</span> = [<span class="code-str">"PHP 8"</span>, <span class="code-str">"MySQL"</span>, <span class="code-str">"JavaScript"</span>, <span class="code-str">"CSS3"</span>];<br><br>
              &nbsp;&nbsp;<span class="code-keyword">public function</span> <span class="code-class">buildSolution</span>(): <span class="code-keyword">void</span> {<br>
              &nbsp;&nbsp;&nbsp;&nbsp;<span class="code-comment" data-i18n="hero_terminal_comment">// Criando soluções sob medida com estética impecável</span><br>
              &nbsp;&nbsp;}<br>
              }<br>
              <div id="terminalOutput" style="display: none; margin-top: 10px; padding-top: 10px; border-top: 1px dashed rgba(255,255,255,0.15);"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section id="about">
      <div class="container">
        <div class="section-tag reveal" data-i18n="about_tag">Minha Jornada</div>
        <h2 class="section-title reveal">
          <span data-i18n="about_title_prefix">Sobre</span> <span class="text-gradient">Fernanda Youssef</span>
        </h2>
        
        <div class="about-grid">
          <div class="about-narrative reveal-left">
            <p data-i18n="about_p1">
              Sou apaixonada por dar vida a ideias através da tecnologia. Minha missão é unir a <strong>precisão lógica da programação</strong> com a <strong>sensibilidade estética do design</strong>.
            </p>
            <p data-i18n="about_p2">
              Estou iniciando com determinação total no ecossistema do <strong>desenvolvimento web</strong>, focando em construir bases sólidas: código semântico e acessível no front-end, e uma arquitetura robusta no back-end com <strong>PHP e banco de dados MySQL</strong>.
            </p>
            <p data-i18n="about_p3">
              Acredito que cada linha de código deve servir a um propósito: entregar uma experiência intuitiva, elegante e memorável para o usuário final.
            </p>
            <div style="margin-top: 24px;">
              <a href="#contact" class="btn btn-outline" data-i18n="about_cta">Vamos criar algo juntos &rarr;</a>
            </div>
          </div>

          <div class="about-pillars stagger-parent">
            <div class="pillar-card reveal">
              <div class="pillar-number">01</div>
              <h3 class="pillar-title" data-i18n="pillar_1_title">Código Limpo & Semântico</h3>
              <p class="pillar-desc" data-i18n="pillar_1_desc">Estruturação focada em boas práticas, SEO, velocidade de carregamento e facilidade de manutenção.</p>
            </div>

            <div class="pillar-card reveal">
              <div class="pillar-number">02</div>
              <h3 class="pillar-title" data-i18n="pillar_2_title">Design Sofisticado</h3>
              <p class="pillar-desc" data-i18n="pillar_2_desc">Paletas harmoniosas, tipografia editorial e micro-interações que elevam a percepção de valor.</p>
            </div>

            <div class="pillar-card reveal">
              <div class="pillar-number">03</div>
              <h3 class="pillar-title" data-i18n="pillar_3_title">Back-End PHP & MySQL</h3>
              <p class="pillar-desc" data-i18n="pillar_3_desc">Modelagem relacional de dados, segurança com PDO e desenvolvimento estruturado.</p>
            </div>

            <div class="pillar-card reveal">
              <div class="pillar-number">04</div>
              <h3 class="pillar-title" data-i18n="pillar_4_title">Evolução Contínua</h3>
              <p class="pillar-desc" data-i18n="pillar_4_desc">Estudo diário das tendências e tecnologias que movimentam a indústria de tecnologia global.</p>
            </div>
          </div>
        </div>

        <!-- Highlights Banner -->
        <div class="stats-banner reveal-scale">
          <div class="stat-item">
            <div class="stat-num">100%</div>
            <div class="stat-label" data-i18n="stat_dedication">Dedicação & Foco</div>
          </div>
          <div class="stat-item">
            <div class="stat-num"><?= count($projects) ?>+</div>
            <div class="stat-label" data-i18n="stat_projects">Projetos & Conceitos</div>
          </div>
          <div class="stat-item">
            <div class="stat-num">Full</div>
            <div class="stat-label" data-i18n="stat_stack">Stack em Formação</div>
          </div>
          <div class="stat-item">
            <div class="stat-num">24/7</div>
            <div class="stat-label" data-i18n="stat_passion">Paixão por Aprender</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Projects Section -->
    <section id="projects">
      <div class="container">
        <div class="projects-header reveal">
          <div>
            <div class="section-tag" data-i18n="projects_tag">Portfólio em Construção</div>
            <h2 class="section-title">
              <span data-i18n="projects_title_prefix">Projetos &</span> <span class="text-gradient" data-i18n="projects_title_accent">Criações Digitais</span>
            </h2>
            <p class="section-subtitle" data-i18n="projects_subtitle">
              Uma seleção de projetos, protótipos e sistemas desenvolvidos para explorar o potencial do PHP, MySQL e front-end moderno.
            </p>
          </div>

          <!-- Category Filters -->
          <div class="project-filters">
            <button type="button" class="filter-btn active" data-filter="all" data-i18n="filter_all">Todos</button>
            <button type="button" class="filter-btn" data-filter="saas" data-i18n="filter_saas">Web Apps & SaaS</button>
            <button type="button" class="filter-btn" data-filter="ecommerce" data-i18n="filter_ecommerce">E-Commerce</button>
            <button type="button" class="filter-btn" data-filter="landing" data-i18n="filter_landing">Landing Pages</button>
            <button type="button" class="filter-btn" data-filter="branding" data-i18n="filter_branding">Identidade & Web</button>
          </div>
        </div>

        <!-- Projects Grid -->
        <div class="projects-grid stagger-parent" id="projectsGrid">
          <?php foreach ($projects as $project): ?>
            <article class="project-card reveal" 
              data-category="<?= htmlspecialchars($project['category_slug']) ?>"
              data-cat-pt="<?= htmlspecialchars($project['category']) ?>"
              data-cat-en="<?= htmlspecialchars($project['category_en'] ?? $project['category']) ?>"
              data-desc-pt="<?= htmlspecialchars($project['description']) ?>"
              data-desc-en="<?= htmlspecialchars($project['description_en'] ?? $project['description']) ?>"
              data-details-pt="<?= htmlspecialchars($project['details'] ?? $project['description']) ?>"
              data-details-en="<?= htmlspecialchars($project['details_en'] ?? $project['details'] ?? $project['description']) ?>"
              data-status-pt="<?= htmlspecialchars($project['status']) ?>"
              data-status-en="<?= htmlspecialchars($project['status_en'] ?? $project['status']) ?>"
              data-demo="<?= htmlspecialchars($project['demo_url'] ?? '#') ?>" 
              data-github="<?= htmlspecialchars($project['github_url'] ?? '#') ?>">
              
              <div class="project-thumbnail-wrapper">
                <img src="<?= htmlspecialchars($project['image_url']) ?>" alt="<?= htmlspecialchars($project['title']) ?>" class="project-img" loading="lazy">
                <span class="project-category-badge"><?= htmlspecialchars($project['category']) ?></span>
                <span class="project-status-badge"><?= htmlspecialchars($project['status']) ?></span>
              </div>
              
              <div class="project-body">
                <h3 class="project-title"><?= htmlspecialchars($project['title']) ?></h3>
                <p class="project-desc"><?= htmlspecialchars($project['description']) ?></p>

                <div class="tech-tags">
                  <?php if (!empty($project['technologies'])): ?>
                    <?php foreach ($project['technologies'] as $tech): ?>
                      <span class="tech-tag"><?= htmlspecialchars(trim($tech)) ?></span>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>

                <div class="project-footer">
                  <button type="button" class="btn btn-outline btn-sm btn-view-details" data-i18n="btn_details">
                    Ver Detalhes &rarr;
                  </button>
                  <div class="project-links">
                    <a href="<?= htmlspecialchars($project['github_url']) ?>" target="_blank" rel="noopener noreferrer" class="btn-icon-link" title="Repositório GitHub">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                    </a>
                  </div>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Skills Section -->
    <section id="skills">
      <div class="container">
        <div class="section-tag reveal" data-i18n="skills_tag">Competências</div>
        <h2 class="section-title reveal">
          <span data-i18n="skills_title_prefix">Habilidades &</span> <span class="text-gradient" data-i18n="skills_title_accent">Tecnologias</span>
        </h2>
        <p class="section-subtitle reveal" data-i18n="skills_subtitle">
          As ferramentas e tecnologias que utilizo para transformar desafios em aplicações funcionais e bem estruturadas.
        </p>

        <div class="skills-grid stagger-parent">
          <!-- Front-End -->
          <div class="skill-category-card reveal">
            <div class="skill-category-header">
              <div class="skill-cat-icon">🎨</div>
              <h3 class="skill-cat-title" data-i18n="skills_cat_front">Front-End Moderno</h3>
            </div>
            <div class="skill-items-list">
              <div class="skill-item">
                <div class="skill-info">
                  <span class="skill-name">HTML5 Semântico & Acessibilidade</span>
                  <span class="skill-percent">95%</span>
                </div>
                <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="95%" style="width: 95%;"></div></div>
              </div>

              <div class="skill-item">
                <div class="skill-info">
                  <span class="skill-name">CSS3, Flexbox & CSS Grid</span>
                  <span class="skill-percent">90%</span>
                </div>
                <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="90%" style="width: 90%;"></div></div>
              </div>

              <div class="skill-item">
                <div class="skill-info">
                  <span class="skill-name">JavaScript Moderno (ES6+)</span>
                  <span class="skill-percent">80%</span>
                </div>
                <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="80%" style="width: 80%;"></div></div>
              </div>

              <div class="skill-item">
                <div class="skill-info">
                  <span class="skill-name">Design Responsivo & Mobile First</span>
                  <span class="skill-percent">92%</span>
                </div>
                <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="92%" style="width: 92%;"></div></div>
              </div>
            </div>
          </div>

          <!-- Back-End & Dados -->
          <div class="skill-category-card reveal">
            <div class="skill-category-header">
              <div class="skill-cat-icon">⚙️</div>
              <h3 class="skill-cat-title" data-i18n="skills_cat_back">Back-End & Banco de Dados</h3>
            </div>
            <div class="skill-items-list">
              <div class="skill-item">
                <div class="skill-info">
                  <span class="skill-name">PHP 8+ Estruturado & POO</span>
                  <span class="skill-percent">82%</span>
                </div>
                <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="82%" style="width: 82%;"></div></div>
              </div>

              <div class="skill-item">
                <div class="skill-info">
                  <span class="skill-name">MySQL / Modelagem Relacional</span>
                  <span class="skill-percent">78%</span>
                </div>
                <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="78%" style="width: 78%;"></div></div>
              </div>

              <div class="skill-item">
                <div class="skill-info">
                  <span class="skill-name">PDO & Boas Práticas de Segurança</span>
                  <span class="skill-percent">80%</span>
                </div>
                <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="80%" style="width: 80%;"></div></div>
              </div>

              <div class="skill-item">
                <div class="skill-info">
                  <span class="skill-name">Integração de APIs REST & JSON</span>
                  <span class="skill-percent">75%</span>
                </div>
                <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="75%" style="width: 75%;"></div></div>
              </div>
            </div>
          </div>

          <!-- Workflow & Ferramentas -->
          <div class="skill-category-card reveal">
            <div class="skill-category-header">
              <div class="skill-cat-icon">🚀</div>
              <h3 class="skill-cat-title" data-i18n="skills_cat_tools">Ferramentas & Workflow</h3>
            </div>
            <div class="skill-items-list">
              <div class="skill-item">
                <div class="skill-info">
                  <span class="skill-name">Git & Controle de Versão GitHub</span>
                  <span class="skill-percent">85%</span>
                </div>
                <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="85%" style="width: 85%;"></div></div>
              </div>

              <div class="skill-item">
                <div class="skill-info">
                  <span class="skill-name">Ambiente XAMPP & Apache Local</span>
                  <span class="skill-percent">90%</span>
                </div>
                <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="90%" style="width: 90%;"></div></div>
              </div>

              <div class="skill-item">
                <div class="skill-info">
                  <span class="skill-name">Figma & Prototipagem UI/UX</span>
                  <span class="skill-percent">85%</span>
                </div>
                <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="85%" style="width: 85%;"></div></div>
              </div>

              <div class="skill-item">
                <div class="skill-info">
                  <span class="skill-name">VS Code, Extensões & Produtividade</span>
                  <span class="skill-percent">95%</span>
                </div>
                <div class="skill-bar-bg"><div class="skill-bar-fill" data-width="95%" style="width: 95%;"></div></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Journey Section -->
    <section id="journey">
      <div class="container">
        <div class="section-tag reveal" style="display: block; width: fit-content; margin: 0 auto 16px;" data-i18n="journey_tag">Passo a Passo</div>
        <h2 class="section-title reveal" style="text-align: center;">
          <span data-i18n="journey_title_prefix">Minha</span> <span class="text-gradient" data-i18n="journey_title_accent">Evolução no Desenvolvimento</span>
        </h2>
        <p class="section-subtitle reveal" style="text-align: center; margin-left: auto; margin-right: auto;" data-i18n="journey_subtitle">
          Cada etapa da minha formação é guiada pela paixão em construir projetos reais e resolver problemas práticos.
        </p>

        <div class="timeline">
          <div class="timeline-item reveal-left">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
              <div class="timeline-date" data-i18n="journey_1_date">Fase 1 • Primeiros Passos</div>
              <h3 class="timeline-title" data-i18n="journey_1_title">O Despertar para a Programação</h3>
              <p class="timeline-desc" data-i18n="journey_1_desc">
                Iniciei compreendendo os fundamentos da web: como a internet funciona, lógica computacional e a criação das primeiras páginas estruturadas com HTML5 semântico e estilização refinada com CSS3.
              </p>
            </div>
          </div>

          <div class="timeline-item reveal-right">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
              <div class="timeline-date" data-i18n="journey_2_date">Fase 2 • Dinamismo & UX</div>
              <h3 class="timeline-title" data-i18n="journey_2_title">Interatividade com JavaScript</h3>
              <p class="timeline-desc" data-i18n="journey_2_desc">
                Evolução para manipulação avançada de DOM, requisições assíncronas com Fetch API, animações personalizadas e adaptação dos layouts para qualquer tamanho de tela com foco na experiência do usuário.
              </p>
            </div>
          </div>

          <div class="timeline-item reveal-left">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
              <div class="timeline-date" data-i18n="journey_3_date">Fase 3 • O Mundo dos Dados</div>
              <h3 class="timeline-title" data-i18n="journey_3_title">Back-End com PHP & MySQL</h3>
              <p class="timeline-desc" data-i18n="journey_3_desc">
                Aprofundamento na construção de sistemas dinâmicos no servidor: conexões seguras com PDO, modelagem relacional de tabelas, autenticação, CRUDs completos e estruturação de APIs para o front-end.
              </p>
            </div>
          </div>

          <div class="timeline-item reveal-right">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
              <div class="timeline-date" data-i18n="journey_4_date">Fase 4 • Presente & Futuro</div>
              <h3 class="timeline-title" data-i18n="journey_4_title">Criação de Projetos de Alto Valor</h3>
              <p class="timeline-desc" data-i18n="journey_4_desc">
                Desenvolvimento de soluções web completas, prontas para o mercado, combinando interfaces elegantes com arquitetura confiável de software. Pronta para novas oportunidades e parcerias!
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
      <div class="container">
        <div class="section-tag reveal" data-i18n="contact_tag">Conecte-se Comigo</div>
        <h2 class="section-title reveal">
          <span data-i18n="contact_title_prefix">Vamos Iniciar um</span> <span class="text-gradient" data-i18n="contact_title_accent">Novo Projeto?</span>
        </h2>
        <p class="section-subtitle reveal" data-i18n="contact_subtitle">
          Tem uma ideia, proposta ou gostaria de conversar sobre oportunidades? Envie uma mensagem abaixo ou me chame diretamente no WhatsApp.
        </p>

        <div class="contact-grid">
          <!-- Informações de Contato -->
          <div class="contact-info-card reveal-left">
            <h3 style="font-family: var(--font-serif); font-size: 1.5rem; margin-bottom: 12px; color: var(--text-main);" data-i18n="contact_channels_title">
              Canais Diretos
            </h3>
            <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;" data-i18n="contact_channels_desc">
              Estou sempre aberta a novas conexões, colaborações e desafios na área de desenvolvimento web.
            </p>

            <div class="contact-channels">
              <a href="https://wa.me/5511999999999" target="_blank" rel="noopener noreferrer" class="channel-item">
                <div class="channel-icon">💬</div>
                <div>
                  <div class="channel-title">WhatsApp</div>
                  <div class="channel-value">+55 (11) 99999-9999</div>
                </div>
              </a>

              <a href="mailto:contato@nandayoussef.com.br" class="channel-item">
                <div class="channel-icon">✉️</div>
                <div>
                  <div class="channel-title" data-i18n="contact_channel_email">E-mail Profissional</div>
                  <div class="channel-value">contato@nandayoussef.com.br</div>
                </div>
              </a>

              <a href="https://github.com/nandayoussef" target="_blank" rel="noopener noreferrer" class="channel-item">
                <div class="channel-icon">💻</div>
                <div>
                  <div class="channel-title">GitHub</div>
                  <div class="channel-value">github.com/nandayoussef</div>
                </div>
              </a>

              <a href="https://linkedin.com/in/nandayoussef" target="_blank" rel="noopener noreferrer" class="channel-item">
                <div class="channel-icon">💼</div>
                <div>
                  <div class="channel-title">LinkedIn</div>
                  <div class="channel-value">linkedin.com/in/nandayoussef</div>
                </div>
              </a>
            </div>

            <?php if ($dbConnected): ?>
              <div style="margin-top: 32px; padding: 12px 16px; border-radius: 12px; background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.3); font-size: 0.8rem; color: #34d399; display: flex; align-items: center; justify-content: space-between;">
                <div style="display: flex; align-items: center; gap: 8px;">
                  <span>🟢</span>
                  <span data-i18n="contact_db_connected">Banco de dados MySQL conectado e ativo.</span>
                </div>
                <a href="mensagens.php" class="btn btn-outline btn-sm" style="padding: 3px 8px; font-size: 0.72rem;">Ver Mensagens</a>
              </div>
            <?php else: ?>
              <div style="margin-top: 32px; padding: 12px 16px; border-radius: 12px; background: rgba(212, 175, 55, 0.1); border: 1px solid rgba(212, 175, 55, 0.3); font-size: 0.8rem; color: var(--gold-primary); display: flex; align-items: center; justify-content: space-between;">
                <span data-i18n="contact_db_setup">⚙️ Configurar banco de dados MySQL</span>
                <a href="setup_db.php" class="btn btn-outline btn-sm" style="padding: 4px 10px; font-size: 0.75rem;" data-i18n="contact_db_btn">Configurar</a>
              </div>
            <?php endif; ?>
          </div>

          <!-- Formulário de Contato -->
          <div class="contact-form-card reveal-right">
            <h3 style="font-family: var(--font-serif); font-size: 1.5rem; margin-bottom: 24px; color: var(--text-main);" data-i18n="contact_form_title">
              Enviar Mensagem
            </h3>

            <form id="contactForm">
              <div class="form-group">
                <label for="name" class="form-label" data-i18n="contact_label_name">Seu Nome *</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Ex: Maria Clara" data-i18n-ph="contact_ph_name" required>
              </div>

              <div class="form-group">
                <label for="email" class="form-label" data-i18n="contact_label_email">Seu E-mail *</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Ex: maria@email.com" data-i18n-ph="contact_ph_email" required>
              </div>

              <div class="form-group">
                <label for="subject" class="form-label" data-i18n="contact_label_subject">Assunto</label>
                <input type="text" id="subject" name="subject" class="form-control" placeholder="Ex: Proposta de Projeto / Oportunidade" data-i18n-ph="contact_ph_subject">
              </div>

              <div class="form-group">
                <label for="message" class="form-label" data-i18n="contact_label_message">Sua Mensagem *</label>
                <textarea id="message" name="message" class="form-control" placeholder="Conte-me sobre o seu projeto ou ideia..." data-i18n-ph="contact_ph_message" required></textarea>
              </div>

              <button type="submit" class="btn btn-primary" id="submitBtn" style="width: 100%;" data-i18n="contact_btn_submit">
                Enviar Mensagem &rarr;
              </button>

              <div id="formFeedback" class="form-feedback" role="alert"></div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Interactive Project Modal -->
  <div class="modal-backdrop" id="projectModal" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="modal-container">
      <button type="button" class="modal-close-btn" id="modalClose" aria-label="Fechar Modal">✕</button>
      <div class="modal-image-wrapper">
        <img src="" alt="" class="modal-image" id="modalImage">
      </div>
      <div class="modal-body">
        <div class="modal-category" id="modalCategory">Categoria</div>
        <h3 class="modal-title" id="modalTitle">Título do Projeto</h3>
        <p class="modal-text" id="modalText">Detalhes completos do projeto...</p>
        <div class="tech-tags" id="modalTechTags" style="margin-bottom: 24px;"></div>
        <div class="modal-actions">
          <a href="#" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm" id="modalDemoLink" data-i18n="modal_demo_btn">
            Visualizar Demonstração &rarr;
          </a>
          <a href="#" target="_blank" rel="noopener noreferrer" class="btn btn-outline btn-sm" id="modalGithubLink" data-i18n="modal_code_btn">
            Ver Código no GitHub
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Privacy Policy & LGPD Modal -->
  <div class="modal-backdrop" id="privacyModal" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="modal-container modal-privacy-container">
      <button type="button" class="modal-close-btn" id="privacyModalClose" aria-label="Fechar Modal">✕</button>
      <div class="modal-body">
        <div class="modal-category" data-i18n="privacy_badge">Conformidade & LGPD</div>
        <h3 class="modal-title" data-i18n="privacy_title">Privacidade & Proteção de Dados</h3>
        <div class="privacy-modal-content" data-i18n="privacy_body">
          <!-- Conteúdo populado dinamicamente via JS / i18n -->
        </div>
        <div class="modal-actions" style="margin-top: 24px; justify-content: flex-end;">
          <button type="button" class="btn btn-primary btn-sm" id="privacyModalOkBtn" data-i18n="privacy_btn_close">
            Fechar
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- LGPD & Cookie Notice (Singelo & Discreto) -->
  <aside class="cookie-banner" id="cookieBanner" aria-label="Aviso de Cookies e LGPD" style="display: none;">
    <div class="cookie-content">
      <span class="cookie-icon" aria-hidden="true">🍪</span>
      <p class="cookie-text">
        <span data-i18n="cookie_msg">Utilizamos cookies essenciais para salvar suas preferências (tema e idioma). Saiba mais em nossa</span>
        <button type="button" class="cookie-policy-link" id="openPrivacyFromBanner" data-i18n="cookie_policy_link">Política de Privacidade & LGPD</button>.
      </p>
    </div>
    <div class="cookie-actions">
      <button type="button" class="btn btn-primary btn-sm" id="acceptCookiesBtn" data-i18n="cookie_btn_accept">Entendi</button>
    </div>
  </aside>

  <!-- Scroll to Top Button -->
  <button type="button" class="scroll-top-btn" id="scrollTopBtn" aria-label="Voltar ao início">
    ↑
  </button>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="footer-top">
        <div class="brand-logo">
          <div class="logo-monogram">NY</div>
          <div class="logo-text">
            <span class="logo-title">FERNANDA YOUSSEF</span>
            <span class="logo-tag">WEB DEVELOPER • PHP & MYSQL</span>
          </div>
        </div>

        <nav aria-label="Navegação do Rodapé">
          <ul class="footer-nav-menu">
            <li><a href="#hero" class="nav-link" data-i18n="nav_home">Início</a></li>
            <li><a href="#about" class="nav-link" data-i18n="nav_about">Sobre</a></li>
            <li><a href="#projects" class="nav-link" data-i18n="nav_projects">Projetos</a></li>
            <li><a href="#skills" class="nav-link" data-i18n="nav_skills">Habilidades</a></li>
            <li><a href="#contact" class="nav-link" data-i18n="nav_contact">Contato</a></li>
          </ul>
        </nav>
      </div>

      <div class="footer-bottom">
        <div>
          &copy; <?= date('Y') ?> <strong>Fernanda (Nanda) Youssef</strong> • <span data-i18n="footer_rights">Todos os direitos reservados.</span> • <button type="button" class="footer-privacy-btn" id="footerPrivacyBtn" data-i18n="footer_privacy">Privacidade & LGPD</button>
        </div>
        <div data-i18n="footer_tagline">
          Desenvolvido com elegância, modernidade, <strong>PHP</strong> & <strong>MySQL</strong>.
        </div>
      </div>
    </div>
  </footer>

  <!-- Main JavaScript File -->
  <script src="assets/js/main.js"></script>
</body>
</html>
