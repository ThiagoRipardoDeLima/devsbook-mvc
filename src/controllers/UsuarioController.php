<?php
namespace src\controllers;

use \core\Controller;

class UsuarioController extends Controller {

    public function index() {
        $this->render('usuarios/listar');
    }

    public function add() {
        $this->render('/usuarios/novo');
    }

    public function sobreP($args) {
        print_r($args);
    }

}