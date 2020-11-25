<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/login', 'LoginController@signin');
$router->get('/cadastro', 'LoginController@signup');
$router->get('/usuario/novo', 'UsuarioController@add');