<!--
    Disciplina: Desenvolvimento Web II (DWII)
    Aula: 05 - PHP + MariaDB: peristência de dados via PDO
    Autor: Mandy Abade Antunes
    Data: 10/03/2026
    -->

<?php
    //Variaveis do cabeçalho global
    $titulo_pagina = "Catálogo de Tecnologias";
    $pagina_atual = "catalogo";

    //Incluir conexao PDO
    require_once 'includes/conexao.php';

    // filtros
    $categoria = $_GET['categoria'] ?? null;
    $busca = $_GET['busca'] ?? null;

    // SQL base
    $sql = "SELECT * FROM tecnologias WHERE 1=1";
    $params = [];

    // filtro por categoria
    if ($categoria) {
        $sql .= " AND categoria = :categoria";
        $params['categoria'] = $categoria;
    }

    // busca por texto
    if ($busca) {
        $sql .= " AND (nome LIKE :busca_nome OR descricao LIKE :busca_desc)";
        $params['busca_nome'] = "%$busca%";
        $params['busca_desc'] = "%$busca%";
    }

    $sql .= " ORDER BY nome ASC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $tecnologias = $stmt->fetchAll();

    // categorias únicas
    $stmtCat = $pdo->query("SELECT DISTINCT categoria FROM tecnologias ORDER BY categoria");
    $categorias = $stmtCat->fetchAll(PDO::FETCH_COLUMN);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
   <?php include 'includes/cab_pdo.php';?>
</head>
<body>
    <div class="container">
        <h1 class="titulo-secao">🗃️ Catálogo de Tecnologias</h1>

        <form method="GET" action="index.php" style="margin-bottom:20px;">
            <input type="text" name="busca" placeholder="Buscar tecnologia..."
                value="<?php echo htmlspecialchars($busca ?? ''); ?>">

            <button type="submit">Buscar</button>
        </form>

        <p style="color: #6b7280; margin-bottom: 20px;">
            <?php echo count($tecnologias); ?> tecnologia(s) cadastrada(s)
        </p>

        <div class="categorias">

        <strong>Categorias:</strong>

        <a href="index.php">Todas</a>

        <?php foreach ($categorias as $cat): ?>
            <a href="index.php?categoria=<?php echo urlencode($cat); ?>">
                <?php echo htmlspecialchars($cat); ?>
            </a>
        <?php endforeach; ?>

        </div>

        <!-- loop pelos registros do banco -->
        <?php foreach ($tecnologias as $tec): ?>
            <div class="card">
                <div style="display: flex; justify-content: space-between; align-items: center;">

                    <h3><?php echo htmlspecialchars($tec['nome']); ?></h3>
                    <span style="background: #e8edf5; color: #3b579d; padding: 3px 10px; border-radius: 20px; font-size: 13px">
                        <?php echo htmlspecialchars($tec['categoria']); ?>
                    </span>
                </div>
                <p><?php echo htmlspecialchars($tec['descricao']);?></p>
                <a href="detalhe.php?id=<?php echo $tec['id']; ?><?php if($categoria) echo '&categoria='.$categoria; ?>" style="color: #3b579d; font-size: 14px; font-weight: bold; display: inline-block; margin-top: 10px;">
                    Ver detalhes ->
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Rodape global-->
     <?php include 'includes/rod_pdo.php'; ?>
    
</body>
</html>