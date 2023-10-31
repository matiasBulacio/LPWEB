<?php
class ItemVenda implements IModel
{
    private int $id_item;
    private int $id_venda;
    private int $id_produto;
    private int $qtd_venda;
    private float $vlr_venda;
    private string $status;

    public function __construct(int $id_item, int $id_venda, int $id_produto, int $qtd_venda, float $vlr_venda, string $status)
    {
        $this->id_item = $id_item;
        $this->id_venda = $id_venda;
        $this->id_produto = $id_produto;
        $this->qtd_venda = $qtd_venda;
        $this->vlr_venda = $vlr_venda;
        $this->status = $status;
    }

    public function getId_item()
    {
        return $this->id_item;
    }

    public function getId_venda()
    {
        return $this->id_venda;
    }

    public function getId_produto()
    {
        return $this->id_produto;
    }

    public function getQtd_venda()
    {
        return $this->qtd_venda;
    }

    public function getVlr_venda()
    {
        return $this->vlr_venda;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setId_item($id_item)
    {
        $this->id_item = $id_item;
    }

    public function setId_venda($id_venda)
    {
        $this->id_venda = $id_venda;
    }

    public function setId_produto($id_produto)
    {
        $this->id_produto = $id_produto;
    }

    public function setQtd_venda($qtd_venda)
    {
        $this->qtd_venda = $qtd_venda;
    }

    public function setVlr_venda($vlr_venda)
    {
        $this->vlr_venda = $vlr_venda;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}
