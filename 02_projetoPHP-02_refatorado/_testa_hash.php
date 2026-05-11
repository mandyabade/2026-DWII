
<?php
/**
 * Arquivo temporário — verifica se o hash gravado em
 * usuarios.senha bate com a senha 'admin2026'.
 * Pode ser removido após uso (não faz parte do projeto).
 */

require_once __DIR__ . '/includes/conexao.php';

// Busca o hash do admin no banco
$pdo  = conectar();
$stmt = $pdo->prepare("SELECT senha FROM usuarios WHERE login = :login");
$stmt->execute([':login' => 'admin']);
$row  = $stmt->fetch();

// password_verify(senha_em_texto, hash_do_banco):
//   - retorna TRUE se a senha bate com o hash
//   - retorna FALSE caso contrário
// Funciona com hashes bcrypt diferentes para a mesma senha
// (cada chamada de password_hash usa salt aleatório).
// JAMAIS comparamos hashes com == — nunca dão match.
if ($row && password_verify('dwii2026', $row['senha'])) {
    echo "✅ Hash OK — senha 'dwii2026' confere com o registro.\n";
} else {
    echo "❌ Hash NÃO confere. Refaça o passo 3.1 e atualize o setup.sql.\n";
}
