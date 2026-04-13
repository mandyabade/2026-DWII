<?php
/**
 * Disciplina : Desenvolvimento Web II (DWII)
 * Aula       : 08 — CRUD: Create e Read
 * Arquivo    : 05_crud/editar.php
 * Autor: Mandy Abade Antunes
 * Data: 06/04/2026
 * Descrição: implementa o Update do CRUD. Este arquivo tem tres responsabilidades: 
 * validar o id recebido via GET; 
 * exibir formulario preenchio com dados atuais;
 * processar as alterações e executar update
 */

require_once __DIR__ . '/../04_sessoes/includes/auth.php';
requer_login();

require_once __DIR__ . '/includes/conexao.php';

$id = (int) ($_GET['id'] ?? 0);

if ($id <= 0) {
    header('Location: index.php?erro=id_invalido');
    exit;
}

$pdo = conectar();
$stmt = $pdo->prepare('SELECT * FROM projetos WHERE id = :id');
$stmt->execute(['id' => $id]);
$projeto = $stmt->fetch();

if (!$projeto) {
    header('Location: index.php?erro=nao_encontrado');
    exit;
}

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome        = trim($_POST['nome'] ?? '');
    $descricao   = trim($_POST['descricao'] ?? '');
    $tecnologias = trim($_POST['tecnologias'] ?? '');
    $link_github = trim($_POST['link_github'] ?? '');
    $ano = (int) ($_POST['ano'] ?? 0);
    $anoAtual = (int) date('Y');

    if ($nome === '' || $descricao === '' || $tecnologias === '') {
        $erro = 'Preencha todos os campos obrigatórios.';
    }

    if ($ano < 2000 || $ano > $anoAtual) {
        $erro = 'O ano deve estar entre 2000 e ' . $anoAtual . '.';
    }

    if ($erro === '') {
        $sql = 'UPDATE projetos
                SET nome = :nome,
                    descricao = :descricao,
                    tecnologias = :tecnologias,
                    link_github = :link_github,
                    ano = :ano
                WHERE id = :id';

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome'         => $nome,
            ':descricao'    => $descricao,
            ':tecnologias'  => $tecnologias,
            ':link_github'  => $link_github !== '' ? $link_github : null,
            ':ano'          => $ano,
            ':id'           => $id,
        ]);

        header('Location: index.php?editado=ok');
        exit;
    }

    $projeto['nome']         = $nome;
    $projeto['descricao']    = $descricao;
    $projeto['tecnologias']  = $tecnologias;
    $projeto['link_github']  = $link_github;
    $projeto['ano']          = $ano;
}

$titulo_pagina = 'Editar Projeto — Portfólio';
$caminho_raiz  = '../';
$pagina_atual  = '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>

<div class="container">

    <h1 class="titulo-secao">✏️ Editar Projeto</h1>

    <?php if ($erro): ?>
        <div class="alerta-erro">
            <p style="margin: 0;">⚠️ <?php echo htmlspecialchars($erro); ?></p>
        </div>
    <?php endif; ?>

    <form action="editar.php?id=<?php echo $id; ?>" method="post" class="formulario">

        <div class="campo">
            <label class="label-campo">Nome do Projeto *</label>
            <input type="text" name="nome" class="input-texto"value="<?php echo htmlspecialchars($projeto['nome']); ?>">
        </div>

        <div class="campo">
            <label class="label-campo">Descrição *</label>
            <textarea name="descricao" class="input-texto" rows="4"><?php echo htmlspecialchars($projeto['descricao']); ?></textarea>
        </div>

        <div class="campo">
            <label class="label-campo">Tecnologias *</label>
            <input type="text" name="tecnologias" class="input-texto" value="<?php echo htmlspecialchars($projeto['tecnologias']); ?>">
        </div>

        <div class="campo">
            <label class="label-campo">Link Github (opcional)</label>
            <input type="url" name="link_github" class="input-texto" value="<?php echo htmlspecialchars($projeto['link_github'] ?? ''); ?>">
        </div>

        <div class="campo">
            <label class="label-campo">Ano *</label>
            <input type="number" name="ano" class="input-texto" value="<?php echo (int) $projeto['ano']; ?>" min="2000" max="2099">
        </div>

        <div style="display: flex; gap: 12px; margin-top: 8px;">
            <button type="submit" class="btn-primario">💾 Salvar Alterações</button>
            <a href="index.php" class="btn-secundario">Cancelar</a>
        </div>

    </form>

</div>

<?php require_once __DIR__ . '/../includes/rodape.php'; ?>

</body>
</html>