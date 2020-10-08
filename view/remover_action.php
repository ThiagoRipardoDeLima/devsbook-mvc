<?php

require_once dirname(dirname(__FILE__)) . '/control/Control_Cliente.php';

echo '<pre>';
var_dump($_POST);

echo '<br>';
echo '<hr>';

$id          = filter_input(INPUT_GET,'id');

$clienteControl = new Control_Cliente();
$clienteControl->setId($id);
$clienteControl->deleteCliente();
header('Location: cadastro.php');
