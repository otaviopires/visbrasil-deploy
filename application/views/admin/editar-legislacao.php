<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Começa o Main -->
<main class="mdl-layout__content">
	<div class="page-content">
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
				<div class="mdl-card mdl-cell mdl-cell--1-offset-desktop mdl-cell--10-col mdl-cell--12-col-phone container mdl-shadow--4dp">
					<div class="mdl-card__title">
						<div>
							<h2 class="mdl-card__title-text">Editar de Legislação</h2>
						</div>
						<div class="btn-dropdown">
							<button id="demo-menu-lower-left" class="mdl-button mdl-js-button mdl-button--icon">
								<i class="material-icons arrow">arrow_drop_down</i>
							</button>
							<ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect menu-background"	for="demo-menu-lower-left">
								<a href="<?=base_url()?>TipoNorma/cadastro">
									<li class="mdl-menu__item">Adicionar Tipos de Normas</li>
								</a>
								<a href="<?=base_url()?>OrgaoEmissor/cadastro">
									<li class="mdl-menu__item">Adicionar Orgão Emissor</li>
								</a>
								<a href="<?=base_url()?>Indexacao/cadastro">
									<li class="mdl-menu__item">Adicionar Indexação</li>
								</a>
							</ul>
						</div>
					</div>
					<div class="container">
						<form action="<?= base_url()?>Legislacao/salvar_atualizacao" method="POST">
							<input type="hidden" name="CO_SEQ_LEGISLACAO" id="CO_SEQ_LEGISLACAO"
							value="<?= $legislacao->CO_SEQ_LEGISLACAO?>">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--1-offset mdl-cell--5-col-desktop">

								<select class="browser-default" name="tipoNorma" required>
									<option disabled >Tipo de Norma</option>
									<?php foreach($tipoNormas as $tipo){
										if($tipo->CO_TIPO_NORMA==$legislacao->CO_TIPO_NORMA_ID){
											?>
											<option value="<?= $tipo->CO_TIPO_NORMA?>" selected>
												<?= $tipo->DS_TIPO_NORMA?>
											</option>
											<?php } else { ?>
												<option value="<?= $tipo->CO_TIPO_NORMA?>">
													<?= $tipo->DS_TIPO_NORMA?>
												</option>
												<?php } } ?>
											</select>
										</div>

										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--5-col-desktop ">
											<input class="mdl-textfield__input" type="text" id="numNorma" name="numNorma" value="<?= $legislacao->NU_NORMA ?>" required>
											<label class="mdl-textfield__label" for="numNorma">Número da Norma...</label>
										</div>

										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--1-offset mdl-cell--5-col-desktop">
											<select class="browser-default" name="orgaoEmissor" required>
												<option  disabled selected>Orgão Emissor</option>
												<?php foreach($orgaoEmissores as $orgao){
													if($orgao->CO_ORGAO_EMISSOR==$legislacao->CO_ORGAO_EMISSOR_ID){
														?>
														<option value="<?= $orgao->CO_ORGAO_EMISSOR?>" selected>
															<?= $orgao->NO_ORGAO_EMISSOR?>
														</option>
														<?php } else { ?>
															<option value="<?= $orgao->CO_ORGAO_EMISSOR?>">
																<?= $orgao->NO_ORGAO_EMISSOR?>
															</option>
															<?php } }?>
														</select>
													</div>

													<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--5-col-desktop">
														<input class="mdl-textfield__input" type="text" id="dataSancao" name="dataSancao" value="<?= date("d/m/Y", strtotime($legislacao->DT_SANCAO)) ?>" required>
														<label class="mdl-textfield__label" for="dataSancao">Data da sanção...</label>
													</div>

													<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--1-offset mdl-cell--5-col-desktop">
														<input class="mdl-textfield__input" type="text" id="dataPub" name="dataPub" value="<?= date("d/m/Y", strtotime($legislacao->DT_PUBLICACAO)) ?>" required>
														<label class="mdl-textfield__label" for="dataPub">Data da Publicação...</label>
													</div>

													<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--5-col-desktop">

													</div>


													<div class="mdl-textfield mdl-js-textfield mdl-cell--1-offset mdl-cell--10-col-desktop">
														<textarea class="mdl-textfield__input" rows= "4" type="text"  name="conteudo" value="" required><?= $legislacao->DS_CONTEUDO ?></textarea>
														<label class="mdl-textfield__label" >Conteudo...</label>
													</div>

													<div class="mdl-textfield mdl-js-textfield mdl-cell--1-offset mdl-cell--10-col-desktop">
														<textarea class="mdl-textfield__input" rows= "4" type="text"  name="ementa" value="" required><?= $legislacao->DS_EMENTA ?></textarea>
														<label class="mdl-textfield__label">Ementa...</label>
													</div>

													<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn-edit btn-cad" >Editar</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</main>  <!-- Fim main -->
					</div> <!-- Fim da div que fica no header -->

					<!-- JS-->
					<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
					<script type="text/javascript" src="<?= base_url()?>/assets/js/jquery.mask.min.js"></script>
					<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>

					<script>
					$(document).ready(function(){
						$('#dataSancao,#dataPub').mask('00/00/0000');
					});
					</script>
				</body>
				</html>
