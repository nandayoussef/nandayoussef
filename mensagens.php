<?php
/**
 * Painel de Mensagens Recebidas - Fernanda Youssef
 * Visualizador de contatos gravados no MySQL
 */

require_once __DIR__ . '/config.php';

$pdo = getDbConnection();
$messages = [];
$errorMsg = null;

if ($pdo) {
    try {
        // Ação para marcar como lida ou excluir
        if (isset($_GET['action']) && isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            if ($_GET['action'] === 'read') {
                $stmt = $pdo->prepare("UPDATE `contact_messages` SET `is_read` = 1 WHERE `id` = :id");
                $stmt->execute([':id' => $id]);
            } elseif ($_GET['action'] === 'delete') {
                $stmt = $pdo->prepare("DELETE FROM `contact_messages` WHERE `id` = :id");
                $stmt->execute([':id' => $id]);
            }
            header('Location: mensagens.php');
            exit;
        }

        $stmt = $pdo->query("SELECT * FROM `contact_messages` ORDER BY `created_at` DESC");
        $messages = $stmt->fetchAll();
    } catch (PDOException $e) {
        $errorMsg = "Erro ao buscar mensagens: " . $e->getMessage();
    }
} else {
    $errorMsg = "Banco de dados não conectado. Execute o setup_db.php primeiro.";
}
?>
<!DOCTYPE html>
<html lang="pt-BR" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mensagens Recebidas | Fernanda Youssef</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body { padding: 40px 0; min-height: 100vh; }
    .inbox-card {
      background: var(--bg-card);
      border: 1px solid var(--border-accent);
      border-radius: var(--radius-lg);
      padding: 32px;
      backdrop-filter: blur(14px);
      box-shadow: var(--shadow-lg);
      margin-top: 24px;
    }
    .inbox-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 24px;
      flex-wrap: wrap;
      gap: 16px;
    }
    .badge-count {
      background: var(--gradient-accent);
      color: #0b090a;
      font-weight: 700;
      padding: 4px 12px;
      border-radius: var(--radius-full);
      font-size: 0.85rem;
    }
    .table-responsive {
      overflow-x: auto;
    }
    .table-messages {
      width: 100%;
      border-collapse: collapse;
      text-align: left;
    }
    .table-messages th {
      padding: 14px 16px;
      border-bottom: 1px solid var(--border-light);
      color: var(--gold-primary);
      font-size: 0.82rem;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    .table-messages td {
      padding: 16px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.05);
      font-size: 0.92rem;
      color: var(--text-main);
      vertical-align: top;
    }
    .table-messages tr:hover td {
      background: rgba(255, 255, 255, 0.02);
    }
    .msg-unread td {
      font-weight: 600;
    }
    .status-badge-unread {
      background: rgba(212, 175, 55, 0.15);
      color: var(--gold-primary);
      border: 1px solid var(--border-accent);
      padding: 3px 8px;
      border-radius: 6px;
      font-size: 0.75rem;
    }
    .status-badge-read {
      background: rgba(255, 255, 255, 0.05);
      color: var(--text-muted);
      padding: 3px 8px;
      border-radius: 6px;
      font-size: 0.75rem;
    }
    .msg-content {
      background: rgba(0, 0, 0, 0.25);
      padding: 10px 14px;
      border-radius: 8px;
      margin-top: 6px;
      font-size: 0.88rem;
      color: #dedede;
      white-space: pre-wrap;
      max-width: 480px;
    }
    .action-links {
      display: flex;
      gap: 8px;
      white-space: nowrap;
    }
    .empty-state {
      text-align: center;
      padding: 50px 20px;
      color: var(--text-muted);
    }
  </style>
</head>
<body>
  <div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
      <a href="index.php" class="btn btn-outline btn-sm">&larr; Voltar para o Site</a>
      <div style="font-family: var(--font-serif); font-size: 1.1rem; color: var(--gold-primary);">
        Fernanda Youssef • Painel Local
      </div>
    </div>

    <div class="inbox-card">
      <div class="inbox-header">
        <div>
          <h1 style="font-family: var(--font-serif); font-size: 1.8rem; margin-bottom: 6px;">
            📬 Caixa de Mensagens Recebidas
          </h1>
          <p style="color: var(--text-muted); font-size: 0.9rem;">
            Mensagens enviadas pelo formulário de contato do site e armazenadas com segurança no MySQL.
          </p>
        </div>
        <div>
          <span class="badge-count"><?= count($messages) ?> Mensagens</span>
        </div>
      </div>

      <?php if ($errorMsg): ?>
        <div style="background: rgba(239, 68, 68, 0.15); border: 1px solid #ef4444; color: #f87171; padding: 14px; border-radius: 8px; margin-bottom: 20px;">
          <?= htmlspecialchars($errorMsg) ?>
        </div>
      <?php endif; ?>

      <?php if (empty($messages)): ?>
        <div class="empty-state">
          <div style="font-size: 2.5rem; margin-bottom: 12px;">📭</div>
          <h3>Nenhuma mensagem recebida ainda.</h3>
          <p style="font-size: 0.9rem; margin-top: 6px;">Envie uma mensagem pelo formulário do site para testar!</p>
          <a href="index.php#contact" class="btn btn-primary btn-sm" style="margin-top: 16px;">Ir para o Formulário de Contato</a>
        </div>
      <?php else: ?>
        <div class="table-responsive">
          <table class="table-messages">
            <thead>
              <tr>
                <th>Status</th>
                <th>Remetente</th>
                <th>Assunto & Mensagem</th>
                <th>Data / Hora</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($messages as $m): ?>
                <tr class="<?= $m['is_read'] ? '' : 'msg-unread' ?>">
                  <td>
                    <?php if ($m['is_read']): ?>
                      <span class="status-badge-read">Lida</span>
                    <?php else: ?>
                      <span class="status-badge-unread">Nova ✨</span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <strong><?= htmlspecialchars($m['name']) ?></strong><br>
                    <a href="mailto:<?= htmlspecialchars($m['email']) ?>" style="color: var(--rose-primary); font-size: 0.85rem; text-decoration: none;">
                      <?= htmlspecialchars($m['email']) ?>
                    </a>
                  </td>
                  <td>
                    <strong><?= htmlspecialchars($m['subject']) ?></strong>
                    <div class="msg-content"><?= htmlspecialchars($m['message']) ?></div>
                  </td>
                  <td style="color: var(--text-muted); font-size: 0.82rem; white-space: nowrap;">
                    <?= date('d/m/Y H:i', strtotime($m['created_at'])) ?>
                  </td>
                  <td>
                    <div class="action-links">
                      <?php if (!$m['is_read']): ?>
                        <a href="mensagens.php?action=read&id=<?= $m['id'] ?>" class="btn btn-outline btn-sm" style="padding: 4px 8px; font-size: 0.75rem;" title="Marcar como lida">
                          ✓ Lida
                        </a>
                      <?php endif; ?>
                      <a href="mailto:<?= htmlspecialchars($m['email']) ?>?subject=Re: <?= urlencode($m['subject']) ?>" class="btn btn-primary btn-sm" style="padding: 4px 8px; font-size: 0.75rem;" title="Responder por e-mail">
                        ✉️ Responder
                      </a>
                      <a href="mensagens.php?action=delete&id=<?= $m['id'] ?>" class="btn btn-outline btn-sm" style="padding: 4px 8px; font-size: 0.75rem; color: #ef4444; border-color: rgba(239, 68, 68, 0.3);" onclick="return confirm('Deseja excluir esta mensagem?');" title="Excluir">
                        🗑️
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </div>
  </div>
</body>
</html>
