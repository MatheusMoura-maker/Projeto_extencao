<link rel="stylesheet" href="style.css">
<body>
<main>
<?php
require_once 'conexao.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $senhaHash = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)");
        $stmt->execute([$_POST['nome'], $_POST['sobrenome'], $_POST['email'], $senhaHash]);
        header("Location: telalogin.php?msg=sucesso");
        exit;
    } catch (Exception $e) {
        header("Location: telalogin.php?msg=erro");
    }
}
?>
<h2>Cadastrar Usuário</h2>
<form method="POST">
    <input type="text" name="nome" id="nome"  placeholder="Nome" required><br><br>
    <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" required><br><br>
    <input type="email" name="email" id="email" placeholder="e-mail" required><br><br>
    <input type="password" name="senha" id="senha" placeholder="senha" required><br><br>
    <button type="submit">Salvar</button><br>
    <a class="botao voltar" href="telalogin.php">Voltar</a>
</form>
<?php include_once 'footer.php'; ?>
    
</main>
</body>