<?php

class ProdutoDAO {

    require_once("../connection.php");

    public function buscarProdutoPorId($id) {
        $sql = "SELECT * FROM produto WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);

        try {
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                // Criar e retornar um objeto Produto com os dados do banco de dados
                return new Produto($result['id'], $result['desc_produto'], $result['id_modelo'], $result['capacidade'], $result['vlr_sugerido'], $result['vlr_custo'], $result['voltagem'], $result['id_cor']);
            } else {
                echo "Produto não encontrado";
                return null;
            }
        } catch (PDOException $e) {
            echo "Erro ao buscar produto: " . $e->getMessage();
            return null;
        }
    }
}
?>
