<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Começa o Main -->
<main class="mdl-layout__content">
	<div class="page-content">
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
				<div class="mdl-card mdl-cell mdl-cell--1-offset-desktop mdl-cell--10-col mdl-cell--12-col-phone container mdl-shadow--4dp">
					<div class="mdl-card__title">
						<div>
							<h2 class="mdl-card__title-text">Cadastro de Indexação</h2>
						</div>
						<div class="btn-dropdown">
							<button id="demo-menu-lower-left" class="mdl-button mdl-js-button mdl-button--icon">
								<i class="material-icons arrow">arrow_drop_down</i>
							</button>
							<ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect menu-background"	for="demo-menu-lower-left">
								<a href="<?=base_url()?>Legislacao/cadastro">
									<li class="mdl-menu__item">Adicionar Legislação</li>
								</a>
								<a href="<?=base_url()?>AreaAtuacao/cadastro">
									<li class="mdl-menu__item">Adicionar Área de Atuação</li>
								</a>
								<a href="<?=base_url()?>Assunto/cadastro">
									<li class="mdl-menu__item">Adicionar Assunto</li>
								</a>
								<a href="<?=base_url()?>Tema/cadastro">
									<li class="mdl-menu__item">Adicionar Tema</li>
								</a>
							</ul>
						</div>
					</div>
					<div class="container">
						<form action="<?= base_url('Indexacao/cadastrar')?>" method="POST">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--1-offset mdl-cell--5-col-desktop">
								<select class="browser-default" name="legislacao" id="legislacao" required>
									<option value="" disabled selected>Legislação</option>
									<?php foreach($legislacoes as $legislacao){?>
									<option value="<?= $legislacao->CO_SEQ_LEGISLACAO?>">
										<?= mb_strimwidth($legislacao->DS_CONTEUDO, 0, 50, '...')?>
									</option>
									<?php } ?>
								</select>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--5-col-desktop ">
								<select class="browser-default" name="areaAtuacao" id="areaAtuacao" required>
									<option value="" disabled selected>Área de Atuação</option>
									<?php foreach($areaAtuacao as $area){?>
									<option value="<?= $area->CO_AREA_ATUACAO?>">
										<?= $area->DS_AREA_ATUACAO?>
									</option>
									<?php } ?>
								</select>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--1-offset mdl-cell--5-col-desktop">
								<select class="browser-default" name="assunto" id="assunto" required>
									<option value="" disabled selected>Assunto</option>
									<?php foreach($assuntos as $assunto){?>
									<option value="<?= $assunto->CO_SEQ_ASSUNTO?>">
										<?= $assunto->DS_ASSUNTO?>
									</option>
									<?php } ?>
								</select>
							</div>

							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--5-col-desktop">
								<select class="browser-default" name="subassunto" id="subassunto" required>
									<option value="" disabled selected>Subassunto</option>
									<?php foreach($subassuntos as $subassunto){?>
									<option value="<?= $subassunto->CO_SEQ_ASSUNTO?>">
										<?= $subassunto->DS_ASSUNTO?>
									</option>
									<?php } ?>
								</select>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--1-offset mdl-cell--5-col-desktop">
								<select class="browser-default" name="tema" id="tema" required>
									<option value="" disabled selected>Tema</option>
									<?php foreach($temas as $tema){?>
									<option value="<?= $tema->CO_SEQ_TEMA?>">
										<?= $tema->DS_TEMA?>
									</option>
									<?php } ?>
								</select>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--5-col-desktop">
								<input class="mdl-textfield__input" type="text" id="marcacao" name="marcacao" required>
								<label class="mdl-textfield__label" for="marcacao">Marcação...</label>
							</div>

							<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn-edit btn-cad" >Cadastrar</button>
						</form>
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
