<?php

/**
 * ===============================================================
 * Arquivo: 02_formularios/obrigado.php 
 * Disciplina: Desenvolvimento Web II (2026-DWII)
 * Aula: 03 - Aruqitetura Web e Introdução ao PHP
 * Autor: Mandy Abade Antunes
 * ===============================================================
 */


$nome = "Mandy Abade Antunes";
$pagina_atual = "contato";
$caminho_raiz = "../";
$titulo_pagina = "Obrigado!";

$nome_visitante = htmlspecialchars($_GET['nome'] ?? 'visitante');
$assunto = htmlspecialchars($_GET['assunto'] ?? '');

?>

<?php include '../includes/cabecalho.php'; ?>

<div class="container confirmacao">
    <p class="confirmacao-icone">✅</p>

    <h1 class="confirmacao-titulo">
        Obrigado, <?php echo $nome_visitante; ?>!
    </h1>

    <p class= "confirmacao-assunto">
        Assunto da mensagem: <?php echo $assunto; ?></p>

    <p class="confirmacao-texto">
        Sua mensagem foi recebida. Entrarei em contato em breve.
    </p>

    <a href="contato.php" class="btn">← Enviar outra mensagem</a>
</div>

<?php include '../includes/rodape.php'; ?>
