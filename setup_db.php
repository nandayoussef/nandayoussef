<?php
/**
 * Script de Inicialização e Instalação do Banco de Dados MySQL
 * Fernanda Youssef - Portfólio Web
 */

require_once __DIR__ . '/config.php';

$outputMessages = [];
$statusSuccess = true;

try {
    // Conecta ao servidor MySQL sem especificar banco para poder criá-lo
    $pdoRoot = new PDO("mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    // 1. Cria o banco de dados se não existir
    $pdoRoot->exec("CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $outputMessages[] = "Banco de dados <strong>" . DB_NAME . "</strong> verificado/criado com sucesso!";

    // 2. Conecta ao banco de dados recém-criado
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    // 3. Cria a tabela de projetos
    $sqlProjects = "CREATE TABLE IF NOT EXISTS `projects` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `title` VARCHAR(150) NOT NULL,
        `category` VARCHAR(100) NOT NULL,
        `category_slug` VARCHAR(50) NOT NULL,
        `description` TEXT NOT NULL,
        `details` TEXT NULL,
        `technologies` TEXT NOT NULL,
        `image_url` VARCHAR(255) NOT NULL,
        `demo_url` VARCHAR(255) DEFAULT '#',
        `github_url` VARCHAR(255) DEFAULT '#',
        `status` VARCHAR(50) DEFAULT 'Concluído',
        `featured` TINYINT(1) DEFAULT 0,
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
    $pdo->exec($sqlProjects);
    $outputMessages[] = "Tabela <strong>projects</strong> verificada/criada com sucesso!";

    // 4. Cria a tabela de mensagens de contato
    $sqlMessages = "CREATE TABLE IF NOT EXISTS `contact_messages` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(100) NOT NULL,
        `email` VARCHAR(120) NOT NULL,
        `subject` VARCHAR(150) NOT NULL,
        `message` TEXT NOT NULL,
        `ip_address` VARCHAR(50) DEFAULT NULL,
        `is_read` TINYINT(1) DEFAULT 0,
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
    $pdo->exec($sqlMessages);
    $outputMessages[] = "Tabela <strong>contact_messages</strong> verificada/criada com sucesso!";

    // 5. Verifica se há projetos cadastrados; se estiver vazia, popula
    $check = $pdo->query("SELECT COUNT(*) FROM `projects`")->fetchColumn();
    if ($check == 0) {
        $defaultProjects = getDefaultProjects();
        $stmt = $pdo->prepare("INSERT INTO `projects` 
            (`id`, `title`, `category`, `category_slug`, `description`, `details`, `technologies`, `image_url`, `demo_url`, `github_url`, `status`, `featured`) 
            VALUES (:id, :title, :category, :category_slug, :description, :details, :technologies, :image_url, :demo_url, :github_url, :status, :featured)");

        foreach ($defaultProjects as $p) {
            $stmt->execute([
                ':id'            => $p['id'],
                ':title'         => $p['title'],
                ':category'      => $p['category'],
                ':category_slug' => $p['category_slug'],
                ':description'   => $p['description'],
                ':details'       => $p['details'],
                ':technologies'  => json_encode($p['technologies'], JSON_UNESCAPED_UNICODE),
                ':image_url'     => $p['image_url'],
                ':demo_url'      => $p['demo_url'],
                ':github_url'    => $p['github_url'],
                ':status'        => $p['status'],
                ':featured'      => $p['featured'],
            ]);
        }
        $outputMessages[] = "Projetos iniciais inseridos com sucesso na tabela <strong>projects</strong>!";
    } else {
        $outputMessages[] = "A tabela <strong>projects</strong> já contém $check registros. Nenhuma alteração foi necessária.";
    }

} catch (PDOException $e) {
    $statusSuccess = false;
    $outputMessages[] = "Erro na configuração: " . htmlspecialchars($e->getMessage());
}

// Se executado via linha de comando (CLI)
if (php_sapi_name() === 'cli') {
    echo $statusSuccess ? "=== SUCESSO: BANCO DE DADOS CONFIGURADO ===\n" : "=== ERRO NA CONFIGURACAO ===\n";
    foreach ($outputMessages as $msg) {
        echo strip_tags($msg) . "\n";
    }
    exit($statusSuccess ? 0 : 1);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuração do Banco de Dados | Fernanda Youssef</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #0b090a;
            --card-bg: rgba(22, 19, 21, 0.85);
            --gold: #d4af37;
            --rose: #dca39c;
            --text-main: #f5f3f4;
            --text-muted: #a09a9e;
            --border-color: rgba(212, 175, 55, 0.2);
            --success: #10b981;
            --error: #ef4444;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }
        .setup-card {
            max-width: 600px;
            width: 100%;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.6);
            backdrop-filter: blur(12px);
        }
        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            color: var(--text-main);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .subtitle {
            color: var(--text-muted);
            font-size: 14px;
            margin-bottom: 24px;
        }
        .log-box {
            background: rgba(0,0,0,0.4);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
            border: 1px solid rgba(255,255,255,0.06);
        }
        .log-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            margin-bottom: 12px;
            color: #d1cbd0;
        }
        .log-item:last-child { margin-bottom: 0; }
        .log-item .icon {
            font-size: 16px;
        }
        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #d4af37, #dca39c);
            color: #0b090a;
            font-weight: 700;
            padding: 14px 28px;
            border-radius: 50px;
            text-decoration: none;
            text-align: center;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.25);
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(212, 175, 55, 0.35);
        }
    </style>
</head>
<body>
    <div class="setup-card">
        <h1>⚙️ Configuração MySQL</h1>
        <p class="subtitle">Inicialização automática das tabelas do portfólio de Fernanda Youssef.</p>

        <div class="log-box">
            <?php foreach ($outputMessages as $msg): ?>
                <div class="log-item">
                    <span class="icon"><?= $statusSuccess ? '✨' : '⚠️' ?></span>
                    <span><?= $msg ?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <a href="index.php" class="btn">Acessar Portfólio de Fernanda Youssef &rarr;</a>
    </div>
</body>
</html>
