<?php
require_once 'conexao.php';
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: telalogin.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senhaHash = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("UPDATE usuarios SET nome=?, sobrenome=?, email=?, senha=? WHERE id=?");
    $stmt->execute([$_POST['nome'], $_POST['sobrenome'], $_POST['email'], $senhaHash, $_POST['id']]);
    header("Location: show_user.php?msg=sucesso");
    exit;
}

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$id]);
$u = $stmt->fetch();

include_once 'header.php';
?>
<h2>Editar Usuários</h2>
<form method="POST">
    <input type="hidden" name="id" value="<?= $u['id'] ?>">
    <input type="text" name="nome" value="<?= $u['nome'] ?>" required><br><br>
    <input type="text" name="sobrenome" value="<?= $u['sobrenome'] ?>" required><br><br>
    <input type="email" name="email" value="<?= $u['email'] ?>" required><br><br>
    <input type="password" name="senha" value="<?= $u['senha'] ?>" required><br><br>
    <button type="submit">Atualizar</button>
</form>
<?php include_once 'footer.php'; ?>u