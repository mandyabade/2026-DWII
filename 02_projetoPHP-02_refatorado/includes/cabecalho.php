<?php
/**
 * ════════════════════════════════════════════════════════════
 * Disciplina : Desenvolvimento Web II (DWII)
 * Projeto    : Portfólio Pessoal — versão refatorada
 * Arquivo    : includes/cabecalho.php
 * Autor      : Mandy Abade Antunes
 * Data       : 13/04/2026
 * Descrição  : Cabeçalho global do projeto.
 *              Responsabilidades:
 *              1. Iniciar sessão de forma segura (session_start)
 *              2. Gerar <meta>, <title> e <link> para o CSS
 *              3. Incluir nav.php (navegação condicional)
 *
 * Variáveis esperadas na página que inclui este arquivo:
 *   $titulo_pagina — string: texto da aba do navegador
 *   $caminho_raiz  — string: caminho relativo até a raiz ('.')
 *   $pagina_atual  — string: nome da página atual (para o nav)
 *                    Ex.: 'inicio' | 'sobre' | 'projetos' |
 *                         'contato' | 'catalogo' | 'login' | ''
 * ════════════════════════════════════════════════════════════
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($titulo_pagina)) $titulo_pagina = 'Portfólio DWII';
if (!isset($caminho_raiz))  $caminho_raiz  = './';
if (!isset($pagina_atual))  $pagina_atual  = '';
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo htmlspecialchars($titulo_pagina); ?></title>

<link rel="stylesheet" href="<?php echo $caminho_raiz; ?>includes/style.css">

<?php
include __DIR__ . '/nav.php';
?>