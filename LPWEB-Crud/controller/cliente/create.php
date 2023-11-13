<?php
require_once("../connection.php");

$nome = $_POST['nome'];
$dataNascimento = $_POST['dataNascimento'];
$dataCadastro = $_POST['dataCadastro'];
$cpfCnpj = $_POST['cpfCnpj'];
$genero = $_POST['genero'];
$origem = $_POST['origem'];

try {
    $sql = "INSERT INTO cliente (nome_cliente, data_nascimento, data_cadastro, cpf_cnpj, genero, origem) VALUES (?,?,?,?,?,?);";
    $stmt = $conn->prepare($sql);
    $stmt->execute($nome, $dataNascimento, $dataCadastro, $cpfCnpj, $genero, $origem);
    echo "OK";
} catch (PDOException $e) {
    echo "Error ".$e->getMessage();
}