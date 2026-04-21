<?php
/**
 * Disciplina : Desenvolvimento Web II (DWII)
 * Aula       : 07 — CRUD: Create e Read
 * Arquivo    : 05_crud/detalhes.php
 * Autor: Mandy Abade Antunes
 * Data: 05/04/2026
 * Descrição: Lita todos os projetos cadastrados no banco (read)
 */

require_once 'includes/conexao.php';

$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
    die('ID inválido');
}

$pdo = conectar();

$stmt = $pdo->prepare("SELECT * FROM projetos WHERE id = :id");
$stmt->execute([':id' => $id]);

$projeto = $stmt->fetch();

if (!$projeto) {
    die('Projeto não encontrado');
}

$titulo_pagina = 'Detalhes';
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

        <h1 class="titulo-secao" style="margin-bottom: 18px;">
            <?php echo htmlspecialchars($projeto['nome']); ?>
        </h1>

        <div style="color: #374151; line-height: 1.6;">

            <div style="margin-bottom: 14px;">
                <strong>Descrição</strong>
                <div>
                    <?php echo nl2br(htmlspecialchars($projeto['descricao'])); ?>
                </div>
            </div>

            <div style="margin-bottom: 14px;">
                <strong>Tecnologias</strong>
                <div>
                    <?php echo htmlspecialchars($projeto['tecnologias']); ?>
                </div>
            </div>

            <div style="margin-bottom: 14px;">
                <strong>Ano:</strong>
                <?php echo htmlspecialchars($projeto['ano']); ?>
            </div>

            <?php if ($projeto['link_github']): ?>
                <div style="margin-top: 10px;">
                    <a href="<?php echo htmlspecialchars($projeto['link_github']); ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="btn-secundario"
                    style="color: #e8aeff;">
                    🔗 Acessar no GitHub
                    </a>
                </div>
            <?php endif; ?>

            <div style="margin-top: 24px;">
                <a href="index.php" style="color: #e8aeff;">
                    <- Voltar para projetos
                </a>
            </div>

        </div>

    </div>

    <?php require_once __DIR__ . '/../includes/rodape.php'; ?>

</body>
</html>
