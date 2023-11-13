<?php

class ClienteDAO {

    require_once("../connection.php");

    public function atualizarCliente(Cliente $cliente) {
        $sql = "UPDATE cliente SET 
                nome_cliente = :nome_cliente,
                data_nascimento = :data_nascimento,
                data_cadastro = :data_cadastro,
                cpf_cnpj = :cpf_cnpj,
                genero = :genero,
                origem = :origem
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':nome_cliente', $cliente->getNomeCliente());
        $stmt->bindValue(':data_nascimento', $cliente->getDataNascimento());
        $stmt->bindValue(':data_cadastro', $cliente->DataCadastro());
        $stmt->bindValue(':cpf_cnpj', $cliente->getCpfCnpj());
        $stmt->bindValue(':genero', $cliente->getGenero());
        $stmt->bindValue(':origem', $cliente->getOrigem());
        $stmt->bindValue(':id', $cliente->getId());

        try {
            $stmt->execute();
            echo "Cliente atualizado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao atualizar cliente: " . $e->getMessage();
        }
    }
}
?>
