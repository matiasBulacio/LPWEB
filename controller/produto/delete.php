<?php

require_once("../connection.php");
$id = $_POST['id'];

$sql = "DELETE FROM produto WHERE id = :id";
$stmt = $this->pdo->prepare($sql);
$stmt->bindValue(':id', $id);

try {
    $stmt->execute();
    echo "Produto deletado com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao deletar produto: " . $e->getMessage();
}
