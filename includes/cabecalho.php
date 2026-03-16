
<?php
/**
 * ===============================================================
 * Arquivo: includes/cabecalho.php 
 * Disciplina: Desenvolvimento Web II (2026-DWII)
 * Aula: 03 - Aruqitetura Web e Introdução ao PHP
 * Autor: Mandy Abade Antunes
 * ===============================================================
 */


if (!isset($titulo_pagina)) $titulo_pagina = "Portifólio DWII";
if (!isset($caminho_raiz)) $caminho_raiz = "../";
?>


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo htmlspecialchars($titulo_pagina); ?></title>

<link rel="stylesheet" href="<?php echo $caminho_raiz; ?>includes/style.css">

<?php
include __DIR__ . '/nav.php';
?>