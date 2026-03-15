<?php

$autor = isset($nome) ? htmlspecialchars($nome) : "Portifólio";
?>

<footer>
    <?php echo $autor; ?>
    &copy; <?php echo date("Y"); ?>
    | Desenvolvido com PHP
    | IFPR - Ponta Grossa
</footer>