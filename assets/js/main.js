/**
 * Fernanda Youssef - Interatividades, Animações e Sistema Bilíngue (PT/EN)
 */

document.addEventListener('DOMContentLoaded', () => {
  initI18n();
  initNavbar();
  initThemeToggle();
  initProjectFilters();
  initProjectModal();
  initContactForm();
  initTerminalActions();
  initScrollReveal();
  initScrollToTop();
});

/* ==========================================================================
   1. SISTEMA BILÍNGUE (PORTUGUÊS / ENGLISH)
   ========================================================================== */
const I18N_DICTIONARY = {
  pt: {
    meta_title: "Fernanda Youssef | Desenvolvedora Web & UI/UX",
    meta_desc: "Portfólio de Fernanda (Nanda) Youssef. Desenvolvedora Web com foco em PHP, MySQL, JavaScript e design de alto padrão.",
    
    // Navbar
    nav_home: "Início",
    nav_about: "Sobre",
    nav_projects: "Projetos",
    nav_skills: "Habilidades",
    nav_journey: "Trajetória",
    nav_contact: "Contato",
    nav_cta: "Fale Comigo",

    // Hero
    hero_badge: "Iniciando Novos Projetos Web",
    hero_title_prefix: "Transformando ideias em código com",
    hero_title_accent: "elegância & técnica.",
    hero_roles: [
      "Desenvolvedora Web & Front-End",
      "Full-Stack em Formação (PHP & MySQL)",
      "UI/UX & Design Digital Moderno",
      "Criadora de Experiências Elegantes"
    ],
    hero_desc: "Olá! Sou a <strong>Fernanda (Nanda) Youssef</strong>. Estou iniciando minha jornada no desenvolvimento web, construindo aplicações dinâmicas com <strong>PHP</strong>, <strong>MySQL</strong> e interfaces sofisticadas com <strong>JavaScript, HTML5 e CSS3</strong>.",
    hero_btn_projects: "Ver Projetos",
    hero_btn_contact: "Iniciar Conversa",
    hero_badge_stack_title: "Stack Moderna",
    hero_badge_stack_sub: "PHP 8 & MySQL",
    hero_badge_design_title: "Design Sofisticado",
    hero_badge_design_sub: "UI/UX & Código Limpo",
    hero_terminal_copy: "Copiar",
    hero_terminal_copied: "✓ Copiado!",
    hero_terminal_run: "Executar ▶",
    hero_terminal_status: '"Criando projetos web modernos"',
    hero_terminal_comment: "// Criando soluções sob medida com estética impecável",
    hero_terminal_output_1: "> Compilando FernandaYoussef::init()...",
    hero_terminal_output_2: "✓ Status: Desenvolvedora Web ativa e pronta para construir projetos incríveis!",

    // About
    about_tag: "Minha Jornada",
    about_title_prefix: "Sobre",
    about_p1: "Sou apaixonada por dar vida a ideias através da tecnologia. Minha missão é unir a <strong>precisão lógica da programação</strong> com a <strong>sensibilidade estética do design</strong>.",
    about_p2: "Estou iniciando com determinação total no ecossistema do <strong>desenvolvimento web</strong>, focando em construir bases sólidas: código semântico e acessível no front-end, e uma arquitetura robusta no back-end com <strong>PHP e banco de dados MySQL</strong>.",
    about_p3: "Acredito que cada linha de código deve servir a um propósito: entregar uma experiência intuitiva, elegante e memorável para o usuário final.",
    about_cta: "Vamos criar algo juntos &rarr;",
    pillar_1_title: "Código Limpo & Semântico",
    pillar_1_desc: "Estruturação focada em boas práticas, SEO, velocidade de carregamento e facilidade de manutenção.",
    pillar_2_title: "Design Sofisticado",
    pillar_2_desc: "Paletas harmoniosas, tipografia editorial e micro-interações que elevam a percepção de valor.",
    pillar_3_title: "Back-End PHP & MySQL",
    pillar_3_desc: "Modelagem relacional de dados, segurança com PDO e desenvolvimento estruturado.",
    pillar_4_title: "Evolução Contínua",
    pillar_4_desc: "Estudo diário das tendências e tecnologias que movimentam a indústria de tecnologia global.",

    // Stats
    stat_dedication: "Dedicação & Foco",
    stat_projects: "Projetos & Conceitos",
    stat_stack: "Stack em Formação",
    stat_passion: "Paixão por Aprender",

    // Projects
    projects_tag: "Portfólio em Construção",
    projects_title_prefix: "Projetos &",
    projects_title_accent: "Criações Digitais",
    projects_subtitle: "Uma seleção de projetos, protótipos e sistemas desenvolvidos para explorar o potencial do PHP, MySQL e front-end moderno.",
    filter_all: "Todos",
    filter_saas: "Web Apps & SaaS",
    filter_ecommerce: "E-Commerce",
    filter_landing: "Landing Pages",
    filter_branding: "Identidade & Web",
    btn_details: "Ver Detalhes &rarr;",

    // Skills
    skills_tag: "Competências",
    skills_title_prefix: "Habilidades &",
    skills_title_accent: "Tecnologias",
    skills_subtitle: "As ferramentas e tecnologias que utilizo para transformar desafios em aplicações funcionais e bem estruturadas.",
    skills_cat_front: "Front-End Moderno",
    skills_cat_back: "Back-End & Banco de Dados",
    skills_cat_tools: "Ferramentas & Workflow",

    // Journey
    journey_tag: "Passo a Passo",
    journey_title_prefix: "Minha",
    journey_title_accent: "Evolução no Desenvolvimento",
    journey_subtitle: "Cada etapa da minha formação é guiada pela paixão em construir projetos reais e resolver problemas práticos.",
    journey_1_date: "Fase 1 • Primeiros Passos",
    journey_1_title: "O Despertar para a Programação",
    journey_1_desc: "Iniciei compreendendo os fundamentos da web: como a internet funciona, lógica computacional e a criação das primeiras páginas estruturadas com HTML5 semântico e estilização refinada com CSS3.",
    journey_2_date: "Fase 2 • Dinamismo & UX",
    journey_2_title: "Interatividade com JavaScript",
    journey_2_desc: "Evolução para manipulação avançada de DOM, requisições assíncronas com Fetch API, animações personalizadas e adaptação dos layouts para qualquer tamanho de tela com foco na experiência do usuário.",
    journey_3_date: "Fase 3 • O Mundo dos Dados",
    journey_3_title: "Back-End com PHP & MySQL",
    journey_3_desc: "Aprofundamento na construção de sistemas dinâmicos no servidor: conexões seguras com PDO, modelagem relacional de tabelas, autenticação, CRUDs completos e estruturação de APIs para o front-end.",
    journey_4_date: "Fase 4 • Presente & Futuro",
    journey_4_title: "Criação de Projetos de Alto Valor",
    journey_4_desc: "Desenvolvimento de soluções web completas, prontas para o mercado, combinando interfaces elegantes com arquitetura confiável de software. Pronta para novas oportunidades e parcerias!",

    // Contact
    contact_tag: "Conecte-se Comigo",
    contact_title_prefix: "Vamos Iniciar um",
    contact_title_accent: "Novo Projeto?",
    contact_subtitle: "Tem uma ideia, proposta ou gostaria de conversar sobre oportunidades? Envie uma mensagem abaixo ou me chame diretamente no WhatsApp.",
    contact_channels_title: "Canais Diretos",
    contact_channels_desc: "Estou sempre aberta a novas conexões, colaborações e desafios na área de desenvolvimento web.",
    contact_channel_email: "E-mail Profissional",
    contact_db_connected: "Banco de dados MySQL conectado e ativo.",
    contact_db_setup: "Configurar banco de dados MySQL",
    contact_db_btn: "Configurar",
    contact_form_title: "Enviar Mensagem",
    contact_label_name: "Seu Nome *",
    contact_ph_name: "Ex: Maria Clara",
    contact_label_email: "Seu E-mail *",
    contact_ph_email: "Ex: maria@email.com",
    contact_label_subject: "Assunto",
    contact_ph_subject: "Ex: Proposta de Projeto / Oportunidade",
    contact_label_message: "Sua Mensagem *",
    contact_ph_message: "Conte-me sobre o seu projeto ou ideia...",
    contact_btn_submit: "Enviar Mensagem &rarr;",
    contact_sending: "Enviando mensagem... ✨",
    contact_success_msg: "Mensagem recebida com sucesso! Obrigada pelo contato, responderei o quanto antes.",
    contact_wa_btn: "Abrir no WhatsApp também &rarr;",

    // Modal
    modal_demo_btn: "Visualizar Demonstração &rarr;",
    modal_code_btn: "Ver Código no GitHub",

    // Footer
    footer_rights: "Todos os direitos reservados.",
    footer_tagline: "Desenvolvido com elegância, modernidade, <strong>PHP</strong> & <strong>MySQL</strong>."
  },

  en: {
    meta_title: "Fernanda Youssef | Web Developer & UI/UX",
    meta_desc: "Portfolio of Fernanda (Nanda) Youssef. Web Developer specializing in PHP, MySQL, JavaScript, and high-end digital design.",

    // Navbar
    nav_home: "Home",
    nav_about: "About",
    nav_projects: "Projects",
    nav_skills: "Skills",
    nav_journey: "Journey",
    nav_contact: "Contact",
    nav_cta: "Get in Touch",

    // Hero
    hero_badge: "Launching New Web Projects",
    hero_title_prefix: "Transforming ideas into code with",
    hero_title_accent: "elegance & craftsmanship.",
    hero_roles: [
      "Web & Front-End Developer",
      "Full-Stack in Training (PHP & MySQL)",
      "Modern UI/UX & Digital Design",
      "Crafting Elegant Digital Experiences"
    ],
    hero_desc: "Hello! I am <strong>Fernanda (Nanda) Youssef</strong>. I am embarking on my journey in web development, building dynamic applications with <strong>PHP</strong>, <strong>MySQL</strong>, and refined interfaces with <strong>JavaScript, HTML5, and CSS3</strong>.",
    hero_btn_projects: "View Projects",
    hero_btn_contact: "Let's Talk",
    hero_badge_stack_title: "Modern Stack",
    hero_badge_stack_sub: "PHP 8 & MySQL",
    hero_badge_design_title: "Refined Design",
    hero_badge_design_sub: "UI/UX & Clean Code",
    hero_terminal_copy: "Copy",
    hero_terminal_copied: "✓ Copied!",
    hero_terminal_run: "Run ▶",
    hero_terminal_status: '"Crafting modern web projects"',
    hero_terminal_comment: "// Building bespoke solutions with impeccable aesthetics",
    hero_terminal_output_1: "> Compiling FernandaYoussef::init()...",
    hero_terminal_output_2: "✓ Status: Active Web Developer ready to build extraordinary solutions!",

    // About
    about_tag: "My Journey",
    about_title_prefix: "About",
    about_p1: "I am passionate about bringing ideas to life through technology. My mission is to unite the <strong>logical precision of programming</strong> with the <strong>aesthetic sensibility of design</strong>.",
    about_p2: "I am fully committed to my journey in the <strong>web development</strong> ecosystem, focusing on solid foundations: clean and accessible front-end code, and a robust back-end architecture with <strong>PHP and MySQL databases</strong>.",
    about_p3: "I believe every line of code should serve a purpose: delivering an intuitive, elegant, and memorable user experience.",
    about_cta: "Let's create something together &rarr;",
    pillar_1_title: "Clean & Semantic Code",
    pillar_1_desc: "Engineered with industry best practices, SEO, blazing load speeds, and maintainability.",
    pillar_2_title: "Sophisticated Design",
    pillar_2_desc: "Harmonious color palettes, editorial typography, and micro-interactions that elevate brand value.",
    pillar_3_title: "Back-End PHP & MySQL",
    pillar_3_desc: "Relational data modeling, secure PDO queries, and structured server logic.",
    pillar_4_title: "Continuous Evolution",
    pillar_4_desc: "Daily study of emerging technologies and industry best practices shaping the digital world.",

    // Stats
    stat_dedication: "Dedication & Focus",
    stat_projects: "Projects & Concepts",
    stat_stack: "Stack in Progress",
    stat_passion: "Passion for Learning",

    // Projects
    projects_tag: "Portfolio in Progress",
    projects_title_prefix: "Projects &",
    projects_title_accent: "Digital Creations",
    projects_subtitle: "A curated selection of projects, prototypes, and systems crafted to explore the full potential of PHP, MySQL, and modern front-end.",
    filter_all: "All",
    filter_saas: "Web Apps & SaaS",
    filter_ecommerce: "E-Commerce",
    filter_landing: "Landing Pages",
    filter_branding: "Identity & Web",
    btn_details: "View Details &rarr;",

    // Skills
    skills_tag: "Core Skills",
    skills_title_prefix: "Skills &",
    skills_title_accent: "Technologies",
    skills_subtitle: "The tools and technologies I use to turn challenges into functional, beautifully engineered applications.",
    skills_cat_front: "Modern Front-End",
    skills_cat_back: "Back-End & Databases",
    skills_cat_tools: "Tools & Workflow",

    // Journey
    journey_tag: "Step by Step",
    journey_title_prefix: "My",
    journey_title_accent: "Evolution in Development",
    journey_subtitle: "Every milestone in my journey is driven by the passion to build real-world applications and solve practical problems.",
    journey_1_date: "Phase 1 • First Steps",
    journey_1_title: "Discovering the World of Code",
    journey_1_desc: "Started by understanding web fundamentals: computer logic, semantic HTML5 structuring, and refined styling with modern CSS3.",
    journey_2_date: "Phase 2 • Interactivity & UX",
    journey_2_title: "Interactivity with JavaScript",
    journey_2_desc: "Advanced to DOM manipulation, asynchronous Fetch API requests, custom animations, and responsive layouts tailored to user experience.",
    journey_3_date: "Phase 3 • Data & Architecture",
    journey_3_title: "Back-End with PHP & MySQL",
    journey_3_desc: "Deep dive into dynamic server architectures: secure PDO connections, relational database modeling, CRUD operations, and REST APIs.",
    journey_4_date: "Phase 4 • Present & Future",
    journey_4_title: "Crafting High-Value Solutions",
    journey_4_desc: "Developing end-to-end web applications combining elegant interfaces with reliable software architecture. Ready for new opportunities and partnerships!",

    // Contact
    contact_tag: "Connect With Me",
    contact_title_prefix: "Let's Start a",
    contact_title_accent: "New Project?",
    contact_subtitle: "Have an idea, proposal, or want to discuss opportunities? Send a message below or reach out directly on WhatsApp.",
    contact_channels_title: "Direct Channels",
    contact_channels_desc: "Always open to new connections, collaborations, and web development challenges.",
    contact_channel_email: "Professional Email",
    contact_db_connected: "MySQL Database connected and active.",
    contact_db_setup: "Configure MySQL Database",
    contact_db_btn: "Configure",
    contact_form_title: "Send a Message",
    contact_label_name: "Your Name *",
    contact_ph_name: "e.g. John Doe",
    contact_label_email: "Your Email *",
    contact_ph_email: "e.g. john@email.com",
    contact_label_subject: "Subject",
    contact_ph_subject: "e.g. Project Proposal / Opportunity",
    contact_label_message: "Your Message *",
    contact_ph_message: "Tell me about your project or idea...",
    contact_btn_submit: "Send Message &rarr;",
    contact_sending: "Sending message... ✨",
    contact_success_msg: "Message received successfully! Thank you, I will get back to you shortly.",
    contact_wa_btn: "Also chat on WhatsApp &rarr;",

    // Modal
    modal_demo_btn: "View Live Demo &rarr;",
    modal_code_btn: "View Code on GitHub",

    // Footer
    footer_rights: "All rights reserved.",
    footer_tagline: "Crafted with elegance, craftsmanship, <strong>PHP</strong> & <strong>MySQL</strong>."
  }
};

