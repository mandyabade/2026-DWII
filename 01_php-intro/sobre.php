<?php
/**
 * ===============================================================
 * Arquivo: 01_php-intro/sobre.php 
 * Disciplina: Desenvolvimento Web II (2026-DWII)
 * Aula: 03 - Aruqitetura Web e Introdução ao PHP
 * Autor: Mandy Abade Antunes
 * ===============================================================
 */

    $nome = "Mandy Abade Antunes";
    $profissao = "Estudante de Tecnologia";
    $curso = "Técnico em Informática - IFPR";
    $pagina_atual = "sobre";
    $caminho_raiz   = "../";
    $titulo_pagina  = "Portfólio – {$nome}";
?>


<?php include '../includes/cabecalho.php'; ?>

    <div class="sobre">
        <h1>👤 Sobre mim</h1>
        <p>
            Olá! Sou <strong><?php echo $nome; ?></strong>, estudante de
            Técnico em Informática no IFPR de Ponta Grossa.
        </p>
        <p>
            Gosto de programar, criar páginas web e principalmente de banco de dados, mas fora da vida acadêmica gosto de ir à academia, assistir séries novas e ouvir música.        
        </p>
    </div>

<?php include '../includes/rodape.php'; ?>

