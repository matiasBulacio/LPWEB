<?php

class Produto {
    private int $id;
    private string $descProduto;
    private $idModelo;
    private string $capacidade;
    private float $vlrSugerido;
    private float $vlrCusto;
    private string $voltagem;
    private float $idCor;
    private string $image;

    public function __construct(int $id, string $descProduto, $idModelo, string $capacidade, float $vlrSugerido, float $vlrCusto, string $voltagem, float $idCor, string $image) {
        $this->id = $id;
        $this->descProduto = $descProduto;
        $this->idModelo = $idModelo;
        $this->capacidade = $capacidade;
        $this->vlrSugerido = $vlrSugerido;
        $this->vlrCusto = $vlrCusto;
        $this->voltagem = $voltagem;
        $this->idCor = $idCor;
        $this->image = $image;
    }

    public function getId() {
        return $this->id;
    }

    public function getDescProduto() {
        return $this->descProduto;
    }

    public function getIdModelo() {
        return $this->idModelo;
    }

    public function getCapacidade() {
        return $this->capacidade;
    }

    public function getVlrSugerido() {
        return $this->vlrSugerido;
    }

    public function getVlrCusto() {
        return $this->vlrCusto;
    }

    public function getVoltagem() {
        return $this->voltagem;
    }

    public function getIdCor() {
        return $this->idCor;
    }

    public function getImage() {
        return $this->image;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDescProduto($descProduto) {
        $this->descProduto = $descProduto;
    }

    public function setIdModelo($idModelo) {
        $this->idModelo = $idModelo;
    }

    public function setCapacidade($capacidade) {
        $this->capacidade = $capacidade;
    }

    public function setVlrSugerido($vlrSugerido) {
        $this->vlrSugerido = $vlrSugerido;
    }

    public function setVlrCusto($vlrCusto) {
        $this->vlrCusto = $vlrCusto;
    }

    public function setVoltagem($voltagem) {
        $this->voltagem = $voltagem;
    }

    public function setIdCor($idCor) {
        $this->idCor = $idCor;
    }

    public function setImage($image) {
        $this->image = $image;
    }



    public function update() {

    }

    public function delete() {

    }
}