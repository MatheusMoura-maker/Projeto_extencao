
<body>
<?php
require_once 'conexao.php';
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: telalogin.php");
    exit;
}
$usuarios = $pdo->query("SELECT * FROM usuarios ORDER BY nome")->fetchAll();

// Sistema de Mensagens
$status = $_GET['msg'] ?? '';
$mensagens = [
    'sucesso' => 'Ação realizada com sucesso!',
    'excluido' => 'Usuário removido do sistema.',
    'erro' => 'Erro ao processar solicitação.',
    'tabela_pronta' => 'Banco de dados configurado!'
];

include_once 'header.php';
?>

<h1>Usuários Cadastrados</h1>

<?php if ($status && isset($mensagens[$status])): ?>
    <div class="alert <?= $status === 'erro' ? 'error' : 'success' ?>">
        <?= $mensagens[$status] ?>
    </div>
<?php endif; ?>

<table border="1" width="100%" cellpadding="10" style="border-collapse: collapse;">
    <tr>
        <th>ID</th><th>Nome</th><th>Sobrenome</th><th>E-mail</th><th>Ações</th>
    </tr>
    <?php foreach($usuarios as $u): ?>
    <tr>
        <td><?= $u['id'] ?></td>
        <td><?= htmlspecialchars($u['nome']) ?></td>
        <td><?= htmlspecialchars($u['sobrenome']) ?></td>
        <td><?=$u['email'] ?></td>
        <td>
            <a href="altera_user.php?id=<?= $u['id'] ?>">Editar</a> |
            <form action="exclui.php" method="POST" style="display:inline" onsubmit="return confirm('Excluir?')">
                <button type="submit" name="id" value="<?= $u['id'] ?>">Excluir</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include_once 'footer.php'; ?>
</body>