let currentLang = 'pt';
let typewriterTimeout = null;

function initI18n() {
  // 1. Detectar idioma: LocalStorage > Navegador > Padrão (pt)
  const savedLang = localStorage.getItem('nanda_lang');
  if (savedLang && (savedLang === 'pt' || savedLang === 'en')) {
    currentLang = savedLang;
  } else {
    const browserLang = (navigator.language || navigator.userLanguage || 'pt').toLowerCase();
    currentLang = browserLang.startsWith('pt') ? 'pt' : 'en';
  }

  // 2. Configurar botões de idioma
  const langButtons = document.querySelectorAll('.lang-btn');
  langButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const selected = btn.getAttribute('data-lang');
      if (selected && selected !== currentLang) {
        setLanguage(selected);
      }
    });
  });

  // 3. Aplicar idioma inicial
  setLanguage(currentLang, false);
}

function setLanguage(lang, persist = true) {
  currentLang = lang;
  if (persist) {
    localStorage.setItem('nanda_lang', lang);
  }

  document.documentElement.setAttribute('lang', lang === 'pt' ? 'pt-BR' : 'en');

  // Atualizar botões ativos
  document.querySelectorAll('.lang-btn').forEach(btn => {
    if (btn.getAttribute('data-lang') === lang) {
      btn.classList.add('active');
    } else {
      btn.classList.remove('active');
    }
  });

  // Atualizar textos estáticos via data-i18n
  const dict = I18N_DICTIONARY[lang] || I18N_DICTIONARY.pt;

  document.querySelectorAll('[data-i18n]').forEach(el => {
    const key = el.getAttribute('data-i18n');
    if (dict[key] !== undefined) {
      el.innerHTML = dict[key];
    }
  });

  // Atualizar placeholders via data-i18n-ph
  document.querySelectorAll('[data-i18n-ph]').forEach(el => {
    const key = el.getAttribute('data-i18n-ph');
    if (dict[key] !== undefined) {
      el.setAttribute('placeholder', dict[key]);
    }
  });

  // Atualizar meta tags
  if (dict.meta_title) document.title = dict.meta_title;
  const metaDesc = document.querySelector('meta[name="description"]');
  if (metaDesc && dict.meta_desc) metaDesc.setAttribute('content', dict.meta_desc);

  // Atualizar textos dinâmicos dos cards de projetos
  document.querySelectorAll('.project-card').forEach(card => {
    const catBadge = card.querySelector('.project-category-badge');
    const statusBadge = card.querySelector('.project-status-badge');
    const descEl = card.querySelector('.project-desc');

    if (catBadge) {
      const catText = card.getAttribute(`data-cat-${lang}`);
      if (catText) catBadge.textContent = catText;
    }
    if (statusBadge) {
      const statusText = card.getAttribute(`data-status-${lang}`);
      if (statusText) statusBadge.textContent = statusText;
    }
    if (descEl) {
      const descText = card.getAttribute(`data-desc-${lang}`);
      if (descText) descEl.textContent = descText;
    }
  });

  // Reiniciar animação da máquina de escrever no novo idioma
  startTypewriter(dict.hero_roles);
}

