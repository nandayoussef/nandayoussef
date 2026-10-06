<?php
/**
 * API para Envio e Armazenamento de Mensagens de Contato
 * Salva no MySQL e gera link de WhatsApp direto
 */

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../config.php';

// Apenas aceita requisições POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Método não permitido']);
    exit;
}

// Suporte para JSON ou FormData
$input = $_POST;
if (empty($input)) {
    $rawInput = file_get_contents('php://input');
    $decoded = json_decode($rawInput, true);
    if (is_array($decoded)) {
        $input = $decoded;
    }
}

// Sanitização e Captura dos Campos
$name    = isset($input['name']) ? trim(strip_tags($input['name'])) : '';
$email   = isset($input['email']) ? trim(filter_var($input['email'], FILTER_SANITIZE_EMAIL)) : '';
$subject = isset($input['subject']) ? trim(strip_tags($input['subject'])) : 'Contato pelo Portfólio';
$message = isset($input['message']) ? trim(strip_tags($input['message'])) : '';

// Validações básicas
$errors = [];

if (mb_strlen($name) < 2) {
    $errors[] = 'Por favor, informe seu nome completo.';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Por favor, informe um endereço de e-mail válido.';
}

if (mb_strlen($message) < 5) {
    $errors[] = 'A mensagem deve conter pelo menos 5 caracteres.';
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error'   => implode(' ', $errors)
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// Obter IP do remetente
$ipAddress = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';

// Salvar no Banco de Dados MySQL
$savedInDb = false;
$pdo = getDbConnection();

if ($pdo) {
    try {
        $stmt = $pdo->prepare("INSERT INTO `contact_messages` 
            (`name`, `email`, `subject`, `message`, `ip_address`) 
            VALUES (:name, :email, :subject, :message, :ip)");
        $stmt->execute([
            ':name'    => $name,
            ':email'   => $email,
            ':subject' => $subject,
            ':message' => $message,
            ':ip'      => $ipAddress
        ]);
        $savedInDb = true;
    } catch (PDOException $e) {
        // Log de erro silencioso para não expor dados sensíveis
        error_log("Erro ao salvar mensagem no MySQL: " . $e->getMessage());
    }
}

// Formatar mensagem para WhatsApp
$phoneWhatsApp = '5521979695920'; // Número oficial de Fernanda Youssef (+55 21 97969-5920)
$whatsappText = "✨ *Novo Contato pelo Portfólio Nanda Youssef*\n\n"
              . "👤 *Nome:* {$name}\n"
              . "✉️ *E-mail:* {$email}\n"
              . "📌 *Assunto:* {$subject}\n"
              . "💬 *Mensagem:* {$message}";
$whatsappUrl = "https://wa.me/{$phoneWhatsApp}?text=" . urlencode($whatsappText);

// Retornar sucesso
echo json_encode([
    'success'      => true,
    'message'      => 'Mensagem recebida com sucesso! Obrigada pelo contato, responderei o quanto antes.',
    'saved_db'     => $savedInDb,
    'whatsapp_url' => $whatsappUrl
], JSON_UNESCAPED_UNICODE);
