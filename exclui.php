<?php
require_once 'conexao.php';

// Sistema de Mensagens
$status = $_GET['msg'] ?? '';
$mensagens = [
    'sucesso' => 'Ação realizada com sucesso!',
    'excluido' => 'Usuário removido do sistema.',
    'erro' => 'Erro ao processar solicitação.'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['tabela'] === "carros") {
    $stmt1 = $pdo->prepare("DELETE FROM carros WHERE id = ?");
    $stmt1->execute([$_POST['id']]);
    header("Location: show_car.php?msg=excluido");  
    exit;
    }
    else {
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->execute([$_POST['id']]);
    header("Location: show_user.php?msg=excluido"); 
    exit;
    } 
    
}
?>