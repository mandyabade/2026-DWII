<?php
    $nome = "Mandy Abade Antunes";
    $profissao = "Estudante de Tecnologia";
    $curso = "Técnico em Informática - IFPR";
    $pagina_atual = "inicio";
    $caminho_raiz   = "../";
    $titulo_pagina  = "Portfólio – {$nome}";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include '../includes/cabecalho.php'; ?>
</head>

<body>

    <nav>
        <?php include '../includes/cabecalho.php'; ?>
    </nav>

    <div class="hero">
        <h1><?php echo $nome; ?></h1>
        <p><?php echo $profissao; ?> | <?php echo $curso; ?></p>
    </div>

    <div class="container">
        <h2>Bem-vindo ao meu portfólio</h2>
        <p>Esta página foi gerada pelo PHP em:
        <strong><?php echo date("d/m/Y \a\s H:i:s"); ?></strong></p>
    </div>

    <?php include '../includes/rodape.php'; ?>

</body>
</html>