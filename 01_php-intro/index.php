<?php
    $nome = "Mandy Abade Antunes";
    $profissao = "Estudante de Tecnologia";
    $curso = "Técnico em Informática - IFPR";
    $pagina_atual = "inicio";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Portfólio <?php echo $nome; ?></title>

    <style>
        body { 
            font-family: Arial, sans-serif; margin: 0; background: #fffdde; 
        }

        nav {
            background: linear-gradient(135deg, #cfa9d3ce, #cfa9d3ab);
            padding: 15px 30px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .hero {
            background: linear-gradient(135deg, #cfa9d3ce, #cfa9d3ab);
            color: white;
            text-align: center;
            padding: 60px 20px;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
            text-align: left;
        }

        footer {
            background: linear-gradient(135deg, #cfa9d3ce, #cfa9d3ab);
            color: #6b7280;
            text-align: center;
            padding: 20px;
            margin-top: 60px;
            font-size: 14px;
        }
    </style>

</head>

<body>

    <nav>
        <?php include 'includes/cabecalho.php'; ?>
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

    <footer>
        <?php include 'includes/rodape.php'; ?>
    </footer>

</body>
</html>