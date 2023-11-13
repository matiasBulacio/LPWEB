<?php

class ClienteDAO {

    require_once("../connection.php");

    public function buscarClientePorId($id) {
        $sql = "SELECT * FROM cliente WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);

        try {
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                // Criar e retornar um objeto Cliente com os dados do banco de dados
                return new Cliente($result);
            } else {
                echo "Cliente não encontrado";
                return null;
            }
        } catch (PDOException $e) {
            echo "Erro ao buscar cliente: " . $e->getMessage();
            return null;
        }
    }
}
?>
