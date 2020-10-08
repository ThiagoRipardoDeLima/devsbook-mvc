<?php
require_once dirname(dirname(__FILE__)) . '/model/classes/Cliente.php';
require_once dirname(dirname(__FILE__)) . '/model/DAO/Mysql/DaoCliente.php';

class Control_Cliente
{
    private $nome;
    private $dataNascimento;
    private $cpf;
    private $id;
    private $daoCliente;
    
    public function __construct()
    {
        $this->daoCliente = new DaoCliente();
    }

    private function getModel()
    {
        $cliente = new Cliente();
        $cliente->setNome($this->nome);
        $cliente->setId($this->id);
        $cliente->setCpf($this->cpf);
        $cliente->setDataNascimento($this->dataNascimento);
        return $cliente;
    }

    public function getClientes()
    {
        return $this->daoCliente->buscarCliente(self::getModel());
    }

    public function findGetById()
    {
        return $this->daoCliente->findGetById($this->id);
    }

    public function setCliente()
    {
        return $this->daoCliente->add(self::getModel());
    }

    public function updateCliente()
    {
        return $this->daoCliente->update(self::getModel());
    }

    public function deleteCliente()
    {
        return $this->daoCliente->delete($this->id);
    }

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
        $this->dataNascimento = $dtaNascimento;
    }
}
