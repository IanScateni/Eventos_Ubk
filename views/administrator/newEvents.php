<div class="container" style="background-color: #FFF; padding: 1.25rem; border: 1px solid rgba(0,0,0,.125);border-radius: .25rem;">
	<form action="" id="newEvent">
		<h5>Crear nuevo evento</h5>
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
			<label for="exampleInputEmail1" class="form-label">Descripción corta</label>
			<textarea class="form-control" id="shortdescriptionEvent" name="shortdescriptionEvent" rows="2" required></textarea>
		</div>
		<div class="mb-3">
			<div class="row g-3">
			  <div class="col">
			    <label for="formFile" class="form-label">Cover Evento</label>
			  	<input class="form-control" type="file" id="cover" name="cover" accept="image/*" required>
			  </div>
			  <div class="col">
			  	<label for="formFile" class="form-label">Galería de imagenes</label>
					<input class="form-control input-sm input-file" type="file" name="galery[]" id="galery" multiple="" accept="image/png, image/jpeg">
			  </div>	
			  <div class="col">
			    <label for="exampleInputEmail1" class="form-label">Video</label>
					<input type="text" class="form-control" id="videoEvent" name="videoEvent" required>
					<span class="form-text">
            Solo se aceptan videos de YouTube, se debe agregar solo la parte final de la url del video, <strong>Ejemplo:</strong><br>https://www.youtube.com/watch?v=<span>75DHx3Z-FbM</span>
          </span>
			  </div>
			</div>
		</div>
		<div class="form-group">
   		<output id="previewImages"></output>
   	</div> 
		<div class="d-grid gap-2">
			<button id="addEvent" type="button" class="btn btn-danger btn-sm btn-block">Crear Evento</button>
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
		$('#addEvent').click(function(){
			var name = $('#nameEvent').val();
			var description = $('#descriptionEvent').val();
			var shortDescription = $('#shortdescriptionEvent').val();
			var cover = $('#cover').val();
			var video = $('#videoEvent').val();
			var galery = $('#galery').val();
			if (name == "" || description == "" || shortDescription == "" || cover == "" || video == "" || galery == "") {
					alertify.error("Por favor complete todos los campos");
			} else {
				var data = new FormData(document.getElementById('newEvent'));
				$.ajax({
					type:"POST",
			    datatype: "html",
			    data:data,
			    cahe:false,
			    contentType:false,
			    processData:false,
			    url:"/helpers/newEvent.php",
			    success:function(r){
			    	if (r==1) {
			    		$('#eventsTable').load('/views/administrator/eventsAllTable.php');
			    		$("#newEvent")[0].reset();
			    		$("#successfulEventNew").modal("show");
                     setTimeout(function(){ $('#successfulEventNew').modal('hide');},2000);
			    	} else {
			    		if (r == 2){
			    			alertify.error("Error, la evento ya existe");	
			    		} else {
			    			alertify.error("Error, no se pudo crear el evento");
			    		}
			    	}
			    }
				});
			}
		});	
	});
</script>