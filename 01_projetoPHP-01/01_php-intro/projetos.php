<?php
/**
 * ===============================================================
 * Arquivo: 01_php-intro/projetos.php 
 * Disciplina: Desenvolvimento Web II (2026-DWII)
 * Aula: 03 - Aruqitetura Web e Introdução ao PHP
 * Autor: Mandy Abade Antunes
 * ===============================================================
 */
    $nome = "Mandy Abade Antunes";
    $curso = "Técnico em Informática - IFPR";
    $pagina_atual = "projetos"; 
    $caminho_raiz = "../"; 
    $titulo_pagina = "Projetos - {$nome}";
    ?>


<body style="font-family: Arial, sans-serif; margin: 0; background: white;">
    
<?php include '../includes/cabecalho.php'; ?>

   <div style="max-width: 800px; margin: 40px auto; padding: 0 20px;">
        <h1 style="color: #ab5084 ;"> Meus Projetos</h1>
        <p>No meu curso <strong><?php echo $curso; ?></strong>, desenvolvi alguns projetos nocurso até agora, 
        alguns deles são:</p><br>
        <h2>Site Portfólio HTML/CSS</h2>
        <p>Este site de porfólio foi um dos sites feitos na disciplina de Desenvolvimento Web II, utilizando HTML e CSS.</p><br>

        <h2>Projeto Final de Desenvolvimento Web I</h2>
        <p>Esse projeto desenvolivdo como avaliação final da disciplina de Desenvolvimento Web I, onde utilizeitodos os conteúdos vistos durante o ano.</p><br>
        <a href="index.php"
        style="color: #551a8b ; font-weight: bold;"> Voltar ao início</a>
    </div>  
<?php include '../includes/rodape.php'; ?>
</body>
</body>
</html>