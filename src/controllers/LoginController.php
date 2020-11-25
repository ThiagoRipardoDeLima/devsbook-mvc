<?php
namespace src\controllers;

use \core\Controller;

class LoginController extends Controller {

    private $loggerUser;

    public function __construct()
    {

    }

    public function signin() 
    {
        echo 'Login';
        /* $this->render('home'); */
    }

    public function signup() 
    {
        echo 'Cadastro';
        /* $this->render('sobre'); */
    }

    public function sobreP($args) 
    {
        print_r($args);
    }

}