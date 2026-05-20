<?php
/**
 * Disciplina: Desenvolvimento Web II (DWII)
 * Aula: 05 - PHP + MariaDB: persistência de dados via PDO
 * Autor: Mandy Abade Antunes
 * Data: 10/03/2026
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$caminho_raiz = '../';
$pagina_atual = 'catalogo';

require_once __DIR__ . '/includes/conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$categoria = $_GET['categoria'] ?? null;

if (!$id || $id <= 0) {
    header('Location: catalogo.php');
    exit;
}

$pdo = conectar();
$stmt = $pdo->prepare("SELECT * FROM tecnologias WHERE id = :id AND status = 'ativo' LIMIT 1");
$stmt->execute(['id' => $id]);
$tec = $stmt->fetch();

if (!$tec) {
    header('Location: catalogo.php');
    exit;
}

$titulo_pagina = htmlspecialchars($tec['nome']) . ' | Portfólio DWII';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include __DIR__ . '/includes/cabecalho.php'; ?>
</head>
<body>
<div class="container">
    <a href="catalogo.php<?php if ($categoria) echo '?categoria=' . urlencode($categoria); ?>"class="btn-secundario" style="display: inline-block; margin-bottom: 20px;">
        ← Voltar ao catálogo
    </a>

    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 12px;">
            <h1 style="margin: 0;">
                <?php echo htmlspecialchars($tec['nome']); ?>
            </h1>

            <span style=" background: #e8edf5; color: #3b579d; padding: 4px 12px; border-radius: 20px; font-size: 14px; white-space: nowrap;">
                <?php echo htmlspecialchars($tec['categoria']); ?>
            </span>
        </div>

        <p style="margin-top: 18px; line-height: 1.6;">
            <?php echo htmlspecialchars($tec['descricao']); ?>
        </p>

        <table style=" width: 100%; border-collapse: collapse; margin-top: 24px; font-size: 14px;">
            <tr style="background: #f3f4f6;">
                <td style=" padding: 10px; border: 1px solid #e5e7eb; font-weight: bold; width: 180px;">
                    ID
                </td>

                <td style="padding: 10px; border: 1px solid #e5e7eb;">
                    <?php echo $tec['id']; ?>
                </td>
            </tr>

            <tr>
                <td style=" padding: 10px; border: 1px solid #e5e7eb; font-weight: bold;">
                    Ano de criação
                </td>

                <td style="padding: 10px; border: 1px solid #e5e7eb;">
                    <?php echo htmlspecialchars($tec['ano_criacao']); ?>
                </td>
            </tr>

            <tr style="background: #f3f4f6;">
                <td style=" padding: 10px; border: 1px solid #e5e7eb; font-weight: bold;">
                    Cadastrado em
                </td>

                <td style="padding: 10px; border: 1px solid #e5e7eb;">
                    <?php echo date( 'd/m/Y', strtotime($tec['criado_em'])); ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php include __DIR__ . '/includes/rodape.php'; ?>
</body>
</html>