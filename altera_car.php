<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE carros SET nome=?, montadora=?, ano=?, placa=? WHERE id=?");
    $stmt->execute([$_POST['nome'], $_POST['montadora'], $_POST['ano'], $_POST['placa'],$_POST['id']]);
    header("Location: show_car.php?msg=sucesso");
    exit;
}

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM carros WHERE id = ?");
$stmt->execute([$id]);
$u = $stmt->fetch();

include_once 'header.php';
?>
<h2>Editar Carros</h2>
<form method="POST">
    <input type="hidden" name="id" value="<?= $u['id'] ?>" required><br><br>
    <input type="text" name="nome" value="<?= $u['nome'] ?>" required><br><br>
    <input type="text" name="montadora" value="<?= $u['montadora'] ?>" required><br><br>
    <input type="text" name="ano" value="<?= $u['ano'] ?>" required><br><br>
    <input type="text" name="placa" value="<?= $u['placa'] ?>" required><br><br>
    <button type="submit">Atualizar</button>
</form>
<?php include_once 'footer.php'; ?>