/* ==========================================================================
   2. ANIMAÇÃO DE ROLAGEM FLUIDA (SCROLL REVEAL)
   ========================================================================== */
function initScrollReveal() {
  // Ativa a classe de controle suave no body
  document.body.classList.add('js-reveal-active');

  const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale');
  const windowHeight = window.innerHeight;

  // Imediatamente marca como revelados os elementos que já estão no viewport inicial
  revealElements.forEach(el => {
    const rect = el.getBoundingClientRect();
    if (rect.top <= windowHeight + 80) {
      el.classList.add('revealed');
    }
  });

  const observerOptions = {
    threshold: 0.08,
    rootMargin: '0px 0px -20px 0px'
  };

  const revealObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('revealed');
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  revealElements.forEach(el => {
    if (!el.classList.contains('revealed')) {
      revealObserver.observe(el);
    }
  });
}

/* ==========================================================================
   3. TYPEWRITER EFFECT (ROLES NO HERO)
   ========================================================================== */
function startTypewriter(roles) {
  const tickerEl = document.getElementById('roleTicker');
  if (!tickerEl) return;

  if (typewriterTimeout) {
    clearTimeout(typewriterTimeout);
  }

  let roleIdx = 0;
  let charIdx = 0;
  let isDeleting = false;
  let typingSpeed = 85;

  function type() {
    const currentRole = roles[roleIdx];
    
    if (isDeleting) {
      tickerEl.textContent = currentRole.substring(0, charIdx - 1);
      charIdx--;
      typingSpeed = 40;
    } else {
      tickerEl.textContent = currentRole.substring(0, charIdx + 1);
      charIdx++;
      typingSpeed = 85;
    }

    if (!isDeleting && charIdx === currentRole.length) {
      isDeleting = true;
      typingSpeed = 2000; // Pausa após completar frase
    } else if (isDeleting && charIdx === 0) {
      isDeleting = false;
      roleIdx = (roleIdx + 1) % roles.length;
      typingSpeed = 350; // Pausa antes de iniciar próxima
    }

    typewriterTimeout = setTimeout(type, typingSpeed);
  }

  tickerEl.textContent = '';
  type();
}

