<?php

require_once dirname(dirname(dirname(__FILE__))).'/DB/DB.php';
require_once dirname(dirname(dirname(__FILE__))).'/classes/Cliente.php';

class DaoCliente implements ClienteDao
{
    public static $instance;
    private $pdo;

    public function __construct()
    {
        
    }

    public static function getInstance()
    {
        if(!isset(self::$instance))
            self::$instance = new DaoCliente();
        
        return self::$instance;
    }

    public function add(Cliente $cliente)
    {
        try{

            $sql = "INSERT INTO clientes
                    (nome, dta_nascimento, cpf)
                    VALUES
                    (:nome, :dta_nascimento, :cpf)";

            $p_sql = DB::getInstance()->prepare($sql);

            $p_sql->bindValue(":nome", $cliente->getNome());
            $p_sql->bindValue(":dta_nascimento", $cliente->getDataNascimento());
            $p_sql->bindValue(":cpf", $cliente->getCpf());

            return $p_sql->execute();

        } catch (Exception $e){
            print 'Erro: ' . $e->getCode() . ' - Mensagem: ' . $e->getMessage();
        }
    }

    public function update(Cliente $cliente)
    {
        try{
            $sql = "UPDATE  clientes
                    SET     nome = :nome,
                            dta_nascimento = :nascimento,
                            cpf = :cpf
                    WHERE   id = :id";

            $p_sql = DB::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $cliente->getNome());
            $p_sql->bindValue(":nascimento", $cliente->getDataNascimento());
            $p_sql->bindValue(":cpf", $cliente->getCpf());
            $p_sql->bindValue(":id", $cliente->getId());
            
            return $p_sql->execute();

        } catch (Exception $e) {
            print 'Erro: ' . $e->getCode(). ' - Mensagem: ' . $e->getMessage();
        }
    }

    public function delete($id)
    {
        try{
            $sql = "DELETE FROM clientes WHERE id = :id";

            $p_sql = DB::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id, \PDO::PARAM_INT);

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro: " . $e->getCode() . ' - Mensagem: ' . $e->getMessage();
        }
    }

    public function buscarCliente(Cliente $cliente)
    {
        try{
            
            $sql = "SELECT * 
                    FROM clientes 
                    WHERE (cpf = :cpf OR coalesce(:cpf,0) = 0)
                    AND   (id  = :id OR coalesce(:id,0) = 0)
                    AND    upper(nome) like '%' || upper(coalesce(:nome,'')) || '%'";
            $p_sql = DB::getInstance()->prepare($sql);

            $p_sql->bindValue(":id", $cliente->getId());
            $p_sql->bindValue(":nome", $cliente->getNome());
            $p_sql->bindValue(":cpf", $cliente->getCpf());

            $p_sql->execute();
            return self::getClientes($p_sql->fetchAll(PDO::FETCH_ASSOC));

        } catch (Exception $e){
            print 'Erro: ' . $e->getCode() . ' - Mensagem: ' . $e->getMessage();
        }
    }

    public function findAll()
    {
        $sql = "SELECT * FROM clientes";
                   
        $p_sql = DB::getInstance()->prepare($sql);
        $p_sql->execute();
        return self::getClientes($p_sql->fetchAll(PDO::FETCH_ASSOC));
    }

    public function findGetById($id)
    {
        $sql = "SELECT * FROM clientes where id = :id";
                   
        $p_sql = DB::getInstance()->prepare($sql);
        $p_sql->bindValue(':id',$id);
        $p_sql->execute();
        return self::getClientes($p_sql->fetchAll(PDO::FETCH_ASSOC));
        
    }

    private function getClientes($rows)
    {   
        $clientes = [];
        foreach($rows as $row){
            $cliente = new Cliente();
            $cliente->setId($row['id']);
            $cliente->setNome($row['nome']);
            $cliente->setCpf($row['cpf']);
            $cliente->setDataNascimento($row['dta_nascimento']);
            array_push($clientes,$cliente);
        }
        
        
        return $clientes;
    }
}
