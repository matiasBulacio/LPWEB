<?php

class ProdutoDAO {

    require_once("../connection.php");

    public function deletarProduto($id) {
        $sql = "DELETE FROM produto WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);

        try {
            $stmt->execute();
            echo "Produto deletado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao deletar produto: " . $e->getMessage();
        }
    }
}
?>
