<?php
/**
 * Disciplina : Desenvolvimento Web II (DWII)
 * Aula       : 06 – Autenticação com sessões e controle de acesso
 * Arquivo    : 04_sessoes/includes/auth.php
 * Autor      : Mandy Abade Antunes
 */

function requer_login(): void
{
    if (session_status()=== PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['usuario'])) {
        header('Location: login.php');
        exit;
    }
}

function usuario_logado(): string
{
    return $_SESSION['usuario'] ?? '';
}
?>