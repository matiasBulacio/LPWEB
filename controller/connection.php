<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'rmo';
$conn;


try {
    $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
    // echo "conectado a $server $db Com sucesso usando pdo";
} catch (PDOException $e) {
    $message = "Drivers disponiveis: " . implode(',', PDO::getAvailableDrivers());
    $message .= "\n -Erro: " . $e->getMessage();
    throw new Exception($message);
}