<?php 
require_once 'config/db.php';
require_once 'models/eventos.php';
$oEvent = new Eventos();
$events = $oEvent->getAll();
?>
<div class="container" style="background-color: #FFF; padding: 1.25rem; border: 1px solid rgba(0,0,0,.125);border-radius: .25rem;">
	<form action="" id="newService">
		<h5>Crear nuevo servicio</h5>	
		<hr>
		<div class="mb-3">
			<label for="exampleInputEmail1" class="form-label">Titulo</label>
			<input type="text" class="form-control" id="titleService" name="titleService" required>
		</div>
		<div class="mb-3">
			<label for="exampleInputEmail1" class="form-label">Descripción</label>
			<textarea class="form-control" id="descriptionService" name="descriptionService" rows="3" required></textarea>
		</div>
		<div class="mb-3">
			<div class="col">
			    <label for="formFile" class="form-label">Cover Servicio</label>
			  	<input class="form-control" type="file" id="cover" name="cover" accept="image/*" required>
			</div>
		</div>
		<div class="mb-3">
			<div class="col">
				<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="" id="evento">
				  <label class="form-check-label" for="evento">
				    Servicio para evento y recepción
				  </label>
				</div>
			</div>
			<div class="row g-3">
				<div id="eventNewService" class="eventosNewService col"><br>
					<label class="form-check-label" for="evento">
				    Seleccione los eventos que ofrecen este servicio
				  	</label><br><br>
					<?php 
					while ($event = $events->fetch_object()) {?>
						<div class="form-check form-switch">
						  <input class="form-check-input" type="checkbox" role="switch" id="<?= $event->id; ?>" name="eventos[]" value="<?= $event->id; ?>">
						  <label class="form-check-label" for="flexSwitchCheckDefault"><?= $event->name; ?></label>
						</div>
					<?php } ?>
				</div>
				<div class="col">
					<label for="formFile" class="form-label">Precio</label>	
					<select class="form-select" id="unit" name="unit" required onchange="unitC();">
				      <option selected disabled value="">Seleccione...</option>
				      <option value="1">Por invitado</option>
				      <option value="2">Por cantidad de personas</option>
				      <option value="3">c/u</option>
				    </select>
				    <br>
				    <span id="unittype"></span>
				</div>
			</div>
		</div>
		<div class="d-grid gap-2">
			<button id="addService" type="button" class="btn btn-danger btn-sm btn-block">Crear Servicio</button>
		</div>
	</form>
</div>
<div class="modal fade" id="successfullServiceNew">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h4>Servicio creado exitosamente</h4>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	$("#evento").on('change', function(){
		if( $(this).is(':checked') ) {
	        document.getElementById('eventNewService').style.display = 'block';
	    } else {
	        document.getElementById('eventNewService').style.display = 'none';       	
	    }
	});
	function unitC(){
		let unit = document.getElementById('unit');
		let unittype = unit.value;
		if (unittype == '1'){
			document.getElementById('unittype').innerHTML = '<label for="exampleInputEmail1" class="form-label">Valor por invitado</label><input type="text" class="form-control" id="unit1" name="unit1" onkeypress="return isNumberKey(event)" required><input type="text" hidden="" class="form-control" id="unitStandar" name="unitStandar" value="Por invitado">';	
		} else if (unittype == '2'){
			document.getElementById('unittype').innerHTML = '<label for="exampleInputEmail1" class="form-label">Valor Paquete 1</label><input type="text" class="form-control validanumericos" id="unit1" name="unit1"  onkeypress="return isNumberKey(event)" required><label for="exampleInputEmail1" class="form-label">Valor Paquete 2</label><input  type="text" class="form-control validanumericos" id="unit2" name="unit2"  onkeypress="return isNumberKey(event)" required><label for="exampleInputEmail1" class="form-label">Valor Paquete 3</label><input type="text" class="form-control validanumericos" id="unit3" name="unit3" onkeypress="return isNumberKey(event)"  required><input type="text" hidden="" class="form-control" id="unitStandar" name="unitStandar" value="Personas">';
		} else if (unittype == '3'){
			document.getElementById('unittype').innerHTML = '<label for="exampleInputEmail1" class="form-label">Valor por unidad</label><input type="text" class="form-control validanumericos" id="unit1" name="unit1" onkeypress="return isNumberKey(event)" required><input type="text" hidden="" class="form-control" id="unitStandar" name="unitStandar" value="c/u">';	
		}
		
	}
	function isNumberKey(evt){
	    var charCode = (evt.which) ? evt.which : evt.keyCode
	    if (charCode > 31 && (charCode < 48 || charCode > 57))
	        return false;
	    return true;
	}
	$(document).ready(function(){
		$('#addService').click(function(){
			var title = $('#titleService').val();
			var description = $('#descriptionService').val();
			var cover = $('#cover').val();
			var unit = $('#unit').val();
			var unit1 = $('#unit1').val();
			var unit2 = $('#unit2').val();
			var unit3 = $('#unit3').val();
			if (title == "" || description == "" || unit == "") {
				alertify.error("Por favor complete todos los campos");
			} else if (unit == "1" && unit1 == "") {
				alertify.error("Ingrese el valor por invitado");
			} else if (unit == "3" && (unit1 == "" || unit2 == "")) {
				alertify.error("Ingrese el valor");
			} else if (unit == "2" && (unit1 == "" || unit2 == "" || unit3 == "")) {
				alertify.error("Ingrese los valores de los paquetes");
			} else {
				var data = new FormData(document.getElementById('newService'));
				$.ajax({
					type:"POST",
				    datatype: "html",
				    data:data,
				    cahe:false,
				    contentType:false,
				    processData:false,
				    url:"/helpers/newService.php",
				 	success:function(r){
				    	if (r==1) {
				    		$('#servicesTable').load('/views/administrator/servicesAllTable.php');
				    		$("#newService")[0].reset();
				    		$("#successfullServiceNew").modal("show");
                     		setTimeout(function(){ $('#successfullServiceNew').modal('hide');},2000);
				    	} else {
				    		if (r == 2){
			    			alertify.error("Error, la servicio ya existe");	
				    		} else {
				    			alertify.error("Error, no se pudo crear el servicio");
				    		}
				    	}
				    }    
				});
			}
		});
	});
</script>



