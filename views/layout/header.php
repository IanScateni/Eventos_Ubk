<?php 
ob_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css"/>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?=PATH?>public/css/style.css">
	<link rel="icon" href="<?= PATH ?>public/img/Ubk-Logo.png" type="image/png">
	<title>Eventos Ubk</title>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="<?=PATH?>">
		      <img src="<?= PATH ?>public/img/Ubk-Logo.png" alt="" width="100" height="24" class="d-inline-block align-text-top">
		    </a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarNav">
		      <ul class="navbar-nav">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="<?=PATH?>">Inicio</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="<?=PATH?>nosotros/index">Nosotros</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="<?=PATH?>eventos/index">Eventos y recepciones</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="<?=PATH?>servicios/index">Servicios</a>
		        </li>
		        <?php if(isset($_SESSION['identity'])): ?>
		        	<li class="nav-item">
		        	<?php if($_SESSION['identity']->idrol == '1'): ?>
		        		<a class="nav-link" href="<?=PATH?>administrator/panel">Gestión</a>
		        	<?php endif; ?>
		        	<?php if($_SESSION['identity']->idrol == '3'): ?>
		        		<a class="nav-link" href="<?=PATH?>supplir/panel">Gestión proveedor</a>
		        	<?php endif; ?>
		        	<?php if($_SESSION['identity']->idrol == '2'): ?>
		        		<a class="nav-link" href="<?=PATH?>usuario/panel">Mis reservas</a>
		        	<?php endif; ?>
		        	</li>
		        <?php endif; ?>	
		        <li class="nav-item">
		          <?php if(!isset($_SESSION['identity'])): ?>
		          	<a class="nav-link" href="<?=PATH?>usuario/login">Ingresar</a>
		          <?php else:?>	
		          	<a class="nav-link" href="<?=PATH?>usuario/logout">Cerrar Sesión</a>
		          <?php endif; ?>
		        </li>
		        <!--<li class="nav-item">
		          <a class="nav-link" href="<?=PATH?>usuario/contacto">Contácto</a>
		        </li>-->
		      </ul>
		    </div>
		  </div>
		</nav>
	</div>
