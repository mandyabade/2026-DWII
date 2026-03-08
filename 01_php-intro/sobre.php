<?php
    $nome = "Mandy Abade Antunes";
    $pagina_atual = "sobre";
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sobre <?php echo $nome; ?></title>
    </head>

    <body style="font-family: Arial, sans-serif; margin: 0; background: #fffdde;">

        <?php include 'includes/cabecalho.php'; ?>

        <div style="max-width: 800px; margin: 40px auto; padding: 0 20px;">
            <h1 style="color: #621c69bd;">Sobre mim</h1>

            <p>Olá! Eu sou a <strong><?php echo $nome; ?></strong>, estudante de Técnico em Informática no IFPR de Ponta Grossa.</p>

            <p> Gosto de progamar, criar páginas web e principalmente de banco de dados. Pretendo seguir carreira na área de tecnologia. 
                <br> 
            <p>Fora da vida acadêmica gosto de ir à academia, correr, assistir séries novas e ouvir música. </p>

            <a href="index.php" style="color: #621c69bd; font-weight: bold;">
                Voltar ao início
            </a>

        </div>

        <?php include 'includes/rodape.php'; ?>

    </body>
</html>