/* ==========================================================================
   4. NAVBAR SCROLL & MENU MOBILE
   ========================================================================== */
function initNavbar() {
  const navbar = document.querySelector('.navbar');
  const mobileToggle = document.querySelector('.mobile-toggle');
  const navMenu = document.querySelector('.nav-menu');
  const navLinks = document.querySelectorAll('.nav-link');

  window.addEventListener('scroll', () => {
    if (window.scrollY > 40) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
    highlightCurrentSection();
  });

  if (mobileToggle && navMenu) {
    mobileToggle.addEventListener('click', () => {
      navMenu.classList.toggle('open');
      const isOpen = navMenu.classList.contains('open');
      mobileToggle.innerHTML = isOpen ? '✕' : '☰';
      mobileToggle.setAttribute('aria-expanded', isOpen);
    });

    navLinks.forEach(link => {
      link.addEventListener('click', () => {
        navMenu.classList.remove('open');
        if (mobileToggle) mobileToggle.innerHTML = '☰';
      });
    });

    document.addEventListener('click', (e) => {
      if (!navbar.contains(e.target) && navMenu.classList.contains('open')) {
        navMenu.classList.remove('open');
        if (mobileToggle) mobileToggle.innerHTML = '☰';
      }
    });
  }

  function highlightCurrentSection() {
    const sections = document.querySelectorAll('section[id]');
    const scrollY = window.pageYOffset;

    sections.forEach(section => {
      const sectionHeight = section.offsetHeight;
      const sectionTop = section.offsetTop - 140;
      const sectionId = section.getAttribute('id');
      const currentLink = document.querySelector(`.nav-link[href="#${sectionId}"]`);

      if (currentLink) {
        if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
          currentLink.classList.add('active');
        } else {
          currentLink.classList.remove('active');
        }
      }
    });
  }
}

