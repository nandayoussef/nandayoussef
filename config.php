<?php
/**
 * Configuração de Conexão com o Banco de Dados MySQL
 * Fernanda Youssef - Portfólio Profissional Web
 */

// Definições do banco de dados (Padrão XAMPP)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'nanda_portfolio');
define('DB_CHARSET', 'utf8mb4');

/**
 * Função para obter a conexão PDO
 * Retorna o objeto PDO ou null se o banco ainda não tiver sido inicializado.
 */
function getDbConnection(): ?PDO {
    static $pdo = null;

    if ($pdo !== null) {
        return $pdo;
    }

    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        return $pdo;
    } catch (PDOException $e) {
        // Se o banco ainda não existe, não interrompe a página (retorna null para fallback gracioso)
        return null;
    }
}

/**
 * Projetos padrão com suporte bilíngue (Português & Inglês)
 */
function getDefaultProjects(): array {
    return [
        [
            'id' => 1,
            'title' => 'Nova Analytics Hub',
            'category' => 'Web Apps & SaaS',
            'category_en' => 'Web Apps & SaaS',
            'category_slug' => 'saas',
            'description' => 'Plataforma SaaS moderna com painel de métricas em tempo real, visualização de dados e snippets de código com tema escuro elegante.',
            'description_en' => 'Modern SaaS analytics dashboard featuring real-time performance metrics, clean code snippets, and an elegant dark theme.',
            'details' => 'Desenvolvido com foco em alta performance e UX refinada. Inclui componentes analíticos dinâmicos, controle de permissões, autenticação segura e integração com APIs RESTful.',
            'details_en' => 'Engineered for high performance and refined UX. Features dynamic analytical widgets, role-based access, secure session handling, and RESTful API integration.',
            'technologies' => ['PHP 8.2', 'MySQL', 'JavaScript ES6+', 'CSS Grid', 'Chart.js'],
            'image_url' => 'assets/images/web_dev_saas.jpg',
            'demo_url' => '#',
            'github_url' => 'https://github.com/nandayoussef',
            'status' => 'Concluído',
            'status_en' => 'Completed',
            'featured' => 1
        ],
        [
            'id' => 2,
            'title' => 'Aurélie Luxury E-Commerce',
            'category' => 'E-Commerce',
            'category_en' => 'E-Commerce',
            'category_slug' => 'ecommerce',
            'description' => 'Experiência de e-commerce responsiva de alta joalheria com interface refinada em tons rosé e champagne, catálogo dinâmico e checkout fluído.',
            'description_en' => 'Responsive luxury jewelry e-commerce experience with an exquisite rose-gold and champagne palette, dynamic catalog, and smooth checkout flow.',
            'details' => 'Estrutura completa com modelagem de produtos e pedidos em MySQL, carrinho em sessão PHP, filtro avançado de produtos e micro-animações no catálogo.',
            'details_en' => 'Complete architecture with relational product and order modeling in MySQL, PHP session-based cart, advanced faceted filtering, and subtle catalog micro-animations.',
            'technologies' => ['PHP', 'MySQL', 'Vanilla JS', 'Modern CSS', 'Figma'],
            'image_url' => 'assets/images/web_dev_ecommerce.jpg',
            'demo_url' => '#',
            'github_url' => 'https://github.com/nandayoussef',
            'status' => 'Concluído',
            'status_en' => 'Completed',
            'featured' => 1
        ],
        [
            'id' => 3,
            'title' => 'Moderne Digital Suite',
            'category' => 'Landing Pages & UI',
            'category_en' => 'Landing Pages & UI',
            'category_slug' => 'landing',
            'description' => 'Landing page interativa para lançamento de produto digital de alto padrão com efeitos glassmorphism e design voltado para conversão.',
            'description_en' => 'Interactive high-conversion landing page for digital products, crafted with glassmorphism aesthetics and immersive scroll interactions.',
            'details' => 'Criada com HTML5 semântico, CSS avançado com variáveis customizadas, micro-interações ao rolar a página e formulário de captura integrado ao backend PHP.',
            'details_en' => 'Crafted with semantic HTML5, custom CSS design tokens, scroll-driven micro-interactions, and a lead capture form tied to the PHP backend.',
            'technologies' => ['HTML5 Semântico', 'CSS3 Avançado', 'JavaScript', 'PHP Mailer'],
            'image_url' => 'assets/images/digital_campaign.jpg',
            'demo_url' => '#',
            'github_url' => 'https://github.com/nandayoussef',
            'status' => 'Concluído',
            'status_en' => 'Completed',
            'featured' => 1
        ],
        [
            'id' => 4,
            'title' => 'Maison Aude Brand & Web',
            'category' => 'Identidade & Web',
            'category_en' => 'Brand & Web',
            'category_slug' => 'branding',
            'description' => 'Sistema de design e portal institucional minimalista para marca exclusiva de moda com tipografia customizada e detalhes em hot-stamping digital.',
            'description_en' => 'Minimalist brand design system and corporate web portal for an exclusive fashion atelier, featuring bespoke typography and metallic foil accents.',
            'details' => 'Trabalho de arquitetura de informação e desenvolvimento front-end com padrões modernos de acessibilidade (WCAG) e alta pontuação no Google Lighthouse.',
            'details_en' => 'Information architecture and front-end engineering adhering to WCAG accessibility guidelines and top Lighthouse performance benchmarks.',
            'technologies' => ['PHP', 'Design System', 'Acessibilidade', 'CSS Grid'],
            'image_url' => 'assets/images/branding_project.jpg',
            'demo_url' => '#',
            'github_url' => 'https://github.com/nandayoussef',
            'status' => 'Em Destaque',
            'status_en' => 'Featured',
            'featured' => 0
        ],
        [
            'id' => 5,
            'title' => 'The Modern Muse Editorial',
            'category' => 'Editorial & Conteúdo',
            'category_en' => 'Editorial & Content',
            'category_slug' => 'editorial',
            'description' => 'Portal de artigos e ensaios visuais com paginação dinâmica, leitura imersiva e transições suaves de página.',
            'description_en' => 'Immersive editorial and visual essay platform featuring dynamic pagination, magazine-style typography, and smooth transitions.',
            'details' => 'Integração com banco de dados MySQL para gestão de artigos e categorias, leitura otimizada para dispositivos móveis e cache de consultas.',
            'details_en' => 'MySQL integration for content and category management, mobile-optimized reading layout, and fast query execution.',
            'technologies' => ['PHP 8', 'MySQL Relacional', 'JavaScript', 'CSS Flexbox'],
            'image_url' => 'assets/images/editorial_project.jpg',
            'demo_url' => '#',
            'github_url' => 'https://github.com/nandayoussef',
            'status' => 'Em Andamento',
            'status_en' => 'In Progress',
            'featured' => 0
        ]
    ];
}

