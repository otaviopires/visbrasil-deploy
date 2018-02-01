<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VISBRASIL</title>
	<!-- CSS-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.material.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
	<!-- Favicon-->
	<link rel="icon" href="<?= base_url(); ?>assets/imagens/favicon.ico" />
</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
		<!-- Começa o Header -->
		<header class="mdl-layout__header">
			<div class="mdl-layout__header-row mdl-shadow--4dp">
				<!-- Titulo -->
				<a href="<?= base_url(); ?>Dashboard"><span class="mdl-layout-title">VISBRASIL</span></a>
				<div class="mdl-layout-spacer"></div>
				<nav class="mdl-navigation mdl-layout--large-screen-only">


					<a class="mdl-navigation__link" href="<?= base_url()?>Dashboard/logout">Sair</a>

				</nav>
			</div>
		</header>
		<!-- Termina o header -->
		<!-- Começa a sidebar -->
		<div class="mdl-layout__drawer">
			<span class="mdl-layout-title">Administrador</span>
			<nav class="mdl-navigation">
				<a class="mdl-navigation__link" href="<?= base_url()?>Usuario">Usuário</a>
				<a class="mdl-navigation__link" href="<?= base_url()?>Legislacao">Legislação</a>
				<a class="mdl-navigation__link" href="<?= base_url()?>Indexacao">Indexação</a>
				<a class="mdl-navigation__link" href="<?= base_url()?>TipoNorma">Tipos de Normas</a>
				<a class="mdl-navigation__link" href="<?= base_url()?>OrgaoEmissor">Orgão Emissor</a>
				<a class="mdl-navigation__link" href="<?= base_url()?>AreaAtuacao">Área de Atuação</a>
				<a class="mdl-navigation__link" href="<?= base_url()?>Assunto">Assunto</a>
				<a class="mdl-navigation__link" href="<?= base_url()?>Tema">Temas</a>
				<a class="mdl-navigation__link" href="<?= base_url()?>Dashboard/logout">Sair</a>
			</nav>
		</div>
