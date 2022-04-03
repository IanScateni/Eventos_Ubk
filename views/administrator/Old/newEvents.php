<?php 
require_once 'models/eventos.php';
$tEvent = new Eventos();
$tEvents = $tEvent->getAll();
?>
<div class="container-sm" style="background-color: #FFF; padding: 1.25rem; border: 1px solid rgba(0,0,0,.125);border-radius: .25rem;">
	<form action="" id="newtypeEvent">
		<h5>Crear nuevo evento</h5>
		<hr>
		<div class="mb-3">
			<label for="example" class="form-label">Titulo</label>
			<input type="text" class="form-control" id="titleTypeEvent" name="titleTypeEvent" required>
		</div>
		<div class="mb-3">
			<label for="example" class="form-label">Descripción Corta</label>
			<textarea class="form-control" id="descriptionShortTypeEvent" name="descriptionShortTypeEvent" rows="2" required></textarea>
		</div>
		<div class="mb-3">
			<label for="example" class="form-label">Descripción</label>
			<textarea class="form-control" id="descriptionTypeEvent" name="descriptionTypeEvent" rows="3" required></textarea>
		</div>
		<div class="row gx-3 gy-2 align-items-center">
			<div class="col-sm-3">
				<label for="formFile" class="form-label">Enlace video</label>
				<input type="text" class="form-control" id="videoTypeEvent" name="videoTypeEvent" required>
			</div>
			<div class="col-sm-6">
				<label for="formFile" class="form-label">Cover Evento</label>
				<input class="form-control" type="file" id="coverTypeEvent" name="coverTypeEvent" accept="image/*" required>
			</div>
			<div class="col-sm-3">
				<label for="example" class="form-label">Categoría</label>
				<select id="categoryTypeEvent" name="categoryTypeEvent" class="form-select">
				<?php while ($tEvent = $tEvents->fetch_object()):?>
				<option value="<?= $tEvent->id ?>"><?= $tEvent->name ?></option>
				<?php endwhile; ?>
				</select>
			</div>
		</div><br>
		<div class="d-grid gap-2">
			<button id="addTypeEvent" type="button" class="btn btn-danger btn-sm btn-block">Crear Evento</button>
		</div>
	</form>
</div>
<div class="modal fade" id="successfulEventNew">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h4>Evento creado exitosamente</h4>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#addTypeEvent').click(function(){
			var title = $('#titleTypeEvent').val();
			var short = $('#descriptionShortTypeEvent').val();
			var descriptionEvent = $('#descriptionTypeEvent').val();
			var video = $('#videoTypeEvent').val();
			var cover = $('#coverTypeEvent').val();
			if (title == "" && short == "" && descriptionEvent=="" && video=="" && cover=="") {
				alertify.error("Debe agregar todos los datos solicitados para el nuevo evento");
			} else {
				if (title == "") {
					alertify.error("Debe agregar el titulo de la categoría");
				} else {
					if (short =="") {
						alertify.error("Debe agregar la descripción corta");
					} else {
						if (descriptionEvent == "") {
						alertify.error("Debe agregar la descripción");
						} else {
							if (video =="") {
								alertify.error("Debe agregar el link del video de youtube");
							} else {
								if (cover == "") {
									alertify.error("Debe agregar la imagen del evento");
								} else {
									var Data = new FormData(document.getElementById('newtypeEvent'));
									$.ajax({
										type:"POST",
										datatype: "html",
										data: Data,
										cahe:false,
										contentType:false,
										processData:false,
										url:"/helpers/newTypeEvent.php",
										success:function(r){
											if (r==1) {
												$('#eventTable').load('/views/administrator/eventsAllTable.php');
												$("#newtypeEvent")[0].reset();
												$("#successfulEventNew").modal("show");
												setTimeout(function(){ $('#successfulEventNew').modal('hide');},2000);
											} else {
												if (r == 2) {
													alertify.error("Error, la evento ya existe");
												} else {
													alertify.error("No se agrego el evento");
												}
											}
										}
									});
								}
							}
						}
					}
				}
			}
		});
	});
</script>