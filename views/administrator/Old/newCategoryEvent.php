<div class="container-sm" style="background-color: #FFF; padding: 1.25rem; border: 1px solid rgba(0,0,0,.125);border-radius: .25rem;">
	<form action="" id="newEvent">
		<h5>Crear nueva categoría</h5>
		<hr>
		<div class="mb-3">
			<label for="exampleInputEmail1" class="form-label">Nombre</label>
			<input type="text" class="form-control" id="nameEvent" name="nameEvent" required>
		</div>
		<div class="mb-3">
			<label for="exampleInputEmail1" class="form-label">Descripción</label>
			<textarea class="form-control" id="descriptionEvent" name="descriptionEvent" rows="3" required></textarea>
		</div>
		<div class="mb-3">
		  <label for="formFile" class="form-label">Cover Evento</label>
		  <input class="form-control" type="file" id="cover" name="cover" accept="image/*" required>
		</div>
		<div class="d-grid gap-2">
			<button id="addEvent" type="button" class="btn btn-danger btn-sm btn-block">Crear Categoría</button>
		</div>
	</form>
</div>
<div class="modal fade" id="successful">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h4>Categoría creada exitosamente</h4>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#addEvent').click(function(){
			var name = $('#nameEvent').val();
			var description = $('#descriptionEvent').val();
			var cover = $('#cover').val();
			if (name=="" && description=="" && cover=="") {
				alertify.error("Debe agregar todos los datos solicitados para la nueva categoría");
			} else if (name== "") {
				alertify.error("Debe agregar el nombre de la categoría");
			} else  if (description=="") {
				alertify.error("Debe agregar la descripción de la categoría");
			} else if (cover=="") {
				alertify.error("Debe agregar la imagen de la categoría");
			} else {
				var Data = new FormData(document.getElementById('newEvent'));
				$.ajax({
					type:"POST",
					datatype: "html",
					data: Data,
					cahe:false,
					contentType:false,
					processData:false,
					url:"/helpers/newEvent.php",
					success:function(r){
						if (r==1) {
							$('#categoryTable').load('/views/administrator/categoryAllTable.php');
							$("#newEvent")[0].reset();
							$("#successful").modal("show");
							setTimeout(function(){ $('#successful').modal('hide');},2000);
						} else {
							if (r == 2) {
								alertify.error("Error, la categoría ya existe");
							} else {
								alertify.error("No se agrego la categoría");
							}
						}
					}
				});
			}
		});
	});
</script>