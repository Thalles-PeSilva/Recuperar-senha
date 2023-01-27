<html>
<?php
	date_default_timezone_set("America/Sao_Paulo");

ini_set('smtp_port', '587');
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('BASE', 'usuarios');
?>
<head>
	<title>Recuperar Senha</title>
</head>

<body>
	<?php
	if(isset($_POST['acao']) && $_POST['acao'] == 'recuperar'):
		$email = strip_tags(filter_input(INPUT_POST, 'emailRecupera', FILTER_SANITIZE_STRING));
		$verificar = ("SELECT 'email' FROM 'usuarios' WHERE email = '$email'");
		if($verificar->num_rows == 1){
			$codigo = base64_encode($email);
			$data_expirar = date('Y-m-d H:i:s', strtotime('+1 day'));

			$mensagem = '<p>Recebemos uma tentaiva de recuperação de senha para este e-mail, caso não tenha sido você, desconsidere este e-mail, caso contrário clique no link abaixo<br/> <a href="https://caduserudf.herokuapp.com/recuperar.php?codigo='.$codigo.'">Recuperar Senha</a></p>';
			$email_remetente = 'thallespereiradasilva@gmail.com';

			$headers = "MIME-Version: 1.1\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\n";
			$headers .= "From: $email_remetente\n";
			$headers .= "Return-Path: $email_remetente\n";
			$headers .= "Reply-To: $email\n";
			$iserir = ("INSERT INTO 'codigos' SET codigo = '$codigo', data = '$data_expirar'");
			if($inserir){
			if(mail("$email", "Assunto", "$mensagem", $headers, "-f$email_remetente")){
				echo 'Enviamos um e-mail com um link para recuperação de senha, para o endereço de email informado';
			}
		}
		}
		

	endif;
			

	?>


	<form action="" method="POST" enctype="multipart/form-data">
		<?php
			if(isset($_GET['recuperar']) && $_GET['recuperar'] == 'sim')
		?>
			<input type="text" name="emailRecupera" value=""/>	
			<input type="hidden" name="acao" value="recuperar"/>
			<input type="submit" value="Recuperar Senha"/>
			<a href="recuperar.php">
		
			
	</form>
		

</body>
</html>