/* ==========================================================================
   5. ALTERNADOR DE TEMA (DARK / LIGHT)
   ========================================================================== */
function initThemeToggle() {
  const themeToggle = document.getElementById('themeToggle');
  if (!themeToggle) return;

  const savedTheme = localStorage.getItem('nanda_theme') || 'dark';
  document.documentElement.setAttribute('data-theme', savedTheme);
  updateThemeIcon(savedTheme);

  themeToggle.addEventListener('click', () => {
    const currentTheme = document.documentElement.getAttribute('data-theme');
    const newTheme = currentTheme === 'light' ? 'dark' : 'light';
    
    document.documentElement.setAttribute('data-theme', newTheme);
    localStorage.setItem('nanda_theme', newTheme);
    updateThemeIcon(newTheme);
  });

  function updateThemeIcon(theme) {
    themeToggle.innerHTML = theme === 'light' ? '🌙' : '☀️';
    themeToggle.setAttribute('title', theme === 'light' ? 'Modo Noturno / Dark' : 'Modo Claro / Light');
  }
}

/* ==========================================================================
   6. FILTRO DE PROJETOS EM TEMPO REAL
   ========================================================================== */
function initProjectFilters() {
  const filterBtns = document.querySelectorAll('.filter-btn');
  const projectCards = document.querySelectorAll('.project-card');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const filterValue = btn.getAttribute('data-filter');

      projectCards.forEach(card => {
        const category = card.getAttribute('data-category');
        if (filterValue === 'all' || category === filterValue) {
          card.style.display = 'flex';
          card.style.opacity = '0';
          card.style.transform = 'scale(0.95)';
          setTimeout(() => {
            card.style.transition = 'all 0.35s cubic-bezier(0.16, 1, 0.3, 1)';
            card.style.opacity = '1';
            card.style.transform = 'scale(1)';
          }, 40);
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
}

/* ==========================================================================
   7. MODAL DE DETALHES DO PROJETO
   ========================================================================== */
function initProjectModal() {
  const modal = document.getElementById('projectModal');
  const modalClose = document.getElementById('modalClose');
  const detailButtons = document.querySelectorAll('.btn-view-details');

  if (!modal) return;

  detailButtons.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const card = btn.closest('.project-card');
      if (!card) return;

      const title = card.querySelector('.project-title')?.textContent || '';
      const category = card.getAttribute(`data-cat-${currentLang}`) || card.querySelector('.project-category-badge')?.textContent || '';
      const details = card.getAttribute(`data-details-${currentLang}`) || card.getAttribute('data-details') || card.querySelector('.project-desc')?.textContent || '';
      const imgSrc = card.querySelector('.project-img')?.getAttribute('src') || '';
      const demoUrl = card.getAttribute('data-demo') || '#';
      const githubUrl = card.getAttribute('data-github') || 'https://github.com/nandayoussef';
      const techTags = card.querySelectorAll('.tech-tag');

      document.getElementById('modalTitle').textContent = title;
      document.getElementById('modalCategory').textContent = category;
      document.getElementById('modalText').textContent = details;
      document.getElementById('modalImage').setAttribute('src', imgSrc);
      document.getElementById('modalDemoLink').setAttribute('href', demoUrl);
      document.getElementById('modalGithubLink').setAttribute('href', githubUrl);

      const modalTechContainer = document.getElementById('modalTechTags');
      modalTechContainer.innerHTML = '';
      techTags.forEach(tag => {
        const cloned = tag.cloneNode(true);
        modalTechContainer.appendChild(cloned);
      });

      modal.classList.add('active');
      document.body.style.overflow = 'hidden';
    });
  });

  function closeModal() {
    modal.classList.remove('active');
    document.body.style.overflow = '';
  }

  if (modalClose) {
    modalClose.addEventListener('click', closeModal);
  }

  modal.addEventListener('click', (e) => {
    if (e.target === modal) {
      closeModal();
    }
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('active')) {
      closeModal();
    }
  });
}

