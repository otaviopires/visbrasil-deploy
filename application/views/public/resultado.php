<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Começa o Main -->
<main class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col">
        <div class="results-section">
            <h4>FILTRO POR TABELA - <?php echo $niceTable; ?></h4>
            <div>
                <?php if($table == 'tb_tipo_norma'): ?>
                    <?php
                    if($results != false):
                        foreach ($results as $result):

                            echo
                                '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                       <div class="panel panel-default">
                         <div class="panel-heading" role="tab" id="headingOne">
                           <h4 class="panel-title">
                             <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$result->NU_NORMA.'" aria-expanded="true" aria-controls="collapse'.$result->NU_NORMA.'">
                                 '.$result->DS_TIPO_NORMA .' - NU_NORMA ('.$result->NU_NORMA.')
                             </a>
                             	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;<a href="#" onclick="print('.$result->NU_NORMA.')"><span class="glyphicon glyphicon-print"></span></a>
                           </h4>
                         </div>
                          <div id="collapse'.$result->NU_NORMA.'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'.$result->NU_NORMA.'">
                           <div class="panel-body">
                             DT_SANÇÃO - '. date('d/m/Y', strtotime($result->DT_SANCAO)).', DT_PUBLICAÇÃO - '. date('d/m/Y', strtotime($result->DT_PUBLICACAO)).' <br><br>
                              <p><b>EMENTA</b><br>'.$result->DS_EMENTA.'</p>
                              <p><b>CONTEÚDO</b><br>'.$result->DS_CONTEUDO.'</p>
                           </div>
                         </div>
                         </div>
                         </div>
                        
                     '
                            ;
                        endforeach;
                    else:
                        echo "<h5><em>Nenhum resultado</em>.</h5>";
                    endif;
                    ?>
                <?php endif;?>
                <?php if($table == 'tb_legislacao'): ?>
                    <?php
                    if($results != false):
                        foreach ($results as $result):
                            $ds_texto_marcacao = is_null($result->DS_TEXTO_MARCACAO) ? "-" : $result->DS_TEXTO_MARCACAO;
                            $sub = is_null($result->ass2DS_ASSUNTO) ? "-" : $result->ass2DS_ASSUNTO;
                            echo
                                '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
             <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingOne">
                 <h4 class="panel-title">
                   <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$result->CO_SEQ_INDICE.'" aria-expanded="true" aria-controls="collapse'.$result->CO_SEQ_INDICE.'">
                        '.mb_strimwidth($result->DS_EMENTA, 0, 20, "...").' - NU_NORMA ('.$result->NU_NORMA.')
                   </a>
                                               	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;<a href="#" onclick="print('.$result->CO_SEQ_INDICE.')"><span class="glyphicon glyphicon-print"></span></a>
         
                 </h4>
               </div>
                <div id="collapse'.$result->CO_SEQ_INDICE.'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'.$result->CO_SEQ_INDICE.'">
                 <div class="panel-body">
                   DT_SANÇÃO - '. date('d/m/Y', strtotime($result->DT_SANCAO)).', DT_PUBLICAÇÃO - '. date('d/m/Y', strtotime($result->DT_PUBLICACAO)).' <br><br>
                  <p><b>ÁREA DE ATUAÇÃO</b><br>'.$result->areaAtuacaoDS_AREA_ATUACAO.'</p>
                  <p><b>EMENTA</b><br>'.$result->DS_EMENTA.'</p>
                  <p><b>CONTEÚDO</b><br>'.$result->DS_CONTEUDO.'</p>
                  <p><b>ASSUNTO</b><br>'.$result->ass1DS_ASSUNTO.'</p>
                   <p><b>SUBASSUNTO</b><br>'.$sub.'</p>
                  <p><b>TEMA</b><br>'.$result->temaDS_TEMA.'</p>
                  <p><b>DS_TEXTO_MARCACAO</b><br>'. $ds_texto_marcacao .'</p>
              
                 </div>
               </div>
               </div>
               </div>
              
           '
                            ;
                        endforeach;
                    else:
                        echo "<h5><em>Nenhum resultado</em>.</h5>";
                    endif;
                    ?>
                <?php endif;?>
                <?php if($table == 'tb_area_atuacao'): ?>
                    <?php
                    if($results != false):
                        foreach ($results as $result):
                            $ds_texto_marcacao = is_null($result->DS_TEXTO_MARCACAO) ? "-" : $result->DS_TEXTO_MARCACAO;
                            $sub = is_null($result->ass2DS_ASSUNTO) ? "-" : $result->ass2DS_ASSUNTO;
                            echo
                                '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
             <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingOne">
                 <h4 class="panel-title">
                   <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$result->CO_SEQ_INDICE.'" aria-expanded="true" aria-controls="collapse'.$result->CO_SEQ_INDICE.'">
                        '.$result->areaAtuacaoDS_AREA_ATUACAO.'
                   </a>
                                                                           	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;<a href="#" onclick="print('.$result->CO_SEQ_INDICE.')"><span class="glyphicon glyphicon-print"></span></a>
         
                 </h4>
               </div>
                <div id="collapse'.$result->CO_SEQ_INDICE.'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'.$result->CO_SEQ_INDICE.'">
                 <div class="panel-body">
                  <p><b>ÁREA DE ATUAÇÃO</b><br>'.$result->areaAtuacaoDS_AREA_ATUACAO.'</p>
                  <p><b>EMENTA</b><br>'.$result->DS_EMENTA.'</p>
                  <p><b>CONTEÚDO</b><br>'.$result->DS_CONTEUDO.'</p>
                  <p><b>ASSUNTO</b><br>'.$result->ass1DS_ASSUNTO.'</p>
                    <p><b>SUBASSUNTO</b><br>'.$sub.'</p>
                  <p><b>TEMA</b><br>'.$result->temaDS_TEMA.'</p>
                  <p><b>DS_TEXTO_MARCACAO</b><br>'. $ds_texto_marcacao .'</p>
                 </div>
            
               </div>
               </div>
               </div>
              
           '
                            ;
                        endforeach;
                    else:
                        echo "<h5><em>Nenhum resultado</em>.</h5>";
                    endif;
                    ?>
                <?php endif;?>
                <?php if($table == 'tb_assunto' || $table == 'tb_subassunto'): ?>
                    <?php
                    if($results != false):

                        foreach ($results as $result):
                            $ds_texto_marcacao = is_null($result->DS_TEXTO_MARCACAO) ? "-" : $result->DS_TEXTO_MARCACAO;
                            $sub = is_null($result->ass2DS_ASSUNTO) ? "-" : $result->ass2DS_ASSUNTO;
                            echo
                                '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
             <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingOne">
                 <h4 class="panel-title">
                   <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$result->CO_SEQ_INDICE.'" aria-expanded="true" aria-controls="collapse'.$result->CO_SEQ_INDICE.'">
                        '.$result->ass1DS_ASSUNTO .'
                   </a>
                                                                                                       	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;<a href="#" onclick="print('.$result->CO_SEQ_INDICE.')"><span class="glyphicon glyphicon-print"></span></a>
         
                 </h4>
               </div>
                <div id="collapse'.$result->CO_SEQ_INDICE.'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'.$result->CO_SEQ_INDICE.'">
                 <div class="panel-body">
              
                  <p><b>ÁREA DE ATUAÇÃO</b><br>'.$result->areaAtuacaoDS_AREA_ATUACAO.'</p>
                  <p><b>EMENTA</b><br>'.$result->DS_EMENTA.'</p>
                  <p><b>CONTEÚDO</b><br>'.$result->DS_CONTEUDO.'</p>
                  <p><b>ASSUNTO</b><br>'.$result->ass1DS_ASSUNTO.'</p>
                  <p><b>SUBASSUNTO</b><br>'.$sub.'</p>
                  <p><b>TEMA</b><br>'.$result->temaDS_TEMA.'</p>
                  <p><b>DS_TEXTO_MARCACAO</b><br>'. $ds_texto_marcacao .'</p>
                 </div>
               </div>
               </div>
               </div>
              
           '
                            ;
                        endforeach;
                    else:
                        echo "<h5><em>Nenhum resultado</em>.</h5>";
                    endif;
                    ?>
                <?php endif;?>
                <?php if($table == 'tb_tema'): ?>
                    <?php
                    if($results != false):

                        foreach ($results as $result):
                            $ds_texto_marcacao = is_null($result->DS_TEXTO_MARCACAO) ? "-" : $result->DS_TEXTO_MARCACAO;
                            $sub = is_null($result->ass2DS_ASSUNTO) ? "-" : $result->ass2DS_ASSUNTO;
                            echo
                                '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
             <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingOne">
                 <h4 class="panel-title">
                   <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$result->CO_SEQ_INDICE.'" aria-expanded="true" aria-controls="collapse'.$result->CO_SEQ_INDICE.'">
                        '.$result->temaDS_TEMA .'
                   </a>
                                                                                                       	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;<a href="#" onclick="print('.$result->CO_SEQ_INDICE.')"><span class="glyphicon glyphicon-print"></span></a>
         
                 </h4>
               </div>
                <div id="collapse'.$result->CO_SEQ_INDICE.'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'.$result->CO_SEQ_INDICE.'">
                 <div class="panel-body">
                     <p><b>ÁREA DE ATUAÇÃO</b><br>'.$result->areaAtuacaoDS_AREA_ATUACAO.'</p>
                  <p><b>EMENTA</b><br>'.$result->DS_EMENTA.'</p>
                  <p><b>CONTEÚDO</b><br>'.$result->DS_CONTEUDO.'</p>
                  <p><b>ASSUNTO</b><br>'.$result->ass1DS_ASSUNTO.'</p>
                   <p><b>SUBASSUNTO</b><br>'.$sub.'</p>
                  <p><b>TEMA</b><br>'.$result->temaDS_TEMA.'</p>
                  <p><b>DS_TEXTO_MARCACAO</b><br>'. $ds_texto_marcacao .'</p>
                 </div>
                 </div>
               </div>
               </div>
               </div>
           
           '
                            ;
                        endforeach;
                    else:
                        echo "<h5><em>Nenhum resultado</em>.</h5>";
                    endif;
                    ?>
                <?php endif;?>
                <?php if($table == 'tb_indexacao'): ?>
                    <?php
                    if($results != false):
                        foreach ($results as $result):
                            $ds_texto_marcacao = is_null($result->DS_TEXTO_MARCACAO) ? "-" : $result->DS_TEXTO_MARCACAO;
                            $sub = is_null($result->ass2DS_ASSUNTO) ? "-" : $result->ass2DS_ASSUNTO;
                            echo
                                '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
             <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingOne">
                 <h4 class="panel-title">
                   <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$result->CO_SEQ_INDICE.'" aria-expanded="true" aria-controls="collapse'.$result->CO_SEQ_INDICE.'">
                        '.$result->DS_TEXTO_MARCACAO .' - '.mb_strimwidth($result->DS_EMENTA, 0, 40, "...").'
                   </a>
                                                                                                       	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;<a href="#" onclick="print('.$result->CO_SEQ_INDICE.')"><span class="glyphicon glyphicon-print"></span></a>
         
                 </h4>
               </div>
                <div id="collapse'.$result->CO_SEQ_INDICE.'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'.$result->CO_SEQ_INDICE.'">
                 <div class="panel-body">
                  <p><b>ÁREA DE ATUAÇÃO</b><br>'.$result->areaAtuacaoDS_AREA_ATUACAO.'</p>
                  <p><b>EMENTA</b><br>'.$result->DS_EMENTA.'</p>
                  <p><b>CONTEÚDO</b><br>'.$result->DS_CONTEUDO.'</p>
                  <p><b>ASSUNTO</b><br>'.$result->ass1DS_ASSUNTO.'</p>
                   <p><b>SUBASSUNTO</b><br>'.$sub.'</p>
                  <p><b>TEMA</b><br>'.$result->temaDS_TEMA.'</p>
                  <p><b>DS_TEXTO_MARCACAO</b><br>'. $ds_texto_marcacao .'</p>
                 </div>
               </div>
               </div>
               </div>
           
           '
                            ;
                        endforeach;
                    else:
                        echo "<h5><em>Nenhum resultado</em>.</h5>";
                    endif;
                    ?>
                <?php endif;?>
                <p><?php echo $links; ?></p>
            </div>
