<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema UniCar</title>
    <style>
        body { font-family: sans-serif; margin: 0; background: #f4f4f4; }
        nav { background: #000000; padding: 15px; color: white; }
        nav a { color: white; text-decoration: none; margin-right: 20px; font-weight: bold; }
        .container { background: white; width: 80%; margin: 20px auto; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); min-height: 400px; }
        .alert { padding: 15px; margin-bottom: 20px; border-radius: 4px; font-weight: bold; }
        .success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>
<nav>
    <a href="home.php">Home</a>
    <a href="cad_user.php">Novo Usuário</a>
    <a href="show_user.php">Usuários Cadastrados</a>
    <a href="cad_car.php">Novo Carro</a>
    <a href="show_car.php">Carros Cadastrados</a>
    <a href="logout.php">Sair</a>
</nav>
<div class="container">