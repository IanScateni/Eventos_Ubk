<section class="service section-padding">
	<div class="container">
		<h1 class="text-uppercase text-center"><?= $detailEvent->name?></h1>
		<div class="row">
		    <div class="col">
		    	<img src="<?=PATH?>public/img/<?= $detailEvent->cover?>" class="img-fluid" alt="<?= $detailEvent->name?>">
		    </div>
		</div>
	</div>
</section>
<section class="service section-padding">
	<div class="container">
		<div class="row">
			<div class="col-9">
				<div class="text-justify pt-2">
		    		<p><?= $detailEvent->description?></p>
		    	</div>
		    	<?php if ($servicesEvent->num_rows > 0): ?>
	    		<section class="serviceEvent">
	    			<div class="pt-1">
			    		<h3 class="text-center">Servicios que ofrece</h3>
			    		<hr>
			    		<div class="row row-cols-1 row-cols-md-3 g-4">
			    		<?php foreach ($servicesEvent as $service) {;?>
							<div class="col">
								<div class="card h-100">
									<?php if ($service['title'] == 'Tematicas'): ?>
										<img src="<?=PATH?>public/img/<?= $service['cover']?>" class="card-img-top" alt="<?= $service['title']?>">
									<?php else: ?>
										<img src="<?=PATH?>public/img/<?= $detailEvent->name?>-<?= $service['cover']?>" class="card-img-top" alt="<?= $service['title']?>">
									<?php endif ?>
									<div class="card-body">
										<h5 class="card-title"><?= $service['title']?></h5><hr>
										<?php 
										if ($detailEvent->id == '1') {
											$search = "<h6>Servicio opcionales para 15 años (incluidos)</h6><hr>Para  quince  años  el  plan  incluye  sin  costo  el candelabro, rosas para el vals, puf para cambio de zapatilla (si es necesario).";
												$description = str_replace($search, "", $service['description']);
										} else if ($detailEvent->id == '4') {
											$search = "<h6>Servicio opcionales para bodas (no incluidos)</h6><hr>Servicio de decoración de iglesia, arreglo de carro para  la  novia,  azahares,  bouquet  de  la  novia, desde $250.000, consulte un asesor para mayor información.";
												$description = str_replace($search, "", $service['description']);
										} else {
											$search = array("<h6>Servicio opcionales para 15 años (incluidos)</h6><hr>Para  quince  años  el  plan  incluye  sin  costo  el candelabro, rosas para el vals, puf para cambio de zapatilla (si es necesario).",  "<h6>Servicio opcionales para bodas (no incluidos)</h6><hr>Servicio de decoración de iglesia, arreglo de carro para  la  novia,  azahares,  bouquet  de  la  novia, desde $250.000, consulte un asesor para mayor información.");
												$description = str_replace($search, "", $service['description']);
										}?>
										<p class="card-text"><?= $description?></p><hr>
										<form method="POST" action="cotiza" accept-charset="utf-8">
										<?php if ($service['standar'] > 0 && $service['medium'] > 0 && $service['gold'] > 0) {?>
											<strong> Precios: </strong><br><br>
											<p> <small style="font-weight: 900;">De 10 a 100 Invitados:</small> $<?= number_format($service['standar'], 0, '.','.'); ?></p>
											<p> <small style="font-weight: 900;">De 101 a 300 Invitados:</small> $<?= number_format($service['medium'], 0, '.','.'); ?></p>
											<p> <small style="font-weight: 900;">De 301 a 500 Invitados:</small> $<?= number_format($service['gold'], 0, '.','.'); ?></p>
                    <?php }	else if ($service['standar'] > 0 && $service['medium'] > 0){?>
                    	<strong> Precios: </strong><br><br>
                    	<p> <small style="font-weight: 900;">Sillas:</small> $<?= number_format($service['standar'], 0, '.','.'); ?> c/u</p>
											<p> <small style="font-weight: 900;">Mesas:</small> $<?= number_format($service['medium'], 0, '.','.'); ?> c/u</p>
                    <?php } else if ($service['standar'] > 0) { 
	                    	if ($service['title'] == "Menú" or $service['title'] == "Ponque") {?>
	                    		<strong> Precios: </strong> $<?= number_format($service['standar'], 0, '.','.'); ?> Por invitado</p>
	                    	<?php } else {?>
	                    		<strong> Precios: </strong> $<?= number_format($service['standar'], 0, '.','.'); ?> c/u</p>
	                    	<?php } 
                    } ?>
                    <?php if ($service['title'] == "Sonido") {?>
                    	<center><div class="alert alert-danger" role="alert">Este servicio se incluye en todos nuestros eventos.</div></center>
                  	  <div class="d-grid gap-2"><input type="checkbox" hidden="" class="btn-check" name="<?php echo $service['title']?>" id="<?php echo $service['title']?>" autocomplete="off" checked>
                   <?php } else {?>
                    	<div class="d-grid gap-2"><input type="checkbox" class="btn-check" name="<?php echo $service['title']?>" id="<?php echo $service['title']?>" autocomplete="off">
											<label class="btn btn-outline-danger btn-sm" for="<?php echo $service['title']?>">Contratar</label></div>
                   <?php } ?>
									</div>
								</div>
							</div>
			    		<?php } ?>
			    		</div>
		    		</div>
	    		</section>
		    	<?php endif ?>
	    		<?php if ($eventGalery->num_rows > 0): ?>
	    		<section id="galery">
	    			 <div class="text-center pt-5">
	    			 	<h3>Galería</h3>
	    				<hr>
	    			 </div>
	    			 <div class="row">
	    			 	<?php foreach ($eventGalery as $galery) {?>
	    			 	<div class="col-lg-4 col-md-6 col-sm-12">
	    			 		<img src="<?=PATH?>public/img/<?= $galery['src']?>" alt="<?= $detailEvent->name?>">
	    			 	</div>
	    			 	<?php } ?>
	    			 </div>
	    		</section>
	    		<?php endif ?>
	    		<section id="video">
	    			<div class="text-center pt-5">
			    		<h3 >Video</h3>
			    		<hr>
		    		</div>
		    		<div class="event-video">
		    			<iframe src="https://www.youtube.com/embed/<?= $detailEvent->video?>" title="<?= $detailEvent->name?>" frameborder="0" allowfullscreen></iframe>
		    		</div>
	    		</section>
	    	</div>
	    	<div class="col-3 bg-gray">
	    		<div class="alert alert-secondary alertEvent" role="alert">
				  <h5>Características del servicio</h5><hr>
				  <p>Cuenta con transporte de suministros y personal logístico en Bogotá - hasta la Cll 180. Otros destinos en Bogotá y Cundinamarca generan costo adicional.</p>
				  <p><strong>Duración del evento:</strong>s de 3 a 7 horas, fuera de tiempos de montaje y desmontaje.</p>
				  <p><strong>Tiempo mínimo de montaje:</strong> 2 a 3 horas. Tiempo mínimo de desmontaje: 1 hora</p>
				  <p><strong>Pre-producción del evento:</strong> agende cita con un asesor para despejar dudas y hacer la reserva de su evento (cita previa). De 30 a 15 días antes del evento programe cita para ultimar detalles  del protocolo, decoración, mantelería y todo lo que compete al desarrollo de la propuesta.</p>
				  <p><strong>IMPORTANTE: todo debe quedar por escrito para poder garantizar la calidad del servicio.</strong></p>
				  <p>La degustación puede programarse después de reservar el evento y firmar contrato, es sujeto a disponibilidad de tiempo entre el cliente y el chef de Eventos y Recepciones.</p>
				  <p>Agradecemos ante cualquier duda, sugerencia y observación hacerlo a través del asesor asignado para su evento.</p>
				  <small> ** Las fotos mostradas corresponden al servicio ofrecido y/o algunos adicionales adquiridos por el cliente. Puede modificar su evento según el portafolio de la empresa, consulte un asesor.</small>
				</div>
	    		<h5 class="text-center">Solicitar Presupuesto</h5><hr>
	    			<div class="mb-3">
	    				<input type="text" hidden="" id="siteEventTitle" name="siteEventTitle" value="0">
	    				<input type="text" hidden="" id="idEvent" name="idEvent" value="<?= $detailEvent->id?>">
	    				<input type="text" hidden="" id="NameEvent" name="NameEvent" value="<?= $detailEvent->name?>">
	    			</div>
    			 	<div class="mb-3">
			    		<label class="form-label">Nombre</label>
			   			<input type="text" class="form-control" id="nombre" name="nombre" required="" minlength="3">
			   		</div>
			   		<div class="mb-3">
			   			<label class="form-label">Apellido</label>
			   			<input type="text" class="form-control" id="apellido" name="apellido" required="" minlength="3">
				  	</div>
					<div class="mb-3">
					    <label class="form-label">Email</label>
					    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required="">
					</div>
					<div class="mb-3">
					    <label class="form-label">Telefono</label>
					    <input type="tel" class="form-control" id="telefono" pattern="{2,15}" name="telefono" onkeypress="return isNumberKey(event)" required="" minlength="5" maxlength="10">
					</div>
					<div class="mb-3">
					    <label class="form-label">Fecha</label>
					    <?php  $date = date('Y-m-d'); $minDate = date("Y-m-d",strtotime($date ."+ 15 days"));?>
					    <input type="date" id="fecha" name="fecha" class="form-control" min="<?= $minDate; ?>" value="<?= $minDate; ?>" max="2060-12-31" required="">
					</div>
					<div class="mb-3">
					    <label class="form-label">Hora</label>
					    <?php  date_default_timezone_set('America/Bogota'); $time = date('H:i');?>
					    <input type="time" id="time" name="time" class="form-control" min="10:00" max="22:00" value="<?= $time; ?>" required="">
					</div>
					<div class="mb-3">
						<label class="form-label">Nº de invitados</label>
						<select id="personas" class="form-select" aria-label="Default select example" name="personas">
						  <?php $nPeople = 0;
						  	while ($nPeople < 500) {
						  		$sum = 0;
						  		if ($nPeople < 100) {
						  			$sum = 10;
						  		} else {
						  			$sum = 20;
						  		}
						  		$nPeople = $nPeople + $sum;?>
						  <option value="<?= $nPeople?>"><?= $nPeople?></option>
						  <?php }  ?>
						</select>
					</div>
					<div class="mb-3">
						<div class="form-check form-switch">
							<input class="form-check-input" type="checkbox" role="switch" id="lugar" name="lugar" onclick="lugarCheckbox(this)" autocomplete="off">
							<label class="form-check-label" for="lugar">¿Necesita lugar para su evento?</label>
						</div>
					</div>
					<div id="sites"></div>
					<div class="d-grid gap-2">
				  		<button type="submit" class="btn btn-danger btn-sm">Enviar solicitud</button>
				  	</div>
				</form>
	    	</div>
		</div>
	</div>
</section>
<script type="text/javascript">
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
function lugarCheckbox(checkbox){
	if(checkbox.checked){
  	recargaLista();
  	$("#personas").change(function(){
		  recargaLista();
		});    	
  } else{
  	$("#siteEvent").css("display", "none");
  	$("#siteEventTitle").val('0');
  }
}
function recargaLista(){
	var people = $('#personas').val();
	var id = $('#idEvent').val();
	$.ajax({
		type:"POST",
		url:"/views/eventos/site.php",
		data: {people: people, id: id},
		success:function(r){
			$('#sites').html(r);

		}
	});
}	
</script>
