<?php

class Cliente
{
    private $id;
    private $nome;
    private $cpf;
    private $dtaNascimento;

    function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function getNome()
    {
        return $this->nome;
    }

    function setNome($nome)
    {
        $this->nome = $nome;
    }

    function getCpf()
    {
        return $this->cpf;
    }

    function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    function getDataNascimento()
    {
        return $this->dtaNascimento;
    }

    function setDataNascimento($dtaNascimento)
    {
        $this->dtaNascimento = $dtaNascimento;
    }
}

interface ClienteDAO
{
    public function add(Cliente $c);
    public function findAll();
    public function findGetById($id);
    public function update(Cliente $c);
    public function delete($id);
}
