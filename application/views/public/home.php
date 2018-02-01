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
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn-edit">
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