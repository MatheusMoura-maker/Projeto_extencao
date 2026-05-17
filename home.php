<link rel="stylesheet" href="style.css">
<main>
<?php
require_once 'conexao.php';
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: telalogin.php");
    exit;
}

echo "Login Realizado!<br><br>Bem-vindo";
echo '<a class="botao carro" href="show_user.php">Consultar usuarios</a>';
echo '<a class="botao carro" href="show_car.php">Consutar Carro</a>';

include_once 'footer.php';
?>
</main>