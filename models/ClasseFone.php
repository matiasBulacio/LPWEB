<?php
class Fone implements IModel
{
    private int $id_fone;
    private int $id_cliente;
    private string $numero;
    private string $tipo;
    private string $contato;

    public function __construct(int $id_fone, int $id_cliente, string $numero, string $tipo, string $contato)
    {
        $this->id_fone = $id_fone;
        $this->id_cliente = $id_cliente;
        $this->numero = $numero;
        $this->tipo = $tipo;
        $this->contato = $contato;
    }

    public function getId_fone()
    {
        return $this->id_fone;
    }

    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getContato()
    {
        return $this->contato;
    }

    public function setId_fone($id_fone)
    {
        $this->id_fone = $id_fone;
    }

    public function setId_cliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }

    public function setNumero($numero)
    {
        $this->id_produto = $id_produto;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function setContato($contato)
    {
        $this->contato = $contato;
    }
}
