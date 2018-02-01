<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VISBRASIL</title>
	<!-- CSS-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/login.css">


	<!-- Meta-->
	<link rel="icon" href="<?= base_url(); ?>assets/imagens/favicon.ico" />
</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
		<main class="mdl-layout__content">
			<div class="page-content">
				<div class="mdl-grid">

					<div class="mdl-cell mdl-cell--4-offset mdl-cell--4-col container-login	">
						<div class="">
							<h4>VISBRASIL</h4>
							<h5>Entrar</h5>
						</div>
						<div class="mdl-cell mdl-cell--12-col">
							<form method="POST" action="<?= base_url()?>Dashboard/logar" >	
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--1-offset mdl-cell--10-col margin">
									<input class="mdl-textfield__input" type="text" id="usuario" name="user" >
									<label class="mdl-textfield__label" for="usuario">Usuário...</label>
								</div>

								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--1-offset mdl-cell--10-col">
									<input class="mdl-textfield__input" type="password" id="senha" name="senha" >
									<label class="mdl-textfield__label" for="senha">Senha...</label>
								</div>
							
									<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn-login">
										Entrar
									</button>
									
							</form>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
</main>
<!-- Termina o Main -->
</div>

<!-- JS-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
</body>
</html>