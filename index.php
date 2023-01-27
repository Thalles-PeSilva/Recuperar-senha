<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Login</title>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 offset-lg-4 mt-5">
				<div class="card bg-light">
					<div class="card-body">
						<h5 class="card-title">Acesso Restrito</h5>
						<form action="verificar.php" method="POST">
							<div class="mb-3">
								<input type="email" name="email" class="form-control" placeholder="E-mail">
							</div>
							<div class="mb-3">
								<input type="password" name="senha" placeholder="Senha" class="form-control">
							</div>
							
							<div class="g-recaptcha" data-sitekey="6LdWmxQiAAAAAC8tq4dboy-KLwz5liZSdozRT85L"></div>
							<div class="mb-3">
								<a href="recuperar.php">Esqueceu a senha?</a>
							</div>
							<div class="mb-3">
								<input type="submit" name="enviar" class="btn btn-success" onclick="return valida()">
							</div>
							<script type="text/javascript">
							function valida() {
								if (grecaptcha.getResponse() == "") {
									alert("Você precisa marcar a validação");
									return false;

								}

							}

						</script>
						</form>


						<?php 
						if (isset($_POST['enviar'])) {
							
							if(!empty($_POST['g-recaptcha-response'])) {

							}
						}

						?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
</body>
</html>