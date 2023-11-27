<?php
class Modelo{
    private int $id;
    private string $desc;
    private int $idMarca;
    private int $idLinha;

    public function __construct($id, $desc, $idMarca, $idLinha) {
        $this->id = $id;
        $this->$desc = $desc;
        $this->idMarca = $idMarca;
        $this->$idLinha = $idLinha;
    }

    public function getId() {
        return $this->id;
    }

    public function getDesc() {
        return $this->desc;
    }
    public function getIdMarca() {
        return $this->idMarca;
    }
    public function getIdLinha() {
        return $this->idLinha;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDesc($desc) {
        $this->desc = $desc;
    }

    public function setIdMarca($idMarca) {
        $this->idMarca = $idMarca;
    }

    public function setIdLinha($idLinha) {
        $this->idLinha = $idLinha;
    }

    public function update() {

    }

    public function delete() {

    }


}