<?php

class ClienteDAO {

    require_once("../connection.php");

    public function deletarCliente($id) {
        $sql = "DELETE FROM cliente WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);

        try {
            $stmt->execute();
            echo "Cliente deletado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao deletar cliente: " . $e->getMessage();
        }
    }
}
?>
