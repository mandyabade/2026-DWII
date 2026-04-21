<?php
/**
 * Disciplina : Desenvolvimento Web II (DWII)
 * Aula       : 06 – Autenticação com sessões e controle de acesso
 * Arquivo    : 04_sessoes/perfil.php
 * Autor      : Mandy Abade Antunes
 */

session_start();
require_once __DIR__ . '/includes/auth.php';
requer_login();

$usuario  = $_SESSION['usuario'] ?? '-';
$login_em = $_SESSION['logado_em'] ?? '-';
$visitas  = $_SESSION['visitas'] ?? '-';

$titulo_pagina = 'Perfil do Usuário';
$caminho_raiz = '../';
$pagina_atual = '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>

<div class="container">

    <div class="card">
        <h2>👤 Meu Perfil</h2>
        <ul style="list-style: none; padding: 0;">
            <li>
                <strong>Usuário:</strong>
                <?php echo htmlspecialchars($usuario); ?>
            </li>
            <li style="margin-top: 8px;">
                <strong>Data do login:</strong>
                <?php echo htmlspecialchars($login_em); ?>
            </li>
            <li style="margin-top: 8px;">
                <strong>Acessos nesta sessão:</strong>
                <?php echo htmlspecialchars($visitas); ?>
            </li>
        </ul>
    </div>

    <div style="margin-top: 20px;">
        <a href="painel.php"
           style="color: #2394c0; font-weight: bold; text-decoration: none;">
            <- Voltar ao painel
        </a>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>