/* ==========================================================================
   8. TERMINAL DEV INTERATIVO
   ========================================================================== */
function initTerminalActions() {
  const copyBtn = document.getElementById('copyCodeBtn');
  const runBtn = document.getElementById('runCodeBtn');
  const terminalBody = document.querySelector('.terminal-body');

  if (copyBtn) {
    copyBtn.addEventListener('click', () => {
      const codeText = terminalBody ? terminalBody.innerText : '';
      navigator.clipboard.writeText(codeText).then(() => {
        const dict = I18N_DICTIONARY[currentLang] || I18N_DICTIONARY.pt;
        copyBtn.innerHTML = dict.hero_terminal_copied || '✓ Copiado!';
        setTimeout(() => {
          copyBtn.innerHTML = dict.hero_terminal_copy || 'Copiar';
        }, 2000);
      });
    });
  }

  if (runBtn) {
    runBtn.addEventListener('click', () => {
      const outputLine = document.getElementById('terminalOutput');
      const dict = I18N_DICTIONARY[currentLang] || I18N_DICTIONARY.pt;
      if (outputLine) {
        outputLine.style.display = 'block';
        outputLine.innerHTML = `<span style="color:#27c93f">${dict.hero_terminal_output_1}</span><br><span style="color:#fbbf24">${dict.hero_terminal_output_2}</span>`;
      }
    });
  }
}

