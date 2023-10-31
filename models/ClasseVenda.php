<?php
class Venda implements IModel
{
    private int $id_venda;
    private int $id_cliente;
    private int $id_vendedor;
    private int $nm_documento;
    private string $status_venda;
    private string $data_venda;
    private float $prc_desconto;

    public function __construct(int $id_venda, int $id_cliente, int $id_vendedor, int $nm_documento, string $status_venda, string $data_venda, float $prc_desconto)
    {
        $this->id_venda = $id_venda;
        $this->id_cliente = $id_cliente;
        $this->id_vendedor = $id_vendedor;
        $this->nm_documento = $nm_documento;
        $this->status_venda = $status_venda;
        $this->data_venda = $data_venda;
        $this->prc_desconto = $prc_desconto;
    }

    public function getId_venda()
    {
        return $this->id_venda;
    }

    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    public function getId_vendedor()
    {
        return $this->id_vendedor;
    }

    public function getNm_documento()
    {
        return $this->nm_documento;
    }

    public function getStatus_venda()
    {
        return $this->status_venda;
    }

    public function getData_venda()
    {
        return $this->data_venda;
    }

    public function getPrc_desconto()
    {
        return $this->prc_desconto;
    }

    public function setId_venda($id_venda)
    {
        $this->id_venda = $id_venda;
    }

    public function setId_cliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }

    public function setId_vendedor($id_vendedor)
    {
        $this->id_vendedor = $id_vendedor;
    }

    public function setNm_documento($nm_documento)
    {
        $this->nm_documento = $nm_documento;
    }

    public function setStatus_venda($status_venda)
    {
        $this->status_venda = $status_venda;
    }

    public function setData_venda($data_venda)
    {
        $this->data_venda = $data_venda;
    }

    public function setPrc_desconto($prc_desconto)
    {
        $this->prc_desconto = $prc_desconto;
    }
}
