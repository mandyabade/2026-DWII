<!--
    Disciplina: Desenvolvimento Web II (DWII)
    Aula: 05 - PHP + MariaDB: peristência de dados via PDO
    Autor: Mandy Abade Antunes
    Data: 10/03/2026
    -->

<?php
    $titulo_pagina = "404 - Registro não encontrado";
?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'includes/cab_pdo.php'; ?>
</head>

<body>

    <div class="container">
        <h1>404</h1>
        <p>Tecnologia não encontrada.</p>   
        <a href="index.php">Voltar ao catálogo</a>
    </div>

    <?php include 'includes/rod_pdo.php'; ?>

</body>
</html>