/* ==========================================================================
   9. FORMULÁRIO DE CONTATO AJAX
   ========================================================================== */
function initContactForm() {
  const form = document.getElementById('contactForm');
  const feedback = document.getElementById('formFeedback');
  const submitBtn = document.getElementById('submitBtn');

  if (!form) return;

  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const name = form.name.value.trim();
    const email = form.email.value.trim();
    const subject = form.subject.value.trim();
    const message = form.message.value.trim();
    const dict = I18N_DICTIONARY[currentLang] || I18N_DICTIONARY.pt;

    if (!name || !email || !message) {
      showFeedback(currentLang === 'en' ? 'Please fill in all required fields.' : 'Por favor, preencha todos os campos obrigatórios.', 'error');
      return;
    }

    submitBtn.disabled = true;
    const originalBtnText = submitBtn.innerHTML;
    submitBtn.innerHTML = dict.contact_sending || 'Enviando... ✨';
    feedback.style.display = 'none';

    try {
      const response = await fetch('api/contact.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name, email, subject, message })
      });

      const data = await response.json();

      if (data.success) {
        showFeedback(dict.contact_success_msg || data.message, 'success');
        form.reset();

        if (data.whatsapp_url) {
          const waLink = document.createElement('a');
          waLink.href = data.whatsapp_url;
          waLink.target = '_blank';
          waLink.className = 'btn btn-outline btn-sm';
          waLink.style.marginTop = '12px';
          waLink.innerHTML = dict.contact_wa_btn || 'Abrir no WhatsApp também &rarr;';
          feedback.appendChild(document.createElement('br'));
          feedback.appendChild(waLink);
        }
      } else {
        showFeedback(data.error || 'Ocorreu um erro ao enviar.', 'error');
      }
    } catch (err) {
      const fallbackUrl = `https://wa.me/5511999999999?text=${encodeURIComponent(
        `Olá Fernanda! Meu nome é ${name} (${email}). Assunto: ${subject}. Mensagem: ${message}`
      )}`;
      showFeedback(currentLang === 'en' ? 'Message ready! Click below to send via WhatsApp:' : 'Mensagem pronta! Clique abaixo para enviar via WhatsApp:', 'success');
      
      const waFallback = document.createElement('a');
      waFallback.href = fallbackUrl;
      waFallback.target = '_blank';
      waFallback.className = 'btn btn-primary btn-sm';
      waFallback.style.marginTop = '12px';
      waFallback.innerHTML = dict.contact_wa_btn || 'Enviar via WhatsApp agora &rarr;';
      feedback.appendChild(document.createElement('br'));
      feedback.appendChild(waFallback);
    } finally {
      submitBtn.disabled = false;
      submitBtn.innerHTML = originalBtnText;
    }
  });

  function showFeedback(msg, type) {
    feedback.textContent = msg;
    feedback.className = `form-feedback ${type}`;
    feedback.style.display = 'block';
  }
}

/* ==========================================================================
   10. BOTÃO VOLTAR AO TOPO
   ========================================================================== */
function initScrollToTop() {
  const btn = document.getElementById('scrollTopBtn');
  if (!btn) return;

  window.addEventListener('scroll', () => {
    if (window.scrollY > 400) {
      btn.classList.add('visible');
    } else {
      btn.classList.remove('visible');
    }
  });

  btn.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}
