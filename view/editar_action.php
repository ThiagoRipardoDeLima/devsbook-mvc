<?php

require_once dirname(dirname(__FILE__)) . '/control/Control_Cliente.php';

echo '<pre>';
var_dump($_POST);

echo '<br>';
echo '<hr>';

$id          = filter_input(INPUT_POST, 'id');
$nome        = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
$cpf         = filter_input(INPUT_POST,'cpf',FILTER_SANITIZE_STRING);
$nascimento  = filter_input(INPUT_POST,'data_nascimento',FILTER_SANITIZE_STRING);

$clienteControl = new Control_Cliente();
$clienteControl->setId($id);
$clienteControl->setNome($nome);
$clienteControl->setCpf($cpf);
$clienteControl->setDataNascimento($nascimento);
$clienteControl->updateCliente();
header('Location: cadastro.php');
