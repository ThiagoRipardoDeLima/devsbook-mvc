<?php
namespace src\controllers;

use \core\Controller;

class HomeController extends Controller {

    private $loggerUser;

    public function __construct()
    {
        $this->redirect('/login');
    }

    public function index() 
    {
        $this->render('home');
    }

    public function sobre() 
    {
        $this->render('sobre');
    }

    public function sobreP($args) 
    {
        print_r($args);
    }

}