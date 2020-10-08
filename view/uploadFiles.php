<?php
echo '<pre>';
print_r($_FILES);

echo $_FILES['arquivo']['name'] . '<br>';
echo $_FILES['arquivo']['type'] . '<br>';
echo $_FILES['arquivo']['tmp_name'] . '<br>';
echo $_FILES['arquivo']['error'] . '<br>';
echo $_FILES['arquivo']['size'] . '<br>';


$directoryUploadFile = 'arquivos';
if (!is_dir($directoryUploadFile)) mkdir($directoryUploadFile,0777);

$nome = md5(time().rand(0,1000)).'.jpg';
$isOk = move_uploaded_file($_FILES['arquivo']['tmp_name'],'arquivos/'.$nome);
var_dump($isOk);
