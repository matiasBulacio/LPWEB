<?php

class ProdutoDAO {

    require_once("../connection.php");

    public function atualizarProduto(Produto $produto) {
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

        $stmt->bindValue(':desc_produto', $produto->getDescProduto());
        $stmt->bindValue(':id_modelo', $produto->getIdModelo());
        $stmt->bindValue(':capacidade', $produto->getCapacidade());
        $stmt->bindValue(':vlr_sugerido', $produto->getVlrSugerido());
        $stmt->bindValue(':vlr_custo', $produto->getVlrCusto());
        $stmt->bindValue(':voltagem', $produto->getVoltagem());
        $stmt->bindValue(':id_cor', $produto->getIdCor());
        $stmt->bindValue(':id', $produto->getId());

        try {
            $stmt->execute();
            echo "Produto atualizado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao atualizar produto: " . $e->getMessage();
        }
    }
}
?>
