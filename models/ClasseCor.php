<?php
class Cor implements IModel
{
    private int $id_cor;
    private string $desc_cor;

    public function __construct(int $id_cor, string $desc_cor)
    {
        $this->id_cor = $id_cor;
        $this->desc_cor = $desc_cor;
    }

    public function getId_cor()
    {
        return $this->id_cor;
    }

    public function getDesc_cor()
    {
        return $this->desc_cor;
    }

    public function setId_cor($id_cor)
    {
        $this->id_cor = $id_cor;
    }

    public function setDesc_cor($desc_cor)
    {
        $this->desc_cor = $desc_cor;
    }
}
