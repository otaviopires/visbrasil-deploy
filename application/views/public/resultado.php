<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Começa o Main -->
<main class="mdl-grid">
    <div class="mdl-cell mdl-cell--6-col">
        <div class="results-section">
          <div>
    <?php
        // List up all results.
        foreach ($results as $val)
        {
            echo $val;
        }
    ?>
</div>

</div>
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
