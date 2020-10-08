<?php
require 'config.php';

class DB
{
    public static $_instance;

    private function __construct(){}

    public static function getInstance()
    {
        if (!isset(self::$_instance)){
            try{
            self::$_instance = new PDO(
                'mysql:host='.constant("DB_HOST").';dbname='.constant("DB_NAME"),
                constant("DB_USER"),constant("DB_PASS")
            );

            self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$_instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
            } catch (Exception $e){
                print 'Erro Code: ' . $e->getCode() . ' - Message: ' . $e->getMessage();
            }
        }
        
        return self::$_instance;
    }

}
