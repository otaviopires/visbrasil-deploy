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
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.material.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
	<!-- Favicon-->
	<link rel="icon" href="<?= base_url(); ?>assets/imagens/favicon.ico" />
</head>
<body>
	<div id="public-header" class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
		<!-- Começa o Header -->
		<header class="mdl-layout__header">
			<div class="mdl-layout__header-row mdl-shadow--4dp">
				<!-- Titulo -->
				<a style="text-decoration: none !important;" href="<?= base_url()?>Home"><span class="mdl-layout-title">SAÚDE & LEIS BRASIL</span></a>
				
				<div class="mdl-layout-spacer"></div>
				<nav class="mdl-navigation mdl-layout--large-screen-only">
                    <a style="text-decoration: none !important;" class="mdl-navigation__link" href="<?= base_url()?>Home">Início</a>
                    <a style="text-decoration: none !important;" class="mdl-navigation__link" href="<?= base_url()?>Sobre">Sobre nós</a>
					<a style="text-decoration: none !important;" class="mdl-navigation__link" href="<?= base_url()?>Dashboard/login">Sistema Interno</a>
				</nav>
			</div>
		</header>
		<!-- Termina o header -->