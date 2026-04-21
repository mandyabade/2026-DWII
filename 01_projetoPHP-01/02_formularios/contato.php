<?php

/**
 * ===============================================================
 * Arquivo: 02_formularios/contato.php 
 * Disciplina: Desenvolvimento Web II (2026-DWII)
 * Aula: 03 - Aruqitetura Web e Introdução ao PHP
 * Autor: Mandy Abade Antunes
 * ===============================================================
 */



$nome = "Mandy Abade Antunes";
$pagina_atual = "contato";
$caminho_raiz = "../";
$titulo_pagina = "Contato";

$nome_visitante = '';
$mensagem       = '';
$email       = '';
$assunto       = '';
$erros          = [];  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome_visitante = trim($_POST['nome_visitante'] ?? '');
    $mensagem = trim($_POST['mensagem'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $assunto = trim($_POST['assunto'] ?? '');


    if (empty($nome_visitante)) {
        $erros[] = 'O campo Nome é obrigatório.';
    }


    if (empty($email)) {
            $erros[] = 'O campo E-mail é obrigatório.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = 'Informe um e-mail válido.';
    }

    if (empty($assunto)) {
        $erros[] = 'Selecione um assunto.';
    }

    if (empty($mensagem)) {
        $erros[] = 'O campo Mensagem é obrigatório.';
    } elseif (strlen($mensagem) < 10) {
        $erros[] = 'A mensagem deve ter pelo menos 10 caracteres.';
    }elseif (strlen($mensagem) > 500) {
        $erros[] = 'A mensagem deve ter no máximo 500 caracteres.';
    }

    if (empty($erros)) {
        header("Location: obrigado.php?nome=" . urlencode($nome_visitante) . "&assunto=" . urlencode($assunto));
        exit;
    }

}
?>

<?php include '../includes/cabecalho.php'; ?>

    <div class="container">
        <h1 class="titulo-secao"> 📮Formulário de Contato</h1>
        <form class="form-container" action="contato.php" method="post">

            <label>Seu nome:</label>
            <input type="text" name="nome_visitante"
            value="<?php echo htmlspecialchars($nome_visitante); ?>">

            <label>E-mail:</label>
            <input type="email" name="email"
            value="<?php echo htmlspecialchars($email); ?>">

            <label>Assunto:</label>
            <select name="assunto">
                <option value="">Selecione um assunto</option>
                <option value="Duvida"
                <?php if ($assunto === 'Duvida') echo 'selected'; ?>>
                Dúvida
                </option>

                <option value="Proposta de trabalho"
                <?php if ($assunto === 'Proposta de trabalho') echo 'selected'; ?>>
                Proposta de trabalho
                </option>

                <option value="Colaboracao"
                <?php if ($assunto === 'Colaboracao') echo 'selected'; ?>>
                Colaboração
                </option>

                <option value="Outro"
                <?php if ($assunto === 'Outro') echo 'selected'; ?>>
                Outro
                </option>
            </select>

            <label>Mensagem:</label>
            <textarea name="mensagem" rows="4"></textarea>

            <button type="submit">Enviar</button>

        </form>

        <?php if (!empty($erros)): ?>
        <div class="alerta-erro">
            <h3>⛔ Corrija os erros:</h3>

            <?php foreach ($erros as $erro): ?>
                <p style="margin: 4px 0;">✖ <?php echo htmlspecialchars($erro); ?></p>
            <?php endforeach; ?>

        </div>
        <?php endif; ?>

    </div>

<?php include '../includes/rodape.php'; ?>