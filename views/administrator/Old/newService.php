<?php 
require_once 'models/eventos.php';
$sEvent = new Eventos();
$sEvents = $sEvent->getAll();
?>
<div class="container-sm" style="background-color: #FFF; padding: 1.25rem; border: 1px solid rgba(0,0,0,.125);border-radius: .25rem;">
	<form action="" id="newService">
		<h5>Crear nuevo servicio</h5>
		<hr>	
		<div class="mb-3">
			<label for="example" class="form-label">Titulo</label>
			<input type="text" class="form-control" id="titleService" name="titleService" required>
		</div>
		<div class="mb-3">
			<label for="example" class="form-label">Descripción</label>
			<textarea class="form-control" id="descriptionService" name="descriptionService" rows="2" required></textarea>
		</div>
		<div class="mb-3">
			<label for="formFile" class="form-label">Cover Servicio</label>
			<input class="form-control" type="file" id="coverService" name="coverService" accept="image/*" required>
		</div>
		<label for="formFile" class="form-label"><h6>Seleccione los eventos asociados para este servicio:</h6></label>
		<?php while ($event = $sEvents->fetch_object()):?>
		<div class="form-check form-switch">
			<input class="form-check-input" type="checkbox" name="<?= $event->name ?>" value="<?= $event->id ?>">
			<label class="form-check-label" for="flexSwitchCheckDefault"><?= $event->name ?></label>
		</div>
		<?php endwhile; ?><br>
		<div class="d-grid gap-2">
			<button id="addNewService" type="button" class="btn btn-danger btn-sm">Crear servicio</button>
		</div>
	</form>
</div>
<div class="modal fade" id="successfulNewService">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h4>Servicio creado exitosamente</h4>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#addNewService').click(function(){
			var title = $('#titleService').val();
			var description = $('#descriptionService').val();
			var cover = $('#coverService').val();
			if (title == "" && description == "" && cover == "") {
				alertify.error("Debe agregar todos los datos solicitados para el nuevo servicio");
			} else {
				if (title == "") {
					alertify.error("Debe agregar el titulo del servicio");
				} else {
					if (description =="") {
						alertify.error("Debe agregar la descripción del servicio");
					} else {
						if (cover== "") {
							alertify.error("Debe agregar la imagen para el servicio");
						} else {
							var Data = new FormData(document.getElementById('newService'));
							$.ajax({
								type:"POST",
								datatype: "html",
								data: Data,
								cahe:false,
								contentType:false,
								processData:false,
								url:"/helpers/newService.php",
								success:function(r){
									if (r==1) {
										$('#serviceTable').load('/views/administrator/serviceAllTable.php');
										$("#newService")[0].reset();
											$("#successfulNewService").modal("show");
											setTimeout(function(){ $('#successfulNewService').modal('hide');},2000);
									} else {
										if (r == 2) {
											alertify.error("Error, El servicio ya existe");
										} else {
											if (r == 3) {
											alertify.error("Debe seleccionar al menos un evento");
											} else {
												alertify.error("Error, No se agrego el servicio");
											}
										}
									}
								}	
							});
						}
					}
				}
			}
		});	
	});
</script>