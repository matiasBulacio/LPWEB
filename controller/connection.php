<?php
class Connection {
    private $server = 'localhost';
    private $user = 'root';
    private $pass = '123456';
    private $db = 'world';
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("myshql:host=$this->server;dbname=$this->db", $this->user, $this->pass);
            echo "conectado a $this->server $this->db Com sucesso usando pdo";
        } catch (PDOException $e) {
            $message = "Drivers disponiveis: " . implode(',', PDO::getAvailableDrivers());
            $message .= "\n -Erro: " . $e->getMessage();
            throw new Exception($message);
        }
    }

    public function query(string $sql) {
        try {
            return $this->conn->query($sql);
        } catch (PDOException) {

        }
    }
}

?>