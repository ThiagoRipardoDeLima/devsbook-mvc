<?php
require_once dirname(dirname(__FILE__)) . '/control/Control_Cliente.php';

$controlCliente = new Control_Cliente();
$clientes = $controlCliente->getClientes();

?>

<form action="uploadFiles.php" method="post" enctype="multipart/form-data">
    <input type="file" name="arquivo">
    <input type="submit" value="Enviar">
</form>

<hr>
<br>
<a href="adicionar.php">Adicinar Cliente</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Data de Nascimento</th>
        <th>AÇOES</th>
    </tr>
<?php foreach($clientes as $cliente): ?>
    <tr>
        <td><?= $cliente->getId() ?></td>
        <td><?= $cliente->getNome() ?></td>    
        <td><?= $cliente->getCpf() ?></td>    
        <td><?= $cliente->getDataNascimento() ?></td>    
        <td>
            <a href="editar.php?id=<?= $cliente->getId();?>">Editar</a>
            <a href="remover_action.php?id=<?= $cliente->getId()?>" onclick="return confirm('Deseja remover o registro?');">Excluir</a>
        </td>
    </tr>
<?php endforeach; ?>
</table>




