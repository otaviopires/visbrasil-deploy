<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Começa o Main -->
<main class="mdl-layout__content">
	<div class="page-content">
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
				<div class="mdl-card mdl-cell mdl-cell--12-col mdl-cell--12-col-phone container mdl-shadow--4dp">
					<div class="mdl-card__title">
						<div>
							<h2 class="mdl-card__title-text">
								Informações Completas da Indexação
							</h2>
						</div>
						<div class="btn-dropdown">
							<button id="demo-menu-lower-left" class="mdl-button mdl-js-button mdl-button--icon">
								<i class="material-icons arrow">arrow_drop_down</i>
							</button>
							<ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect menu-background"	for="demo-menu-lower-left">
								<a href="<?= base_url()?>Indexacao/cadastro">
									<li class="mdl-menu__item">Adicionar Indexação</li>
								</a>
								<a href="<?= base_url()?>Indexacao/index">
									<li class="mdl-menu__item">Listar Indexação</li>
								</a>
							</ul>
						</div>
					</div>
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--4-col">
							<div class=" demo-card-image mdl-card mdl-shadow--2dp">
								<div class="mdl-cell mdl-cell--12-col mdl-card__supporting-text mdl-card--expand card-back">
									<p><?= $indexacao->CO_SEQ_LEGISLACAO_ID?></p>
								</div>
								<div class="mdl-cell mdl-cell--12-col mdl-card__actions mdl-card--border">
									<span class="">Legislação</span>
								</div>
							</div>
						</div>
						<div class="mdl-cell mdl-cell--4-col">
							<div class=" demo-card-image mdl-card mdl-shadow--2dp">
								<div class=" mdl-cell mdl-cell--12-col mdl-card__supporting-text mdl-card--expand card-back">
									<p><?= $indexacao->areaAtuacaoDS_AREA_ATUACAO?></p>
								</div>
								<div class="mdl-cell mdl-cell--12-col mdl-card__actions mdl-card--border">
									<span class="">Area de Atuação</span>
								</div>
							</div>
						</div>
						<div class="mdl-cell mdl-cell--4-col">
							<div class=" demo-card-image mdl-card mdl-shadow--2dp">
								<div class="mdl-cell mdl-cell--12-col mdl-card__supporting-text mdl-card--expand card-back">
									<p><?= $indexacao->ass1DS_ASSUNTO?></p>
								</div>
								<div class="mdl-cell mdl-cell--12-col mdl-card__actions mdl-card--border">
									<span class="">Assunto</span>
								</div>
							</div>
						</div>
						<div class="mdl-cell mdl-cell--4-col">
							<div class=" demo-card-image mdl-card mdl-shadow--2dp">
								<div class="mdl-cell mdl-cell--12-col mdl-card__supporting-text mdl-card--expand card-back">
									<p><?= $indexacao->ass2DS_ASSUNTO?></p>
								</div>
								<div class="mdl-cell mdl-cell--12-col mdl-card__actions mdl-card--border">
									<span class="">Subassunto</span>
								</div>
							</div>
						</div>
						<div class="mdl-cell mdl-cell--4-col">
							<div class=" demo-card-image mdl-card mdl-shadow--2dp">
								<div class="mdl-cell mdl-cell--12-col mdl-card__supporting-text mdl-card--expand card-back">
									<p><?= $indexacao->temaDS_TEMA?></p>
								</div>
								<div class="mdl-cell mdl-cell--12-col mdl-card__actions mdl-card--border">
									<span class="">Temas</span>
								</div>
							</div>
						</div>
						<div class="mdl-cell mdl-cell--4-col">
							<div class=" demo-card-image mdl-card mdl-shadow--2dp">
								<div class="mdl-cell mdl-cell--12-col mdl-card__supporting-text mdl-card--expand card-back">
									<p><?= substr(str_replace(['@','#','!','§'],'',$indexacao->DS_TEXTO_MARCACAO), 0, 30)?></p>
								</div>
								<div class="mdl-cell mdl-cell--12-col mdl-card__actions mdl-card--border">
									<span class="">Texto de Marcação</span>
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
