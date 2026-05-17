<?php
$host = 'localhost';
$user = 'root';
$pass = '';

$pdo = new PDO("mysql:host=$host;charset=utf8mb4", $user, $pass);
$pdo->exec("CREATE DATABASE IF NOT EXISTS unicar CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

echo "Banco criado com sucesso!";   