<?php

require_once dirname(dirname(__FILE__)) . '/control/Control_Cliente.php';
$id = filter_input(INPUT_GET, 'id');

$ccliente = new Control_Cliente();
$ccliente->setId($id);
$cli = $ccliente->findGetById()[0];

?>
<h1>Atualizar Cliente</h1>
<form action="editar_action.php" method="post">
    <input type="hidden" name="id" value=<?= $cli->getId(); ?>>
    <label for="nome">
    Nome: <input type="text" name="nome" id="nome" value=<?= $cli->getNome() ?>>
    </label>
    <br>
    <label for="cpf">
    cpf: <input type="text" name="cpf" id="cpf" value=<?= $cli->getCpf() ?>>
    </label>
    <br>
    <label for="data_nascimento">
    Data de Nascimento: <input type="date" name="data_nascimento" id="data_nascimento" value=<?= $cli->getDataNascimento() ?>>
    </label>
    <input type="submit" value="Salvar">
</form>
