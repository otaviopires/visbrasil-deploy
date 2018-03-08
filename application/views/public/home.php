<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Começa o Main -->
<main class="mdl-grid">
    <div class="mdl-cell mdl-cell--6-col">
        <div class="search-section">
            <h4 class="search-title">O que deseja saber hoje?</h4>
            <form method="POST">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col-desktop">

              <p> Escolha o tipo de pesquisa </p>

            </div>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  mdl-cell--8-col-desktop">
                <input type="checkbox" id="textcheck" name="textual" value="textual"
                onclick='toggleLegVisibility'>
                <label for="textual">Textual</label>

                <div id='pesquise' class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col-desktop">
                    <input class="mdl-textfield__input" type="text" id="PESQUISE_ASSUNTO" name="PESQUISE_ASSUNTO" >
                    <label class="mdl-textfield__label" for="PESQUISE_ASSUNTO">Pesquise no VISBRASIL</label>
                </div>
              </div>
              <!--
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col-desktop">
                  <p> Escolha os parâmetros de sua pesquisa </p>

              </div>
            -->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  mdl-cell--8-col-desktop">
              <input type="checkbox" id="paramcheck" name="parametros" value="parametros"
              onclick='toggleLegVisibility'>
              <label for="parametros">Por parametros</label>
            </div>


                <div id='legdiv' class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  mdl-cell--8-col-desktop">
								<select class="browser-default" name="legislacao" id="legislacao" >
									<option value="" disabled selected>Legislação</option>
									<?php foreach($normas as $tipo_norma){?>
									<option value="<?= $tipo_norma->CO_TIPO_NORMA?>">
										<?= $tipo_norma->DS_TIPO_NORMA?>
									</option>
									<?php } ?>
								</select>
							</div>



							<div id='areadiv' class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--8-col-desktop ">
								<select class="browser-default" name="areaAtuacao" id="areaAtuacao" >
									<option value="" disabled selected>Área de Atuação</option>
									<?php foreach($areaAtuacao as $area){?>
									<option value="<?= $area->CO_AREA_ATUACAO?>">
										<?= $area->DS_AREA_ATUACAO?>
									</option>
									<?php } ?>
								</select>
							</div>



							<div id='assuntodiv' class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  mdl-cell--8-col-desktop">
								<select class="browser-default" name="assunto" id="assunto" >
									<option value="" disabled selected>Assunto</option>
									<?php foreach($assuntos as $assunto){?>
									<option value="<?= $assunto->CO_SEQ_ASSUNTO?>">
										<?= $assunto->DS_ASSUNTO?>
									</option>
									<?php } ?>
								</select>
							</div>



							<div id= 'subassuntodiv' class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--8-col-desktop">
								<select class="browser-default" name="subassunto" id="subassunto" >
									<option value="" disabled selected>Subassunto</option>
									<?php foreach($subassuntos as $subassunto){?>
									<option value="<?= $subassunto->CO_SEQ_ASSUNTO?>">
										<?= $subassunto->DS_ASSUNTO?>
									</option>
									<?php } ?>
								</select>
							</div>



							<div id='temadiv' class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--8-col-desktop">
								<select class="browser-default" name="tema" id="tema" >
									<option value="" disabled selected>Tema</option>
									<?php foreach($temas as $tema){?>
									<option value="<?= $tema->CO_SEQ_TEMA?>">
										<?= $tema->DS_TEMA?>
									</option>
									<?php } ?>
								</select>
							</div >
              <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--8-col-desktop'
              </div>
                <button id='search' class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn-pesquisar">
                    Pesquisar
                </button>

            </form>
            <ul id="Resultado_search"></ul>
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
<script>

document.getElementById('textcheck').onchange = function() {
    document.getElementById('pesquise').style.visibility = this.checked ? 'visible' : 'hidden';
};
document.getElementById('paramcheck').onchange = function() {
  document.getElementById('legdiv').style.visibility = this.checked ? 'visible' : 'hidden';
  document.getElementById('assuntodiv').style.visibility = this.checked ? 'visible' : 'hidden';
  document.getElementById('temadiv').style.visibility = this.checked ? 'visible' : 'hidden';
  document.getElementById('subassuntodiv').style.visibility = this.checked ? 'visible' : 'hidden';
  document.getElementById('areadiv').style.visibility = this.checked ? 'visible' : 'hidden';



};


</script>

<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>

<script>
$(document).ready(function(){
  $("#textcheck").click(function() {
    var value = $(this).prop("checked");
    if (value==true){

      $('#search').click(function() {
        $.ajax({
            type: "post",
            url: "http://localhost/visbrasil/index.php/Resultado",
            cache: false,
            data:'search='+$("#PESQUISE_ASSUNTO").val(),
            success: function(response){
              window.location.href = 'http://localhost/visbrasil/index.php/resultado';


                error: function(){
                    alert('Error while request..');
                }
            });
          //  window.location.href = 'http://localhost/visbrasil/index.php/resultado';

        return false;
 });

    };
    if (value==false){
      //TODO: DECHECK-APAGAR
      console.log(value);

    };

});
$("#paramcheck").click(function() {
  var value2 = $(this).prop("checked");
  if (value2==true){
    $('#search').click(function() {
      $.ajax({ //TODO: complementar para o caso dos dropboxes


      )};
    )};
  };
  if (value2==false){
    console.log(value2);

  };
});
});
        </script>


</body>

</html>