/**
 * Busca todos os projetos (do banco ou do fallback) com enriquecimento bilíngue
 */
function getProjects(): array {
    $default = getDefaultProjects();
    $db = getDbConnection();
    if ($db) {
        try {
            $stmt = $db->query("SELECT * FROM projects ORDER BY featured DESC, id ASC");
            $projects = $stmt->fetchAll();
            if (!empty($projects)) {
                // Mescla com as traduções padrão caso as colunas EN não existam ainda na tabela
                foreach ($projects as $index => &$p) {
                    if (is_string($p['technologies'])) {
                        $decoded = json_decode($p['technologies'], true);
                        $p['technologies'] = $decoded ?: explode(',', $p['technologies']);
                    }
                    // Adiciona traduções baseadas no ID ou defaults
                    $defMatch = $default[$index] ?? $default[0];
                    $p['category_en'] = $p['category_en'] ?? $defMatch['category_en'];
                    $p['description_en'] = $p['description_en'] ?? $defMatch['description_en'];
                    $p['details_en'] = $p['details_en'] ?? $defMatch['details_en'];
                    $p['status_en'] = $p['status_en'] ?? $defMatch['status_en'];
                }
                return $projects;
            }
        } catch (Exception $e) {
            // Em caso de erro na tabela, usa fallback
        }
    }
    return $default;
}
