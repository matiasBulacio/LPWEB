<?php


require_once("../connection.php");

$descProduto = $_POST['descProduto'];
$idModelo = $_POST['idModelo'];
$capacidade = $_POST['capacidade'];
$vlrSugerido = $_POST['vlrSugerido'];
$vlrCusto = $_POST['vlrCusto'];
$voltagem = $_POST['voltagem'];
$idCor = $_POST['idCor'];
$id = $_POST['id'];

$sql = "UPDATE produto SET 
                desc_produto = :desc_produto,
                id_modelo = :id_modelo,
                capacidade = :capacidade,
                vlr_sugerido = :vlr_sugerido,
                vlr_custo = :vlr_custo,
                voltagem = :voltagem,
                id_cor = :id_cor
                WHERE id = :id";

$stmt = $this->pdo->prepare($sql);

$stmt->bindValue(':desc_produto', $descProduto);
$stmt->bindValue(':id_modelo', $idModelo);
$stmt->bindValue(':capacidade', $capacidade);
$stmt->bindValue(':vlr_sugerido', $vlrSugerido);
$stmt->bindValue(':vlr_custo', $vlrCusto);
$stmt->bindValue(':voltagem', $voltagem);
$stmt->bindValue(':id_cor', $idCor);
$stmt->bindValue(':id', $id);

try {
    $stmt->execute();
    echo "Produto atualizado com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao atualizar produto: " . $e->getMessage();
}
