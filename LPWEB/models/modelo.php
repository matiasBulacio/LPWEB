<?php 
class Modelo implements IModel{
    private int $id_modelo;
    private string $desc_modelo;
    private int $id_marca;
    private int $id_linha;

    public function __construct(int $id_modelo, string $desc_modelo, int $id_marca, int $id_linha){
        $this-> id_modelo = $id_modelo;
        $this-> desc_modelo = $desc_modelo;
        $this-> id_marca = $id_marca;
        $this-> id_linha = $id_linha;
    }
//get
    public function getId_modelo() {
        return $this->id_modelo;
    }

    public function getDesc_modelo() {
        return $this->desc_modelo;
    }

    public function getId_marca() {
        return $this->id_marca;
    }

    public function getId_linha() {
        return $this->id_linha;
    }
//set
    public function setId_modelo($id_modelo) {
        $this->id_modelo = $id_modelo;
    }

    public function setDesc_modelo($desc_modelo) {
        $this->desc_modelo = $desc_modelo;
    }

    public function setId_marca($id_marca) {
        $this->id_marca = $id_marca;
    }

    public function setId_linha($id_linha) {
        $this->id_linha = $id_linha;
    }

    public function update() {

    }

    public function delete() {

    }
}