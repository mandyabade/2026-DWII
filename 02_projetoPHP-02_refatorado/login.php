<?php
/**
 * Disciplina : Desenvolvimento Web II (DWII)
 * Arquivo : login.php (raiz)
 * Descrição : Autenticação real contra tabela usuarios (bcrypt).
 */

require_once __DIR__ . '/includes/conexao.php';
require_once __DIR__ . '/includes/auth.php';

if (usuario_logado()) {
    header('Location: painel.php');
    exit;
}

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if ($login === '' || $senha === '') {
        $erro = 'Informe usuário e senha.';
    } else {
        $pdo = conectar();

        $stmt = $pdo->prepare(
            "SELECT id, login, senha FROM usuarios
             WHERE login = :login AND status = 'ativo'
             LIMIT 1"
        );

        $stmt->execute([':login' => $login]);
        $usuario = $stmt->fetch();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
                        session_regenerate_id(true);
            $_SESSION['usuario'] = $usuario['login'];

            $log = $pdo->prepare(
                "INSERT INTO logs (tabela_afetada, registro_id, acao, usuario_login, detalhes)
                 VALUES ('usuarios', :id, 'LOGIN', :login, 'Login bem-sucedido')"
            );

            $log->execute([
                ':id' => $usuario['id'],
                ':login' => $usuario['login'],
            ]);

            header('Location: painel.php');
            exit;
        }

        $log = $pdo->prepare(
            "INSERT INTO logs (tabela_afetada, registro_id, acao, usuario_login, detalhes)
             VALUES ('usuarios', 0, 'LOGIN_FAIL', :login, 'Credenciais inválidas')"
        );

        $log->execute([':login' => $login]);

        $erro = 'Usuário ou senha inválidos.';
    }
}

$pagina_atual = 'login';
$titulo_pagina = 'Login – Portfólio';
$caminho_raiz = './';

require_once __DIR__ . '/includes/cabecalho.php';
?>

<main style="max-width: 420px; margin: 60px auto; padding: 0 20px;">
    <h1>Login</h1> <br>

    <?php if ($erro !== ''): ?>
        <p style="color:#cf1c21;"><?=
            htmlspecialchars($erro) ?></p>
    <?php endif; ?>

<form method="POST" action="login.php">
    <label>Usuário<br>
        <input type="text" name="login" required>
    </label>
    <br>
    <label>Senha<br>
        <input type="password" name="senha" required>
    </label>
    <br><br>
    <button type="submit">Entrar</button>
</form>
</main>
<?php require_once __DIR__ . '/includes/rodape.php'; ?>
