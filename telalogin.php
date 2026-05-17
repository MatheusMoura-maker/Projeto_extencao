<link rel="stylesheet" href="style.css">

<body>
    <main>
<?php
session_start();
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

     $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['usuario_tipo'] = $usuario['tipo'];
        header("Location: home.php");
        exit;
        }  
    else {
        echo "Email ou senha incorretos<br>";
        echo '<a class="botao voltar" href="telalogin.php">Voltar</a>';
        exit;
        }

    }

?>

<h1 style="color:green";>UniCar</h1>
        <form method="post" > 
        <div class="campo">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="campo">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required>
        </div>

        <div class="botoes">
            <button type="submit">Entrar</button>
        </div>
        <a class="botao voltar" href="cad_login.php">Cadastrar</a>
        </form>
    </main>
</body>
