<?php
require_once("../connection.php");

$id = $_POST['id'];
$descProduto = $_POST['descProduto'];
$idModelo = $_POST['idModelo'];
$capacidade = $_POST['capacidade'];
$vlrSugerido = $_POST['vlrSugerido'];
$vlrCusto = $_POST['vlrCusto'];
$voltagem = $_POST['voltagem'];
$idCor = $_POST['idCor'];

try {
    $sql = "INSERT INTO produto (desc_produto, id_modelo, capacidade_modelo, vlr_sugerido, vlr_custo, voltagem, id_cor) VALUES (?,?,?,?,?,?,?);";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($descProduto, $idModelo, $capacidade, $vlrSugerido, $vlrCusto, $voltagem, $idCor));
    echo "OK";
} catch (PDOException $e) {
    echo "Error ".$e->getMessage();
}