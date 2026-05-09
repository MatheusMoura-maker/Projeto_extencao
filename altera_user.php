<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE usuarios SET nome=?, sobrenome=?, email=?, senha=? WHERE id=?");
    $stmt->execute([$_POST['nome'], $_POST['sobrenome'], $_POST['email'], $_POST['senha'], $_POST['id']]);
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
    <input type="hidden" name="id" value="<?= $u['id'] ?>" required><br><br>
    <input type="text" name="nome" value="<?= $u['nome'] ?>" required><br><br>
    <input type="text" name="sobrenome" value="<?= $u['sobrenome'] ?>" required><br><br>
    <input type="email" name="email" value="<?= $u['email'] ?>" required><br><br>
    <input type="password" name="senha" value="<?= $u['senha'] ?>" required><br><br>
    <button type="submit">Atualizar</button>
</form>
<?php include_once 'footer.php'; ?>