<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Começa o Main -->
<main class="mdl-layout__content">
	<div class="page-content">
		<div class="mdl-grid">

			<div class="mdl-card mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone container mdl-shadow--4dp">
				<div class="mdl-card__title">
					<h2 class="mdl-card__title-text">Atualizar usuários</h2>
				</div>
				<div class="container">
					<form action="<?= base_url()?>Usuario/salvar_atualizacao" method="POST">
						<input type="hidden" id="id" name="id" value="<?= $usuario->id ?>">

						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--1-offset mdl-cell--5-col-desktop">
							<input class="mdl-textfield__input" type="text" id="nome" name="nome" title="SOMENTE LETRAS" required pattern="[a-zA-Z0-9\s]+" value="<?= $usuario->nome ?>">
							<label class="mdl-textfield__label" for="nome">Nome...</label>
						</div>

						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--5-col-desktop">
							<input class="mdl-textfield__input" type="email" id="email" name="email" value="<?= $usuario->email ?>" required>
							<label class="mdl-textfield__label" for="email">Email...</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--1-offset mdl-cell--5-col-desktop">
							<input class="mdl-textfield__input" type="text" id="usuario" name="user" value="<?= $usuario->user ?>" required>
							<label class="mdl-textfield__label" for="usuario">Usuário...</label>
						</div>

						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--5-col-desktop">
							<input class="mdl-textfield__input" type="password" id="senha" name="senha" required>
							<label class="mdl-textfield__label" for="senha">Senha...</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--1-offset mdl-cell--5-col-desktop">
							<select class="browser-default" name="status">
								<option value="" disabled selected>Status</option>
								<option value="1"<?= $usuario->status==1?' selected ': ''; ?>>Ativo</option>
								<option value="2"<?= $usuario->status==2?' selected ': ''; ?>>Inativo</option>
							</select>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--5-col-desktop">
							<select class="browser-default" name="nivel">
								<option value="" disabled selected>Permissão</option>
								<option value="1"<?= $usuario->nivel==1?' selected ': ''; ?>>Administrador</option>
								<option value="2"<?= $usuario->nivel==2?' selected ': ''; ?>>Usuário</option>

							</select>
						</div>
						<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn-edit btn-cad">
							Atualizar
						</button>

					</form>
				</div>
			</div>
		</div>
	</div>
</main> <!-- Fim do Main -->
</div> <!-- Fim da div que fica no header -->


<!-- JS-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
</body>
</html>