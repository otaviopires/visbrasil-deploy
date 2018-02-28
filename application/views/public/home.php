<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Começa o Main -->
<main class="mdl-grid">
    <div class="mdl-cell mdl-cell--6-col">
        <div class="search-section">
            <h4 class="search-title">O que deseja saber hoje?</h4>
            <form method="POST">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col-desktop">
                    <input class="mdl-textfield__input" type="text" id="PESQUISE_ASSUNTO" name="PESQUISE_ASSUNTO" required>
                    <label class="mdl-textfield__label" for="PESQUISE_ASSUNTO">Pesquise no VISBRASIL</label>
                </div>

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  mdl-cell--6-col-desktop">
								<select class="browser-default" name="legislacao" id="legislacao" required>
									<option value="" disabled selected>Legislação</option>
									<?php foreach($legislacoes as $legislacao){?>
									<option value="<?= $legislacao->CO_SEQ_LEGISLACAO?>">
										<?= $legislacao->RN_TEXTUAL?>
									</option>
									<?php } ?>
								</select>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--6-col-desktop ">
								<select class="browser-default" name="areaAtuacao" id="areaAtuacao" required>
									<option value="" disabled selected>Área de Atuação</option>
									<?php foreach($areaAtuacao as $area){?>
									<option value="<?= $area->CO_AREA_ATUACAO?>">
										<?= $area->DS_AREA_ATUACAO?>
									</option>
									<?php } ?>
								</select>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  mdl-cell--6-col-desktop">
								<select class="browser-default" name="assunto" id="assunto" required>
									<option value="" disabled selected>Assunto</option>
									<?php foreach($assuntos as $assunto){?>
									<option value="<?= $assunto->CO_SEQ_ASSUNTO?>">
										<?= $assunto->DS_ASSUNTO?>
									</option>
									<?php } ?>
								</select>
							</div>

							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--6-col-desktop">
								<select class="browser-default" name="subassunto" id="subassunto" required>
									<option value="" disabled selected>Subassunto</option>
									<?php foreach($subassuntos as $subassunto){?>
									<option value="<?= $subassunto->CO_SEQ_ASSUNTO?>">
										<?= $subassunto->DS_ASSUNTO?>
									</option>
									<?php } ?>
								</select>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--6-col-desktop">
								<select class="browser-default" name="tema" id="tema" required>
									<option value="" disabled selected>Tema</option>
									<?php foreach($temas as $tema){?>
									<option value="<?= $tema->CO_SEQ_TEMA?>">
										<?= $tema->DS_TEMA?>
									</option>
									<?php } ?>
								</select>
							</div>
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn-pesquisar">
                    Pesquisar
                </button>
            </form>
        </div>

        <section class="publicidade-section">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col publicidade">
                    Publicidade 1
                </div>
                <div class="mdl-cell mdl-cell--4-col publicidade">
                    Publicidade 2
                </div>
                <div class="mdl-cell mdl-cell--4-col publicidade">
                    Publicidade 3
                </div>
            </div>
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col publicidade">
                    Publicidade 4
                </div>

            </div>
        </section>

    </div>


</main>

<!-- Fim do Main -->
</div>
<!-- Fim da div que fica no header -->


<!-- JS-->
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>


</body>

</html>