</main>
<!-- Fim do Main -->
<!-- Fim da div que fica no header -->
<!-- JS-->
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('.collapse').collapse('hide');
    });

    function print($id) {
        var conteudo = document.getElementById('collapse' + $id).innerHTML,
            tela_impressao = window.open('about:blank');
        tela_impressao.document.write(conteudo);
        tela_impressao.window.print();
        tela_impressao.window.close();
        ;
    }

</script>
</body>
</html>
<!--
   <div class="results-section-title">
       <h4>Resultados</h4>
       <span>Aproximadamente 15 resultados</span>
   </div>
   <div class="mdl-cell mdl-cell--12-col container-flex">
       <div class="result">
           <h6>Legislação 48 LEI FEDERAL</h6>
           <p>Medicamentos e Correlatos</p>
       </div>
       <div class="result">
           <h6>5991 17/12/1973</h6>
       </div>
       <div class="result result-imprimir">
           <a class="imprimir">Imprimir relatório</a>
       </div>
   </div>
   <div class="mdl-cell mdl-cell--12-col container-flex">
       <div class="result">
           <h6>Tema</h6>
           <p>Normatização</p>
       </div>
       <div class="result">
           <h6>Assunto</h6>
           <p>Comércio Farmacêutico</p>
       </div>

   </div>
   <div class="mdl-cell mdl-cell--12-col container-flex">
       <div>
           <h6>Texto de marcação</h6>
           <p>Art.3 VI - Corantes</p>
       </div>
   </div>
   </div>
   </div>
   <div class="mdl-cell mdl-cell--6-col">
   <div class="mdl-cell mdl-cell--12-col container-flex">
   <div class="img-section">
   <p>Imagem</p>
   </div>
   -->