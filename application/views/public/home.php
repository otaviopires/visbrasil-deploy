<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Começa o Main -->
<main class="mdl-grid">
    <div class="mdl-cell mdl-cell--6-col">
        <div class="search-section">
            <h4 class="search-title">O que deseja saber hoje?</h4>
                <div class="col-md-10">
                    <form method="POST" action="<?=base_url('search')?>" role="search">
                        <div class="input-group">
                            <input style="border-color: #469689 !important;" type="text" class="form-control" placeholder="Pesquise por assuntos aqui" name="PESQUISE_ASSUNTO" id="srch-term">
                            <div class="input-group-btn">
                                <button style="border-color: #469689 !important;" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div><br><br>
            <h6 class="search-title">Filtrar resultados <?php if(!is_null($search)): ?>  <span style="color: #999;"><em> - pesquisa por: "<?php echo $search;?>"</em></span><?php endif;?></h6>
                <a style="border: none !important; background-color: transparent !important;" class="btn btn-default" id="n" role="button" data-toggle="collapse" href="#normas" aria-expanded="false" aria-controls="collapseExample">
                    Tipos de Normas <span class="badge"><?php echo count($normas);?></span>
                </a> |
                <a style="border: none !important; background-color: transparent !important;" class="btn btn-default" id="l" role="button" data-toggle="collapse" href="#legislacao" aria-expanded="false" aria-controls="collapseExample">
                    Legislação <span class="badge"><?php echo count($legislacoes);?></span>
                </a> |
                <a style="border: none !important; background-color: transparent !important;" class="btn btn-default" id="a" role="button" data-toggle="collapse" href="#art" aria-expanded="false" aria-controls="collapseExample">
                    Área de Atuação <span class="badge"><?php echo count($areaAtuacao);?></span>
                </a> <br>

                <a style="border: none !important; background-color: transparent !important;" class="btn btn-default" id="assb" role="button" data-toggle="collapse" href="#assuntoesub" aria-expanded="false" aria-controls="collapseExample">
                    Assunto e sub-assuntos <span class="badge"><?php echo count($assuntos) + count($subassuntos);?></span>
                </a> |

                <a style="border: none !important; background-color: transparent !important;" class="btn btn-default" id="t" role="button" data-toggle="collapse" href="#tema" aria-expanded="false" aria-controls="collapseExample">
                    Temas <span class="badge"><?php echo count($temas);?></span>
                </a> |

                <a style="border: none !important; background-color: transparent !important;" class="btn btn-default" id="td" role="button" data-toggle="collapse" href="#todos" aria-expanded="false" aria-controls="collapseExample">
                  Todos
                </a>

                <div class="collapse" id="normas">
                    <br>
                    <div class="well">
                        <table id="results" class="mdl-data-table">
                            <thead>
                            <tr>
                                <th>CO_TIPO_NORMA</th>
                                <th>DS_TIPO_NORMA</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($normas as $result):
                                echo
                                    '<tr>'.
                                    '<td>' . $result->CO_TIPO_NORMA .'</td>' .
                                    '<td>' . mb_strimwidth($result->DS_TIPO_NORMA, 0, 20, "...") . '</td>' .
                                    '</tr>'
                                ;
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="collapse" id="legislacao">
                    <br>
                    <div class="well">
                        <table id="leg" class="mdl-data-table">
                            <thead>
                            <tr>
                                <th>DT_SANCAO</th>
                                <th>DT_PUBLICACAO</th>
                                <th>DS_EMENTA</th>
                                <th>DS_CONTEUDO</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($legislacoes as $result):
                                echo
                                    '<tr>'.
                                    '<td>' . date('d/m/Y', strtotime($result->DT_SANCAO)) .'</td>' .
                                    '<td>' . date('d/m/Y', strtotime($result->DT_PUBLICACAO)) . '</td>' .
                                    '<td>' . mb_strimwidth($result->DS_EMENTA, 0, 20, "...") . '</td>' .
                                    '<td>' . mb_strimwidth($result->DS_CONTEUDO, 0, 20, "...") . '</td>' .
                                    '</tr>'
                                ;
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="collapse" id="assuntoesub">
                    <br>
                    <div class="well">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#ass" aria-controls="ass" role="tab" data-toggle="tab">Assunto</a></li>
                            <li role="presentation"><a href="#subass" aria-controls="subass" role="tab" data-toggle="tab">Sub-assunto</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="ass">
                                <table id="as" class="mdl-data-table">
                                    <thead>
                                    <tr>
                                        <th>CO_SEQ_ASSUNTO</th>
                                        <th>DS_ASSUNTO</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($assuntos as $result):
                                        echo
                                            '<tr>'.
                                            '<td>' . $result->CO_SEQ_ASSUNTO .'</td>' .
                                            '<td>' . mb_strimwidth($result->DS_ASSUNTO, 0, 20, "...") . '</td>'
                                            .'</tr>'

                                        ;
                                    endforeach;
                                    ?>
                                    </tbody>
                                </table>

                            </div>
                            <div role="tabpanel" class="tab-pane" id="subass">

                                <table id="subas" class="mdl-data-table">
                                    <thead>
                                    <tr>

                                        <th>CO_SEQ_SUBASSUNTO</th>
                                        <th>DS_SUBASSUNTO</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($subassuntos as $result):
                                        echo
                                            '<tr>'.
                                            '<td>' . $result->CO_SEQ_SUBASSUNTO.'</td>' .
                                            '<td>' . mb_strimwidth($result->DS_SUBASSUNTO, 0, 20, "...") . '</td>'.
                                            '</tr>'
                                        ;
                                    endforeach;
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="collapse" id="art">
                    <br>
                    <div class="well">
                        <table id="ara" class="mdl-data-table">
                            <thead>
                            <tr>
                                <th>CO_AREA_ATUACAO</th>
                                <th>DS_AREA_ATUACAO</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($areaAtuacao as $result):
                                echo
                                    '<tr>'.
                                    '<td>' . $result->CO_AREA_ATUACAO .'</td>' .
                                    '<td>' . mb_strimwidth($result->DS_AREA_ATUACAO, 0, 20, "...") . '</td>' .
                                    '</tr>'
                                ;
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="collapse" id="tema">
                    <br>
                    <div class="well">
                        <table id="tm" class="mdl-data-table">
                            <thead>
                            <tr>
                                <th>CO_SEQ_TEMA</th>
                                <th>DS_TEMA</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($temas as $result):
                                echo
                                    '<tr>'.
                                    '<td>' . $result->CO_SEQ_TEMA .'</td>' .
                                    '<td>' . mb_strimwidth($result->DS_TEMA, 0, 20, "...") . '</td>' .
                                    '</tr>'
                                ;
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php if(is_null($search)): ?>
                <div style="width: 1000px !important;" class="collapse" id="todos">
                    <br>
                    <div class="well">
                        <table id="all" class="mdl-data-table">
                            <thead>
                            <tr>
                                <th>DS_TEXTO_MARCACAO</th>
                                <th>DS_CONTEUDO (LEGISLAÇÃO)</th>
                                <th>DS_TEMA</th>
                                <th>DS_ASSUNTO</th>
                                <th>DS_SUBASSUNTO</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($all as $result):
                                echo
                                    '<tr>'.
                                    '<td>' . mb_strimwidth($result->DS_TEXTO_MARCACAO, 0, 20, "...") .'</td>' .
                                    '<td>' . mb_strimwidth($result->DS_CONTEUDO, 0, 20, "...") . '</td>' .
                                    '<td>' . mb_strimwidth($result->temaDS_TEMA, 0, 20, "...") . '</td>' .
                                    '<td>' . mb_strimwidth($result->ass1DS_ASSUNTO, 0, 20, "...") . '</td>' .
                                    '<td>' . mb_strimwidth($result->ass2DS_ASSUNTO, 0, 20, "...") . '</td>' .
                                    '</tr>'
                                ;
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                    <?php else: ?>
                        <div style="width: 1000px !important;" id="todos-s"  class="well"> <br><br>
                            <table id="all" class="mdl-data-table">
                                <thead>
                                <tr>
                                    <th>DS_TEXTO_MARCACAO</th>
                                    <th>DS_CONTEUDO (LEGISLAÇÃO)</th>
                                    <th>DS_TEMA</th>
                                    <th>DS_ASSUNTO</th>
                                    <th>DS_SUBASSUNTO</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($all as $result):
                                    echo
                                        '<tr>'.
                                        '<td>' . mb_strimwidth($result->DS_TEXTO_MARCACAO, 0, 20, "...") .'</td>' .
                                        '<td>' . mb_strimwidth($result->DS_CONTEUDO, 0, 20, "...") . '</td>' .
                                        '<td>' . mb_strimwidth($result->temaDS_TEMA, 0, 20, "...") . '</td>' .
                                        '<td>' . mb_strimwidth($result->ass1DS_ASSUNTO, 0, 20, "...") . '</td>' .
                                        '<td>' . mb_strimwidth($result->ass2DS_ASSUNTO, 0, 20, "...") . '</td>' .
                                        '</tr>'
                                    ;
                                endforeach;
                                ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>

              <!--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  mdl-cell--8-col-desktop">
                <input type="checkbox" id="textcheck" name="textual" value="textual"
                onclick='toggleLegVisibility()'>
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
            <!--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  mdl-cell--8-col-desktop">
              <input type="checkbox" id="paramcheck" name="parametros" value="parametros"
              onclick='toggleLegVisibility()'>
              <label for="parametros">Por parametros</label>
            </div>

                <div id='legdiv' class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  mdl-cell--8-col-desktop">
								<select class="browser-default" name="legislacao" id="legislacao" >
									<option value="" disabled selected>Legislação (número norma)</option>
									<?php foreach($legislacoes as $tipo_norma){?>
									<option value="<?= $tipo_norma->CO_SEQ_LEGISLACAO?>">
										<?= $tipo_norma->NU_NORMA ?>
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
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn-pesquisar">
                    Pesquisar
                </button>
        </div>
    <?php if(!is_null($results)): ?>
    <table id="results" class="mdl-data-table">
        <thead>
        <tr>
            <th>DS_TEXTO_MARCACAO</th>
            <th>DS_CONTEUDO (LEGISLAÇÃO)</th>
            <th>DS_TEMA</th>
            <th>DS_ASSUNTO</th>
            <th>DS_SUBASSUNTO</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($results as $result):
                echo
                    '<tr>'.
                        '<td>' . mb_strimwidth($result->DS_TEXTO_MARCACAO, 0, 20, "...") .'</td>' .
                        '<td>' . mb_strimwidth($result->DS_CONTEUDO, 0, 20, "...") . '</td>' .
                        '<td>' . mb_strimwidth($result->temaDS_TEMA, 0, 20, "...") . '</td>' .
                        '<td>' . mb_strimwidth($result->ass1DS_ASSUNTO, 0, 20, "...") . '</td>' .
                        '<td>' . mb_strimwidth($result->ass2DS_ASSUNTO, 0, 20, "...") . '</td>' .
                    '</tr>'
                ;
           endforeach;
        ?>
        </tbody>
    </table>
    <?php endif; ?>
    -->
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
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/dataTables.material.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        //cria o rodapé com data e horário
        var d = new Date();
        var time =  d.toLocaleTimeString();
        var dNow = new Date();
        var data =  + dNow.getDate() + '/'+dNow.getMonth() + '/' + dNow.getFullYear();

        $('#n').click(function () {
            $('#legislacao').collapse('hide');
            $('#art').collapse('hide');
            $('#assuntoesub').collapse('hide');
            $('#tema').collapse('hide');
            $('#todos').collapse('hide');
            $('#todos-s').hide();

        });

        $('#l').click(function () {
            $('#normas').collapse('hide');
            $('#art').collapse('hide');
            $('#assuntoesub').collapse('hide');
            $('#tema').collapse('hide');
            $('#todos').collapse('hide');
            $('#todos-s').hide();
        });

        $('#a').click(function () {
            $('#normas').collapse('hide');
            $('#legislacao').collapse('hide');
            $('#assuntoesub').collapse('hide');
            $('#tema').collapse('hide');
            $('#todos').collapse('hide');
            $('#todos-s').hide();
        });


        $('#assb').click(function () {
            $('#normas').collapse('hide');
            $('#legislacao').collapse('hide');
            $('#art').collapse('hide');
            $('#tema').collapse('hide');
            $('#todos').collapse('hide');
            $('#todos-s').hide();
        });

        $('#t').click(function () {
            $('#normas').collapse('hide');
            $('#legislacao').collapse('hide');
            $('#art').collapse('hide');
            $('#assuntoesub').collapse('hide');
            $('#todos').collapse('hide');
            $('#todos-s').hide();
        });

        $('#td').click(function () {
            $('#normas').collapse('hide');
            $('#legislacao').collapse('hide');
            $('#art').collapse('hide');
            $('#assuntoesub').collapse('hide');
            $('#tema').collapse('hide');
            $('#todos-s').show();
        });


        $('#results').dataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',exportOptions: {
                },orientation: 'portrait', pageSize: 'A4',text:'Gerar PDF', title:'TIPOS DE NORMAS',
                    customize: function ( doc ) {
                        //centralizar table
                        doc.defaultStyle.alignment = 'center';
                        doc.styles.tableHeader.alignment = 'center';    ''
                        doc.content[1].table.widths = '*';

                        var cols = [];
                        cols[1] = {text: 'Gerado em ' + data +' às '+ time, alignment: 'right', margin:[0,0,20] };
                        doc.defaultStyle.fontSize = 12;
                        doc.styles.tableHeader.fontSize = 14;
                        doc.styles.title.fontsize = 20;
                        var objFooter = {};
                        objFooter['columns'] = cols;
                        doc['footer']= objFooter;
                        //doc.content.splice( 1, 0, {
                            //margin: [ 0, 0, 0, 12 ],
                            //alignment: 'center'
                            //image: dataUri
                       // } );

                    }

                }
            ]
        });

        $('#all').dataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',exportOptions: {
                },orientation: 'landscape', pageSize: 'A4',text:'Gerar PDF', title:'TODOS',
                    customize: function ( doc ) {
                        //centralizar table
                        doc.defaultStyle.alignment = 'center';
                        doc.styles.tableHeader.alignment = 'center';    ''
                        doc.content[1].table.widths = '*';

                        var cols = [];
                        cols[1] = {text: 'Gerado em ' + data +' às '+ time, alignment: 'right', margin:[0,0,20] };
                        doc.defaultStyle.fontSize = 12;
                        doc.styles.tableHeader.fontSize = 14;
                        doc.styles.title.fontsize = 20;
                        var objFooter = {};
                        objFooter['columns'] = cols;
                        doc['footer']= objFooter;
                        //doc.content.splice( 1, 0, {
                        //margin: [ 0, 0, 0, 12 ],
                        //alignment: 'center'
                        //image: dataUri
                        // } );

                    }

                }
            ]
        });

        $('#leg').dataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',exportOptions: {
                },orientation: 'portrait', pageSize: 'A4',text:'Gerar PDF', title:'LEGISLAÇÃO',
                    customize: function ( doc ) {
                        //centralizar table
                        doc.defaultStyle.alignment = 'center';
                        doc.styles.tableHeader.alignment = 'center';    ''
                        doc.content[1].table.widths = '*';

                        var cols = [];
                        cols[1] = {text: 'Gerado em ' + data +' às '+ time, alignment: 'right', margin:[0,0,20] };
                        doc.defaultStyle.fontSize = 12;
                        doc.styles.tableHeader.fontSize = 14;
                        doc.styles.title.fontsize = 20;
                        var objFooter = {};
                        objFooter['columns'] = cols;
                        doc['footer']= objFooter;
                        //doc.content.splice( 1, 0, {
                        //margin: [ 0, 0, 0, 12 ],
                        //alignment: 'center'
                        //image: dataUri
                        // } );

                    }

                }
            ]
        });

        $('#ara').dataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',exportOptions: {
                },orientation: 'portrait', pageSize: 'A4',text:'Gerar PDF', title:'ÁREA DE ATUAÇÃO',
                    customize: function ( doc ) {
                        //centralizar table
                        doc.defaultStyle.alignment = 'center';
                        doc.styles.tableHeader.alignment = 'center';    ''
                        doc.content[1].table.widths = '*';

                        var cols = [];
                        cols[1] = {text: 'Gerado em ' + data +' às '+ time, alignment: 'right', margin:[0,0,20] };
                        doc.defaultStyle.fontSize = 12;
                        doc.styles.tableHeader.fontSize = 14;
                        doc.styles.title.fontsize = 20;
                        var objFooter = {};
                        objFooter['columns'] = cols;
                        doc['footer']= objFooter;
                        //doc.content.splice( 1, 0, {
                        //margin: [ 0, 0, 0, 12 ],
                        //alignment: 'center'
                        //image: dataUri
                        // } );

                    }

                }
            ]
        });

        $('#as').dataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',exportOptions: {
                },orientation: 'portrait', pageSize: 'A4',text:'Gerar PDF', title:'ASSUNTO E SUB-ASSUNTO',
                    customize: function ( doc ) {
                        //centralizar table
                        doc.defaultStyle.alignment = 'center';
                        doc.styles.tableHeader.alignment = 'center';    ''
                        doc.content[1].table.widths = '*';

                        var cols = [];
                        cols[1] = {text: 'Gerado em ' + data +' às '+ time, alignment: 'right', margin:[0,0,20] };
                        doc.defaultStyle.fontSize = 12;
                        doc.styles.tableHeader.fontSize = 14;
                        doc.styles.title.fontsize = 20;
                        var objFooter = {};
                        objFooter['columns'] = cols;
                        doc['footer']= objFooter;
                        //doc.content.splice( 1, 0, {
                        //margin: [ 0, 0, 0, 12 ],
                        //alignment: 'center'
                        //image: dataUri
                        // } );

                    }

                }
            ]
        });

        $('#subas').dataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',exportOptions: {
                },orientation: 'portrait', pageSize: 'A4',text:'Gerar PDF', title:'ASSUNTOS E SUB-ASSUNTOS',
                    customize: function ( doc ) {
                        //centralizar table
                        doc.defaultStyle.alignment = 'center';
                        doc.styles.tableHeader.alignment = 'center';    ''
                        doc.content[1].table.widths = '*';

                        var cols = [];
                        cols[1] = {text: 'Gerado em ' + data +' às '+ time, alignment: 'right', margin:[0,0,20] };
                        doc.defaultStyle.fontSize = 12;
                        doc.styles.tableHeader.fontSize = 14;
                        doc.styles.title.fontsize = 20;
                        var objFooter = {};
                        objFooter['columns'] = cols;
                        doc['footer']= objFooter;
                        //doc.content.splice( 1, 0, {
                        //margin: [ 0, 0, 0, 12 ],
                        //alignment: 'center'
                        //image: dataUri
                        // } );

                    }

                }
            ]
        });

        $('#tm').dataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',exportOptions: {
                },orientation: 'portrait', pageSize: 'A4',text:'Gerar PDF', title:'TEMAS',
                    customize: function ( doc ) {
                        //centralizar table
                        doc.defaultStyle.alignment = 'center';
                        doc.styles.tableHeader.alignment = 'center';    ''
                        doc.content[1].table.widths = '*';

                        var cols = [];
                        cols[1] = {text: 'Gerado em ' + data +' às '+ time, alignment: 'right', margin:[0,0,20] };
                        doc.defaultStyle.fontSize = 12;
                        doc.styles.tableHeader.fontSize = 14;
                        doc.styles.title.fontsize = 20;
                        var objFooter = {};
                        objFooter['columns'] = cols;
                        doc['footer']= objFooter;
                        //doc.content.splice( 1, 0, {
                        //margin: [ 0, 0, 0, 12 ],
                        //alignment: 'center'
                        //image: dataUri
                        // } );

                    }

                }
            ]
        });

    });
</script>
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
              //window.location.href = 'http://localhost/visbrasil/index.php/resultado';

                console.log(response);
                error: function(){
                    alert('Error while request..');
                }
            });
          //  window.location.href = 'http://localhost/visbrasil/index.php/resultado';

        //return false;

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
