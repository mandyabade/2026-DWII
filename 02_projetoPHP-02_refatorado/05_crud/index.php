<?php
/**
 * Disciplina : Desenvolvimento Web II (DWII)
 * Aula       : 07 — CRUD: Create e Read
 * Arquivo    : 05_crud/index.php
 * Autor: Mandy Abade Antunes
 * Data: 30/03/2026
 * Descrição: Lita todos os projetos cadastrados no banco (read)
 */

require_once __DIR__ . '/../04_sessoes/includes/auth.php';
requer_login();

require_once __DIR__ . '/includes/conexao.php';

$pdo = conectar();
$sqlCategorias = "SELECT DISTINCT tecnologias FROM projetos ORDER BY tecnologias";
$stmtCategorias = $pdo->query($sqlCategorias);
$categorias = $stmtCategorias->fetchAll();

$categoria = $_GET['categoria'] ?? null;
$busca = $_GET['busca'] ?? null;

// SQL base
$sql = "SELECT * FROM projetos WHERE 1=1";
$params = [];

// filtro por tecnologia (categoria)
if ($categoria) {
    $sql .= " AND tecnologias LIKE :categoria";
    $params[':categoria'] = "%$categoria%";
}

// busca por texto (nome + descrição)
if ($busca) {
    $sql .= " AND nome LIKE :busca";
    $params[':busca'] = "%$busca%";
}

$sql .= " ORDER BY criado_em DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$projetos = $stmt->fetchAll();

$cadastroOk = isset($_GET['cadastro']) && $_GET['cadastro'] === 'ok';
$editadoOk = isset($_GET['editado']) && $_GET['editado'] === 'ok';
$excluidoOk = isset($_GET['excluido']) && $_GET['excluido'] === 'ok';
$erroMsg = isset($_GET['erro']) ? $_GET['erro'] : '';


$titulo_pagina = 'Meus Projetos — Portifólio';
$caminho_raiz = '../';
$pagina_atual = '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>

<div class="container">

    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; margin-bottom: 20px;">
        <h1 class="titulo-secao" style="margin: 0;"> Meus Projetos</h1>
        <a href="cadastrar.php" class="btn-primario"> Novo Projeto </a>
    </div>

    <?php if($cadastroOk): ?>
        <div class="alerta-sucesso">
            <p style="margin:0;">Projeto cadastrado com sucesso!</p>
        </div>
    <?php endif; ?>

    <?php if($editadoOk): ?>
        <div class="alerta-sucesso">
            <p style="margin:0;">Projeto atualizado com sucesso!</p>
        </div>
    <?php endif; ?>

    <?php if($excluidoOk): ?>
        <div class="alerta-sucesso">
            <p style="margin:0;">Projeto excluido com sucesso!</p>
        </div>
    <?php endif; ?>

    <?php if($erroMsg === 'nao_encontrado'): ?>
        <div class="alerta-erro">
            <p style="margin:0;">Projeto não encontrado. Ele pode já ter sido removido.</p>
        </div>
    <?php elseif($erroMsg === 'id_invalido'): ?>
        <div class="alerta-erro">
            <p style="margin:0;">Requisição inválida.</p>
        </div>
    <?php endif; ?>

    <form method="GET" style="margin-bottom:20px;">
        <input type="text" name="busca" placeholder="Buscar por nome..."
            value="<?php echo htmlspecialchars($busca ?? ''); ?>">

        <button type="submit">Buscar</button>
    </form>

    <div class="categorias" style="margin-bottom: 20px;">
        <strong>Filtrar por tecnologia:</strong>

        <form method="GET" style="display:inline;">
            <select name="categoria" onchange="this.form.submit()">
                <option value="">Todas</option>

                <?php foreach ($categorias as $cat): ?>
                    <option value="<?php echo htmlspecialchars($cat['tecnologias']); ?>"
                        <?php echo ($categoria === $cat['tecnologias']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($cat['tecnologias']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>

    <?php if (empty($projetos)): ?>
        <!-- Estado vazio: nenhum projeto ainda -->
        <div class="card" style="text-align: center; padding: 40px 20px; color: #6b7280;">
            <p style="font-size: 40px; margin: 0 0 12px;">📁</p>
            <p style="font-size: 16px; margin: 0 0 16px;">Nenhum projeto cadastrado ainda.</p>
            <a href="cadastrar.php" class="btn-primario">Cadastrar o primeiro projeto</a>
        </div>

    <?php else: ?>
        <!-- Grade de projetos -->
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px;">
            <?php foreach ($projetos as $projeto): ?>
                <div class="card">
                    <h3 style="margin: 0 0 8px; color: #3b579d; font-size: 17px;">
                        <?php echo htmlspecialchars($projeto['nome']); ?>
                    </h3>

                    <p style="margin: 0 0 10px; font-size: 14px; color: #374151; line-height: 1.6;">
                        <?php echo htmlspecialchars($projeto['descricao']); ?>
                    </p>

                    <p style="margin: 0 0 6px; font-size: 13px; color: #6b7280;">
                        🛠 <?php echo htmlspecialchars($projeto['tecnologias']); ?>
                    </p>

                    <p style="margin: 0 0 12px; font-size: 13px; color: #6b7280;">
                        📅 <?php echo htmlspecialchars($projeto['ano']); ?>
                    </p>

                    <?php if ($projeto['link_github']): ?>
                        <a href="<?php echo htmlspecialchars($projeto['link_github']); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="btn-secundario">🔗 Ver no GitHub</a>
                    <?php endif; ?>
                    
                    <a href="detalhes.php?id=<?php echo $projeto['id']; ?>">
                        Ver detalhes
                    </a>

                    <div style="margin-top: 12px; display: flex; gap: 8px; flex-wrap: wrap;">
                        <a href="editar.php?id=<?php echo (int) $projeto['id']; ?>"
                        class="btn-secundario">✏️ Editar</a>
                        <a href="excluir.php?id=<?php echo (int) $projeto['id']; ?>"
                        class="btn-perigo">🗑️ Excluir</a>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>

        <p style="margin-top: 16px; font-size: 14px; color: #6b7280; text-align: right;">
            <?php echo count($projetos); ?> projeto(s) cadastrado(s)
        </p>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/rodape.php'; ?>

</body>
</html>