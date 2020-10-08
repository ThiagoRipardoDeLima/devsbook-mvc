<?= header('Location: cadastro.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Básico</title>
</head>
<body>
	
	<h1>Estruturas de Repetição</h1>

	<fieldset>
		<legend>While</legend>
		<?php
			$cont = 0;
			while( $cont < 3 ) {
				echo "Hello world em PHP! {$cont} <br>";
				$cont++;
			}
		?>
	</fieldset>
	
	<fieldset>
		<legend>Do While</legend>
		<?php
			$cont = 0;
			do{
				echo "Hello world em PHP! {$cont} <br>";
				$cont++;
			}while( $cont < 2 );
		?>
	</fieldset>
	
	<fieldset>
		<legend>Estrutura FOR</legend>
		<?php
			for($cont = 0 ; $cont < 3 ; $cont++){
				echo "Hello world em PHP! {$cont} <br>";
			}
		?>
	</fieldset>
	
	<fieldset>
		<legend>Arrow Function</legend>
		
		<pre>$dizimo = fn($valor) => $valor * 0.1;</pre>
		
		<?php
				$dizimo = fn($valor) => $valor * 0.1;
				echo $dizimo(982);
		?>
	</fieldset>
	<fieldset>
		<legend>Matematica</legend>
		<?php
			$numero = -2.6;
			echo 'Numero: ' . $numero . '<br>';
			echo 'Valor absoluto: ' . abs($numero) . '<br>';
			echo 'Valor de pi ' . pi() . '<br>';
			$numero = 2.7;
			echo 'Novo Numero: ' . $numero . '<br>';
			echo 'Arredonda a baixo: ' . floor($numero) . '<br>';
			echo 'Arredonda a cima: ' . ceil($numero) . '<br>';
			echo 'Arredonda default: ' . round(pi()) . '<br>';
			echo 'Arredonda com 2 casa decimais: ' . round(pi(),2) . '<br>';
			echo 'Arredonda com 3 casa decimais: ' . round(pi(),3) . '<br>';
			echo 'Gerar Numero Aleatório: ' . rand(1,60) . '<br>';
			
		?>
	</fieldset>
	<fieldset>
		<legend>Data/Hora</legend>
		<?php
			echo 'data em milisegudos a partir de 01/01/1970: ' . time() . '<br>';
			echo 'data: '. date('d.m.y h:i:s').'<br>';
            
            
            
            function setDate($date)
            {
                setlocale(LC_ALL,'pt_BR','portuguese');
                return date('d-m-Y', strtotime($date)) . ' - ' . ucfirst(utf8_encode(strftime('%A', strtotime($date))));
            }
            
            $dateInt = '2020-08-22';
            echo setDate($dateInt);
			
		?>
	</fieldset>
	
</body>
</html>
