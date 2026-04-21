<?php
/**
 * ===============================================================
 * Arquivo: 01_php-intro/sobre.php 
 * Disciplina: Desenvolvimento Web II (2026-DWII)
 * Autor: Mandy Abade Antunes
 * ===============================================================
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    $nome = "Mandy Abade Antunes";
    $profissao = "Estudante de Tecnologia";
    $curso = "Técnico em Informática - IFPR";
    $pagina_atual = "sobre";
    $caminho_raiz   = "../";
    $titulo_pagina  = "Sobre mim – {$nome}";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>

    <div class="sobre">
        <h1>👤 Sobre mim</h1>
        <p>
            Olá! Sou <strong><?php echo $nome; ?></strong>, <?php echo $profissao; ?>,
            cursando <?php echo $curso; ?>.
        </p>
        <br>
        <p>
            Gosto muito de programar e explorar novas possibilidades dentro do desenvolvimento web, principalmente na criação de 
            páginas que sejam não apenas funcionais, mas também organizadas e agradáveis para o usuário. Tenho um 
            interesse especial por banco de dados, pois acho fascinante a forma como as informações podem ser 
            estruturadas, armazenadas e manipuladas de maneira eficiente para dar suporte às aplicações.
            Ao longo da minha jornada, venho buscando aprimorar minhas habilidades técnicas e aprender cada vez mais 
            sobre boas práticas de desenvolvimento, sempre tentando entender não só o “como”, mas também o “porquê” 
            das soluções. Acredito que essa curiosidade é essencial para evoluir na área de tecnologia.
            Fora da vida acadêmica, gosto de manter uma rotina equilibrada. Costumo ir à academia, o que me ajuda a 
            cuidar da saúde e também a manter o foco no dia a dia. Além disso, gosto bastante de assistir séries, 
            principalmente para relaxar e conhecer novas histórias, e ouvir música em diferentes momentos do dia, seja 
            para estudar, programar ou simplesmente descansar.        
        </p>
    </div>

    <?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>
