<?php
/**
 * Disciplina: Desenvolvimento Web II (DWII)
 * Aula: 05 - PHP + MariaDB: peristência de dados via PDO
 * Autor: Mandy Abade Antunes
 * Data: 10/03/2026
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$pagina_atual = 'catalogo';
$titulo_pagina = 'Catálogo de Tecnologias | Portfólio DWII';
$caminho_raiz = './';

require_once __DIR__ . '/includes/conexao.php';

$pdo = conectar();

$categoria = $_GET['categoria'] ?? null;
$busca = $_GET['busca'] ?? null;
$sql = "SELECT * FROM tecnologias WHERE status = 'ativo' ";
$params = [];

if ($categoria) {
    $sql .= " AND categoria = :categoria";
    $params['categoria'] = $categoria;
}

if ($busca) {
    $sql .= " AND (nome LIKE :busca_nome OR descricao LIKE :busca_desc)";
    $params['busca_nome'] = "%$busca%";
    $params['busca_desc'] = "%$busca%";
}

$sql .= " ORDER BY nome ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$tecnologias = $stmt->fetchAll();

$stmtCat = $pdo->query("SELECT DISTINCT categoria FROM tecnologias ORDER BY categoria");
$categorias = $stmtCat->fetchAll(PDO::FETCH_COLUMN);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php
require_once __DIR__ . '/includes/cabecalho.php';
?>
</head>
<body>
<div class="container">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h1 class="titulo-secao" style="margin:0;">
            🗃️ Catálogo de Tecnologias
        </h1>

        <span style="color:#6b7280; font-size:14px;">
            <?php echo count($tecnologias); ?> tecnologia(s)
        </span>

    </div>

    <form method="GET" action="catalogo.php" style="margin-bottom:20px;">
        <input type="text" name="busca" placeholder="Buscar tecnologia...">        
        <button type="submit"> Buscar </button>
    </form>

    <div class="categorias" style="margin-bottom:20px;">
        <strong>Categorias:</strong>
        <a href="catalogo.php">
            Todas
        </a>
        <?php foreach ($categorias as $cat): ?>
            <a href="catalogo.php?categoria=<?php echo urlencode($cat); ?><?php if($busca) echo '&busca=' . urlencode($busca); ?>">
                <?php echo htmlspecialchars($cat); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <?php if (empty($tecnologias)): ?>
        <div class="card" style="text-align:center; padding:40px 20px; color:#6b7280;">
            <p style="font-size:40px; margin:0 0 12px;">
                🧩
            </p>
            <p style="font-size:16px; margin:0;">
                Nenhuma tecnologia ativa encontrada.
            </p>
        </div>
    <?php else: ?>

        <?php foreach ($tecnologias as $tec): ?>
            <div class="card">
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <h3 style="margin:0;">
                        <?php echo htmlspecialchars($tec['nome']); ?>
                    </h3>

                    <span style=" background:#e8edf5; color:#3b579d; padding:3px 10px; border-radius:20px; font-size:13px; white-space:nowrap;">
                        <?php echo htmlspecialchars($tec['categoria']); ?>
                    </span>
                </div>

                <p style="margin:10px 0;">
                    <?php echo htmlspecialchars($tec['descricao']); ?>
                </p>

                <a href="detalhe.php?id=<?php echo (int) $tec['id']; ?><?php if($categoria) echo '&categoria=' . urlencode($categoria); ?>" class="btn-secundario">
                    Ver detalhes →
                </a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>


<?php require_once __DIR__ . '/includes/rodape.php'; ?>
</body>
</html>