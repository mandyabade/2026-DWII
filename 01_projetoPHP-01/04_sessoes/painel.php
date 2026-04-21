<?php
/**
 * Disciplina : Desenvolvimento Web II (DWII)
 * Aula       : 06 – Autenticação com sessões e controle de acesso
 * Arquivo    : 04_sessoes/painel.php
 * Autor      : Mandy Abade Antunes
 */

session_start();

require_once __DIR__ . '/includes/auth.php';
requer_login();

if (!isset($_SESSION['visitas'])) {
    $_SESSION['visitas'] = 0;
}
$_SESSION['visitas']++;

$mensagem = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$titulo_pagina = 'Painel — Área Restrita';
$caminho_raiz = '../';
$pagina_atual = '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>

<div class="container">

    <?php if ($mensagem): ?>
        <div class="flash-message">
            <?php echo htmlspecialchars($mensagem); ?>
        </div>
    <?php endif; ?>

    <div class="alerta-sucesso">
        <h3>✅ Você está autenticado!</h3>
        <p><strong>Usuário:</strong>
            <?php echo htmlspecialchars($_SESSION['usuario']); ?> </p>
        <p><strong>Login realizado em:</strong>
            <?php echo htmlspecialchars($_SESSION['logado_em'] ?? '-'); ?> </p>
        <p><strong>Quantidade de visitas na sessão:</strong>
            <?php echo htmlspecialchars($_SESSION['visitas'] ?? '-'); ?> </p>
    </div>

    <div class="card">
        <h3>🗄️ Painel de Controle</h3>
        <p>Este conteúdo so é visivel para usuários autenticados. </p>
        <a href="../05_crud/index.php" class="btn-primario">
            📁 Gerenciar Projetos
        </a>
    </div>

    <p style="margin-top: 24px; text-align: center;">
        <a href="perfil.php" style = "background: #2394c0; color: white; padding: 10px 24px; 
        border-radius: 6px; text-decoration: none; font-weight: bold;">
            👨‍💻Perfil do usuário
        </a>
    </p>

    <p style="margin-top: 24px; text-align: center;">
        <a href="logout.php" style = "background: #cf1c21; color: white; padding: 10px 24px; 
        border-radius: 6px; text-decoration: none; font-weight: bold;">
            🚪Sair
        </a>
    </p>

</div>

<?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>