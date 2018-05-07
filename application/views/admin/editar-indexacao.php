<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Começa o Main -->
<main class="mdl-layout__content">
	<div class="page-content">
		<div class="mdl-grid">
			<div class="mdl-card mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone container mdl-shadow--4dp">
				<div class="mdl-card__title">
					<div><h2 class="mdl-card__title-text">Atualizar Indexação</h2></div>
					<div class="btn-dropdown">
						<button id="demo-menu-lower-left"
						class="mdl-button mdl-js-button mdl-button--icon">
						<i class="material-icons arrow">arrow_drop_down</i>
					</button>
					<ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect menu-background"
					for="demo-menu-lower-left">
					<a href="<?=base_url()?>Legislacao/cadastro"><li class="mdl-menu__item">Adicionar Legislação</li></a>
					<a href="<?=base_url()?>AreaAtuacao/cadastro"><li class="mdl-menu__item">Adicionar Área de Atuação</li></a>
					<a href="<?=base_url()?>Assunto/cadastro"><li class="mdl-menu__item">Adicionar Assunto</li></a>
					<a href="<?=base_url()?>Tema/cadastro"><li class="mdl-menu__item">Adicionar Tema</li></a>
				</ul>
			</div>
		</div>
		<div class="container">
			<form action="<?= base_url('Indexacao/salvar_atualizacao')?>" method="POST">
			<input type="hidden" name="CO_SEQ_INDICE" id="CO_SEQ_INDICE" value="<?= $indexacao->CO_SEQ_INDICE?>">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--1-offset mdl-cell--5-col-desktop">
					<select class="browser-default" name="legislacao" id="legislacao" required>
						<option value="" disabled >Legislação</option>
							<?php foreach($legislacoes as $legislacao){
									if($legislacao->CO_SEQ_LEGISLACAO==$indexacao->CO_SEQ_LEGISLACAO_ID){
								?>
								<option value="<?= $legislacao->CO_SEQ_LEGISLACAO?>" selected>
									<?= mb_strimwidth($legislacao->DS_CONTEUDO, 0, 50, '...')?>
								</option>
									<?php } else{?>
								<option value="<?= $legislacao->CO_SEQ_LEGISLACAO?>">
									<?= mb_strimwidth($legislacao->DS_CONTEUDO, 0, 50, '...')?>
								</option>
							<?php } }?>
						</select>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--5-col-desktop ">
						<select class="browser-default" name="areaAtuacao" id="areaAtuacao" required>
							<option value="" disabled >Área de Atuação</option>
								<?php foreach($areaAtuacao as $area){
										if($area->CO_AREA_ATUACAO==$indexacao->CO_AREA_ATUACAO_ID){
									?>
									<option value="<?= $area->CO_AREA_ATUACAO?>" selected>
										<?= $area->DS_AREA_ATUACAO?>
									</option>
										<?php } else{ ?>
									<option value="<?= $area->CO_AREA_ATUACAO?>">
										<?= $area->DS_AREA_ATUACAO?>
									</option>
								<?php } } ?>
							</select>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--1-offset mdl-cell--5-col-desktop">
							<select class="browser-default" name="assunto" id="assunto" required>
								<option value="" disabled >Assunto</option>
									<?php foreach($assuntos as $assunto){
											if($assunto->CO_SEQ_ASSUNTO==$indexacao->CO_SEQ_ASSUNTO_ID){
										?>
										<option value="<?= $assunto->CO_SEQ_ASSUNTO?>" selected>
											<?= $assunto->DS_ASSUNTO?>
										</option>
											<?php } else{?>
										<option value="<?= $assunto->CO_SEQ_ASSUNTO?>">
											<?= $assunto->DS_ASSUNTO?>
										</option>
									<?php } }?>
								</select>
							</div>

							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--5-col-desktop">
								<select class="browser-default" name="subassunto" id="subassunto" required>
									<option value="" disabled >Subassunto</option>
									<?php foreach($subassuntos as $subassunto){
											if($subassunto->CO_SEQ_ASSUNTO==$indexacao->CO_SEQ_ASSUNTO_ID){
										?>
										<option value="<?= $subassunto->CO_SEQ_ASSUNTO?>" selected >
											<?= $subassunto->DS_ASSUNTO?>
										</option>
											<?php } else{?>
										<option value="<?= $subassunto->CO_SEQ_ASSUNTO?>" >
											<?= $subassunto->DS_ASSUNTO?>
										</option>
									<?php } }?>
								</select>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--1-offset mdl-cell--5-col-desktop">
								<select class="browser-default" name="tema" id="tema" required>
									<option value="" disabled >Tema</option>
										<?php foreach($temas as $tema){
												if($tema->CO_SEQ_TEMA==$indexacao->CO_SEQ_TEMA_ID){
											?>
											<option value="<?= $tema->CO_SEQ_TEMA?>" selected>
												<?= $tema->DS_TEMA?>
											</option>
												<?php } else{?>
											<option value="<?= $tema->CO_SEQ_TEMA?>" >
												<?= $tema->DS_TEMA?>
											</option>
										<?php } } ?>
								</select>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--5-col-desktop">
								<input class="mdl-textfield__input" type="text" id="funcao" name="marcacao"
								value="<?= substr(str_replace(['@','#','!','§'],'',$indexacao->DS_TEXTO_MARCACAO), 0, 30)?>" required>
								<label class="mdl-textfield__label" for="funcao">Marcação...</label>
							</div>

							<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn-edit btn-cad" >Atualizar</button>
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
