<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Começa o Main -->
<main class="mdl-layout__content">
	<div class="page-content">
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
				<div class="mdl-card mdl-cell mdl-cell--12-col mdl-cell--12-col-phone container mdl-shadow--4dp">
					<div class="mdl-card__title">
						<div>
							<h2 class="mdl-card__title-text">Informações Completas do Usuário</h2>
						</div>
						<div class="btn-dropdown">
							<button id="demo-menu-lower-left" class="mdl-button mdl-js-button mdl-button--icon">
								<i class="material-icons arrow">arrow_drop_down</i>
							</button>
							<ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect menu-background"	for="demo-menu-lower-left">
								<a href="<?= base_url()?>Usuario/cadastro">
									<li class="mdl-menu__item">Adicionar Usuário</li>
								</a>
								<a href="<?= base_url()?>Usuario/index">
									<li class="mdl-menu__item">Listar Usuário</li>
								</a>
							</ul>
						</div>
					</div>
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--4-col">
							<div class=" demo-card-image mdl-card mdl-shadow--2dp">
								<div class="mdl-cell mdl-cell--12-col mdl-card__supporting-text mdl-card--expand card-back">
									<p><?= $usuario->nome?></p>
								</div>
								<div class="mdl-cell mdl-cell--12-col mdl-card__actions mdl-card--border">
									<span class="">Nome</span>
								</div>
							</div>
						</div>
						<div class="mdl-cell mdl-cell--4-col">
							<div class=" demo-card-image mdl-card mdl-shadow--2dp">
								<div class=" mdl-cell mdl-cell--12-col mdl-card__supporting-text mdl-card--expand card-back">
									<p><?= $usuario->email?></p>
								</div>
								<div class="mdl-cell mdl-cell--12-col mdl-card__actions mdl-card--border">
									<span class="">Email</span>
								</div>
							</div>
						</div>
						<div class="mdl-cell mdl-cell--4-col">
							<div class=" demo-card-image mdl-card mdl-shadow--2dp">
								<div class="mdl-cell mdl-cell--12-col mdl-card__supporting-text mdl-card--expand card-back">
									<p><?= $usuario->user?></p>
								</div>
								<div class="mdl-cell mdl-cell--12-col mdl-card__actions mdl-card--border">
									<span class="">Usuário</span>
								</div>
							</div>
						</div>	
						<div class="mdl-cell mdl-cell--4-col">
							<div class=" demo-card-image mdl-card mdl-shadow--2dp">
								<div class="mdl-cell mdl-cell--12-col mdl-card__supporting-text mdl-card--expand card-back">
									<p><?= $usuario->status?></p>
								</div>
								<div class="mdl-cell mdl-cell--12-col mdl-card__actions mdl-card--border">
									<span class="">Status</span>
								</div>
							</div>
						</div>
						<div class="mdl-cell mdl-cell--4-col">
							<div class=" demo-card-image mdl-card mdl-shadow--2dp">
								<div class="mdl-cell mdl-cell--12-col mdl-card__supporting-text mdl-card--expand card-back">
									<p><?= date("H:i:s d/m/Y", strtotime($usuario->created))?></p>
								</div>
								<div class="mdl-cell mdl-cell--12-col mdl-card__actions mdl-card--border">
									<span class="">Criado</span>
								</div>
							</div>
						</div>
						<div class="mdl-cell mdl-cell--4-col">
							<div class=" demo-card-image mdl-card mdl-shadow--2dp">
								<div class="mdl-cell mdl-cell--12-col mdl-card__supporting-text mdl-card--expand card-back">
									<p><?= date("H:i:s d/m/Y", strtotime($usuario->changed))?></p>
								</div>
								<div class="mdl-cell mdl-cell--12-col mdl-card__actions mdl-card--border">
									<span class="">Atualizado</span>
								</div>
							</div>
						</div>		
					</div>
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