<?php

require_once("../connection.php");

$nome = $_POST['nome'];
$dataNascimento = $_POST['dataNascimento'];
$dataCadastro = $_POST['dataCadastro'];
$cpfCnpj = $_POST['cpfCnpj'];
$genero = $_POST['genero'];
$origem = $_POST['origem'];
$id = $_POST['id'];

$sql = "UPDATE cliente SET 
                nome_cliente = :nome_cliente,
                data_nascimento = :data_nascimento,
                data_cadastro = :data_cadastro,
                cpf_cnpj = :cpf_cnpj,
                genero = :genero,
                origem = :origem
                WHERE id = :id";

$stmt = $this->pdo->prepare($sql);

$stmt->bindValue(':nome_cliente', $nome);
$stmt->bindValue(':data_nascimento', $dataNascimento);
$stmt->bindValue(':data_cadastro', $dataCadastro);
$stmt->bindValue(':cpf_cnpj', $cpfCnpj);
$stmt->bindValue(':genero', $genero);
$stmt->bindValue(':origem', $origem);
$stmt->bindValue(':id', $id);

try {
    $stmt->execute();
    echo "Cliente atualizado com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao atualizar cliente: " . $e->getMessage();
}
