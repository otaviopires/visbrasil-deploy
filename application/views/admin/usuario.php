<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Começa o Main -->
<main class="mdl-layout__content">
	<div class="page-content">
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
				<div class="mdl-card mdl-cell mdl-cell--12-col mdl-cell--12-col-phone container mdl-shadow--4dp">
					<div class="mdl-card__title">
						<div><h2 class="mdl-card__title-text">Usuários</h2></div>
						<div class="btn-dropdown">
							<button id="demo-menu-lower-left" class="mdl-button mdl-js-button mdl-button--icon">
								<i class="material-icons arrow">arrow_drop_down</i>
							</button>
							<ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect menu-background"	for="demo-menu-lower-left">
								<a href="<?= base_url()?>Usuario/cadastro">
									<li class="mdl-menu__item">Adicionar Usuário</li>
								</a>
							</ul>
						</div>
					</div>
					<table id="usuario" class="mdl-data-table mdl-js-data-table ">
						<thead>
							<tr>
								<th class="mdl-data-table__cell--non-numeric">#</th>
								<th class="mdl-data-table__cell--non-numeric">Nome</th>
								<th class="mdl-data-table__cell--non-numeric">Email</th>
								<th class="mdl-data-table__cell--non-numeric">Usuário</th>
								<th class="mdl-data-table__cell--non-numeric">Criado em</th>
								<th class="mdl-data-table__cell--non-numeric">Modificado em</th>
								<th class="mdl-data-table__cell--non-numeric">Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($usuarios as $usuario) {?>
							<tr>
								<td class="mdl-data-table__cell--non-numeric"><?= $usuario->id?></td>
								<td class="mdl-data-table__cell--non-numeric"><?= $usuario->nome?></td>
								<td class="mdl-data-table__cell--non-numeric"><?= $usuario->email?></td>
								<td class="mdl-data-table__cell--non-numeric"><?= $usuario->user?></td>
								<td class="mdl-data-table__cell--non-numeric"><?= date("H:i:s d/m/Y", strtotime($usuario->created))?></td>
								<td class="mdl-data-table__cell--non-numeric"><?= date("H:i:s d/m/Y", strtotime($usuario->changed))?></td>

								<td class="mdl-data-table__cell--non-numeric">
									<a href="<?= base_url('Usuario/ver/'.$usuario->id)?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn-view" >
										Ver
									</a>
									<a href="<?= base_url('Usuario/atualizar/'.$usuario->id)?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn-edit">
										Editar
									</a>
									<a href="<?= base_url('Usuario/apagar/'.$usuario->id)?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn-delete" onclick="return confirm('Deseja excluir o usuário?')">
										Apagar
									</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<a class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect view-source btn-edit" href="<?= base_url()?>Usuario/cadastro">
		<i class="material-icons">add</i>
	</a>
</main> <!-- Fim do Main -->
</div> <!-- Fim da div que fica no header -->

<!-- JS-->
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.material.min.js"></script>
</script>
<script>	
	$(document).ready(function(){
		$('#usuario').DataTable({
			columnDefs: [
			{
				targets: [ 0, 1, 2 ],
				className: 'mdl-data-table__cell--non-numeric'
			}
			]

		});
	});
</script>

</body>
</html>