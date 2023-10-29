<?php

class Estoque implements IModel{

    private int $id;
    private int $idProduto;
    private int $qtEstoque;
    private int $idFilial;

    public function __construct(int $id = null, int $idProduto = null, int $qtEstoque = null, int $idFilial = null) {
        $this->id = $id;
        $this->idProduto = $idProduto;
        $this->qtEstoque = $qtEstoque;
        $this->idFilial = $idFilial;
    }

    public function getId() {
        return $this->id;
    }

    public function getIdProduto() {
        return $this->idProduto;
    }

    public function getQtEstoque() {
        return $this->qtEstoque;
    }

    public function getIdFilial() {
        return $this->idFilial;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    public function setQtEstoque($qtEstoque) {
        $this->qtEstoque = $qtEstoque;
    }

    public function setIdFilial($idFilial) {
        $this->idFilial = $idFilial;
    }

    


    public function update() {

    }

    public function delete() {

    }
}