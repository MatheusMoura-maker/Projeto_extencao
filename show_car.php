<?php
require_once 'conexao.php';
$carro = $pdo->query("SELECT * FROM carros ORDER BY nome")->fetchAll();

// Sistema de Mensagens
$status = $_GET['msg'] ?? '';
$mensagens = [
    'sucesso' => 'Ação realizada com sucesso!',
    'excluido' => 'Veículo removido do sistema.',
    'erro' => 'Erro ao processar solicitação.',
    
];

include_once 'header.php';
?>

<h1>Veículos Cadastrados</h1>

<?php if ($status && isset($mensagens[$status])): ?>
    <div class="alert <?= $status === 'erro' ? 'error' : 'success' ?>">
        <?= $mensagens[$status] ?>
    </div>
<?php endif; ?>

<table border="1" width="100%" cellpadding="10" style="border-collapse: collapse;">
    <tr>
        <th>Nome</th><th>Montadora</th><th>Ano</th><th>Placa</th><th>Ações</th>
    </tr>
    <?php foreach($carro as $c): ?>
    <tr>
        <!-- <td><?= $c['id'] ?></td> -->
        <td><?= $c['nome'] ?></td>
        <td><?= $c['montadora'] ?></td>
        <td><?= $c['ano'] ?></td>
        <td><?=$c['placa'] ?></td>
        <td>
            <a href="altera_car.php?id=<?= $c['id'] ?>">Editar</a> |
            <form action="exclui.php" method="POST" style="display:inline" onsubmit="return confirm('Excluir?')">
                <button type="submit" name="id" value="<?= $u['id'] ?>">Excluir</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include_once 'footer.php'; ?>
