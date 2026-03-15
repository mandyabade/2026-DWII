<?php
if (!isset($pagina_atual)) $pagina_atual = "";
if (!isset($caminho_raiz)) $caminho_raiz = "../";

function menu_class($item, $atual){
    return ($item === $atual) ? 'class="ativo"' : '';
}
?>

<nav>
    <a href="<?php echo $caminho_raiz; ?>01_php-intro/index.php"
        <?php echo menu_class("inicio", $pagina_atual); ?>>
        🏠 Início
    </a>

    <a href="<?php echo $caminho_raiz; ?>01_php-intro/sobre.php"
        <?php echo menu_class("sobre", $pagina_atual); ?>>
        👤 Sobre
    </a>

    <a href="<?php echo $caminho_raiz; ?>01_php-intro/projetos.php"
        <?php echo menu_class("projetos", $pagina_atual); ?>>
        🚀 Projetos
    </a>

    <a href="<?php echo $caminho_raiz; ?>02_formularios/contato.php"
        <?php echo menu_class("contato", $pagina_atual); ?>>
        📮 Contato
    </a>
</nav>