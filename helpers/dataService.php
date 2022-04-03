<?php 
require 'crud.php';
$obj = new crud();
$serviceModal = $obj->getDetailService($_POST['id']);
$data ="";
$description = $serviceModal['description'];
$id = $serviceModal['id'];
$title = $serviceModal['title'];
$idEvent = $serviceModal['idEvent'];
$cover = $serviceModal['cover'];
$standar = $serviceModal['standar'];
$medium = $serviceModal['medium'];
$gold = $serviceModal['gold'];
$unitStandar = $serviceModal['unitStandar'];
$unitMedium = $serviceModal['unitMedium'];
$unitGold = $serviceModal['unitGold'];
$date = date('Y-m-d'); 
$minDate = date('Y-m-d',strtotime($date .'+ 1 days'));
$formatStandar = "$ " . number_format($standar, 0, '.','.');
$formatMedium = "$ " . number_format($medium, 0, '.','.');
$formatGold = "$ " . number_format($gold, 0, '.','.');
$data .= "<div class='row row-cols-1 row-cols-md-2 g-4'><div class='col col-md-8'><p><strong>Descrípción del servicio:<br></strong> $description </p><hr>";
if ($standar > 0 && $medium > 0 && $gold > 0) {
	if ($title == 'Sonido') {
	$data .= "<strong> Precios paquete: </strong><br><br><p> <small style='font-weight: 900;'>Paquete 1 de 10 a 100 Invitados:</small> $formatStandar</p><p> <small style='font-weight: 900;'>Paquete 2 de 101 a 300 Invitados:</small> $formatMedium</p><p> <small style='font-weight: 900;'>Paquete 3 de 500 Invitados:</small> $formatGold</p>";
	} else {
	$data .= "<strong> Precios paquete: </strong><br><br><p> <small style='font-weight: 900;'>Paquete 1:</small> $formatStandar </p><p> <small style='font-weight: 900;'>Paquete 2:</small> $formatMedium </p><p> <small style='font-weight: 900;'>Paquete 3:</small> $formatGold</p>";
	}
}else if ($standar > 0 && $medium > 0){
	$data .= "<p> <small style='font-weight: 900;'>Sillas:</small> $formatStandar c/u</p><p> <small style='font-weight: 900;'>Mesas:</small> $formatStandar c/u</p>";
} else if ($standar > 0) {
	if ($title == 'Menú' or $title == 'Ponque') {
		$data .= "<strong> Precios: </strong> $formatStandar Por invitado</p>";
	} else {
		$data .= "<strong> Precios: </strong> $formatStandar c/u</p>";
	}
}
echo $data .= "</div><div class='col col-md-4'>
<form action='' id='serviceRe'>
<div class='mb-3'>
<input type='text' hidden='' id='idEvent' name='idEvent' value='$id'>
<input type='text' hidden='' id='NameEvent' name='NameEvent' value='$title'>
</div>
<div class='mb-3'>
<label class='form-label'>Nombre</label>
<input type='text' class='form-control' id='nombre' name='nombre' required='' minlength='3'>
</div>
<div class='mb-3'>
<label class='form-label'>Apellido</label>
<input type='text' class='form-control' id='apellido' name='apellido' required='' minlength='3'>
</div>
<div class='mb-3'>
<label class='form-label'>Email</label>
<input type='email' class='form-control' id='email' name='email' aria-describedby='emailHelp'  pattern='[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}' required=''>
</div><div class='mb-3'>
<label class='form-label'>Telefono</label>
<input type='tel' class='form-control' id='telefono' pattern='{2,15}' name='telefono' onkeypress='return isNumberKey(event)' required='' maxlength='10'>
</div><div class='mb-3'>
<label class='form-label'>Fecha</label>
<input type='date' id='fecha' name='fecha' class='form-control' min='$minDate' value='$minDate' max='2060-12-31' required=''>
</div><div class='mb-3'>
<label class='form-label'>Paquete</label>
<select id='precio' class='form-select' aria-label='Default select example' name='precio'>
  <option value='$standar'>Paquete 1</option>
  <option value='$medium'>Paquete 2</option>
  <option value='$gold'>Paquete 3</option>
</select>";
?>