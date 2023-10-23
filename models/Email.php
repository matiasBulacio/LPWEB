<?php
class Email {
    private int $id;
    private int $id_cliente;
    private string $email;

    public function __construct(int $id, int $id_cliente, string $email) {
        $this->id = $id;
        $this->id_cliente = $id_cliente;
        $this->email = $email;
    }

    public function getId () {
        return $this->id;
    }

    public function getId_cliente() {
        return $this->id_cliente;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setId ($id) {
        $this->id=$id;
    }

    public function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    public function setEmail($email) {
        $this->email = $email;
    }



}
