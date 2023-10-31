<?php

class Cliente
{

    private int $id;
    private string $nome_cliente;
    private string $data_nascimento;
    private string $data_cadastro;
    private string $cpf_cnpj;
    private string $genero;
    private string $origem;


    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    function getNomeCliente()
    {
        return $this->nome_cliente;
    }

    function getDataNascimnto()
    {
        return $this->data_nascimento;
    }

    function DataCadastro()
    {
        return $this->data_cadastro;
    }

    function getCpfCnpj()
    {
        return $this->cpf_cnpj;
    }

    function getGenero()
    {
        return $this->genero;
    }

    function getOrigem()
    {
        return $this->origem;
    }
}
