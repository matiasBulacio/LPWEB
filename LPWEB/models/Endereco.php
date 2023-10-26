<?php 
class Endereco implements IModel {
    private int $id_endereco;
    private int $id_cliente;
    private string $logradouro;
    private string $numero;
    private string $complemento;
    private string $cep;
    private string $bairro;
    private string $cidade;
    private string $estado;
    private string $tipo;

    public function __contruct(int $id_endereco, int $id_cliente, string $logradouro, string $numero, string $complemento, string $cep, string $bairro, string $cidade, string $estado, string $tipo){
        $this-> id_endereco = $id_endereco;
        $this-> id_cliente = $id_cliente;
        $this-> logradouro = $logradouro;
        $this-> numero = $numero;
        $this-> complemento = $complemento;
        $this-> cep = $cep;
        $this-> bairro = $bairro;
        $this-> cidade = $cidade;
        $this-> estado = $estado;
        $this-> tipo = $tipo;
    }
//get
    public function getId_endereco() {
        return $this->id_endereco;
    }

    public function getId_cliente() {
        return $this->id_cliente;
    }

    public function getLogradouro() {
        return $this->logradouro;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getComplemento() {
        return $this->complemento;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getTipo() {
        return $this->tipo;
    }
//set
    public function setId_endereco($id_endereco) {
        $this->id_endereco = $id_endereco;
    }

    public function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    public function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setComplemento($complemento) {
       $this->complemento = $complemento;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function update() {

    }

    public function delete() {

    }
}


