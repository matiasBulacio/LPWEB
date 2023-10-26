<?php 
class Linha implements IModel{
    private int $id_linha;
    private string $desc_linha;

    public function __construct(int $id_linha, string $desc_linha){
        $this-> id_linha = $id_linha;
        $this-> desc_linha = $desc_linha;
    }
//get
    public function getId_linha() {
        return $this->id_linha;
    }

    public function getDesc_linha() {
        return $this->desc_linha;
    }
//set 
    public function setId_linha($id_linha) {
        $this->id_linha = $id_linha;
    }

    public function setDesc_linha($desc_linha) {
        $this->desc_linha = $desc_linha;
    }

    public function update() {

    }

    public function delete() {

    }
}