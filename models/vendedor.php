<?php 
class Vendedor implements IModel{
    private int $id_vendedor;
    private string $nome_vendedor;
    private string $data_admissao;
    private string $data_demissao;
    private string $comissao;

    public function __construct(int $id_vendedor, string $nome_vendedor, string $data_admissao, string $data_demissao, string $comissao){
        $this-> id_vendedor = $id_vendedor;
        $this-> nome_vendedor = $nome_vendedor;
        $this-> data_admissao = $data_admissao;
        $this-> data_demissao = $data_demissao;
        $this-> comissao = $comissao;
    }
//get
    public function getId_vendedor() {
        return $this->id_vendedor;
    }

    public function getNome_vendedor() {
        return $this->nome_vendedor;
    }

    public function getData_admissao() {
        return $this->data_admissao;
    }

    public function getData_demissao() {
        return $this->data_demissao;
    }

    public function getComissao() {
        return $this->comissao;
    }
//set
    public function setId_endereco($id_vendedor) {
        $this->id_vendedor = $id_vendedor;
    }

    public function setId_endereco($nome_vendedor) {
        $this->nome_vendedor = $nome_vendedor;
    }

    public function setId_endereco($data_admissao) {
        $this->data_admissao = $data_admissao;
    }

    public function setId_endereco($data_demissao) {
        $this->data_demissao = $data_demissao;
    }

    public function setId_endereco($comissao) {
        $this->comissao = $comissao;
    }

    public function update() {

    }

    public function delete() {

    }
}