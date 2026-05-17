<?php
$host = 'localhost'; $db = 'unicar'; $user = 'root'; $pass= '';
$dsn ="mysql:host=$host;dbname=$db;charset=utf8mb4";
try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        
    ]);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}   
