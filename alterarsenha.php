<?php
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('BASE', 'usuarios');

if(isset($_GET['codigo'])){
	$codigo = $_GET['codigo'];
	$email_codigo = base64_decode($codigo);

	$selecionar = ("SELECT * FROM 'codigos' WHERE codigo = '$codigo' AND data > NOW()");
	if($selecionar->num_rows >= 1){
		if(isset($_POST['acao']) && $_POST['acao'] == 'mudar'){
			$nova_senha = $_POST['novasenha'];

			$atualizar = ("UPDATE 'usuarios' SET 'senha' = '$nova_senha' WHERE 'email' = '$email_codigo'");
			if($atualizar){
				$mudar = ("DELETE FROM 'codigos' WHERE codigo = '$codigo'");
				echo 'A senha foi modificada com sucesso!';
			}

		}
?>

<h1>Digite a senha nova</h1>
<form action="" method="POST" enctype="multipart/form-data">
<input type="password" name="novasenha" value=""/>	

<input type="hidden" name="acao" value="mudar"/>
<input type="submit" value="Mudar Senha"/>

<?php

	}else{
		echo '<h1>Desculpe mais este link já espirou!</h1>';
	}
}
?>




</form>
			