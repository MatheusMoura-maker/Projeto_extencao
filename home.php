<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>UniCar - Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
<?php

require_once 'conexao.php';

echo "Login Realizado!<br><br>Bem-vindo";
echo '<a class="botao usuarios" href="show_user.php">Consultar usuarios</a>';
echo '<a class="botao carros" href="show_car.php">Consutar Carros</a>';

include_once 'footer.php';
?>
</main>