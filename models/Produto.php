<?php

class Produto {
    private int $id;
    private string $descProduto;
    private $idModelo;
    private float $capacidade;
    private float $vlrSugerido;
    private float $vlrCusto;
    private float $voltagem;
    private float $idCor;

    public function __construct(int $id, string $descProduto, $idModelo, float $capacidade, float $vlrSugerido, float $vlrCusto, float $voltagem, float $idCor) {
        $this->id = $id;
        $this->descProduto = $descProduto;
        $this->idModelo = $idModelo;
        $this->capacidade = $capacidade;
        $this->vlrSugerido = $vlrSugerido;
        $this->vlrCusto = $vlrCusto;
        $this->voltagem = $voltagem;
        $this->idCor = $idCor;
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


    public function update() {

    }

    public function delete() {

    }
}