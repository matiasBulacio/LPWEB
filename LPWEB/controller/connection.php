<?php

$server = 'localhost';
$user = 'root';
$pass = '123456';
$db = 'world';

try {
    $conn = new PDO("myshql:host=$server;dbname=$db", $user, $pass);
    echo "conectado a $server $db Com sucesso usando pdo";
} catch (PDOException $e) {
    $message = "Drivers disponiveis: " . implode(',', PDO::getAvailableDrivers());
    $message .= "\n -Erro: " . $e->getMessage();
    throw new Exception($message);
}

?>