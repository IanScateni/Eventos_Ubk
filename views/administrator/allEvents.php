<div class="container pb-5">
	<div class="row">
		<div class="col-sm-12">
			<div class="card text-center">
				<div class="card-body">
					<div id="eventsTable"></div>		
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Actualizar evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="updateEvent">
            <div class="mb-3">
                <input type="text" hidden="" id="idU" name="idU">
                <label for="exampleInputText" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="nameEventU" name="nameEventU" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputText" class="form-label">Descripción</label>
                <textarea class="form-control" id="descriptionU" name="descriptionU" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputText" class="form-label">Descripción corta</label>
                <textarea class="form-control" id="shortdescriptionU" name="shortdescriptionU" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputText" class="form-label">Url Video</label>
                <input type="text" class="form-control" id="videoEventU" name="videoEventU" required>
                <span class="form-text">
                  Solo se aceptan videos de YouTube, se debe agregar solo la parte final de la url del video, <strong>Ejemplo:</strong><br>https://www.youtube.com/watch?v=<span>75DHx3Z-FbM</span>
                </span>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnUpdate">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="successfull">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4>Evento actualizado exitosamente</h4>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
        $('#eventsTable').load('/views/administrator/eventsAllTable.php');
        $('#btnUpdate').click(function(){
          var name = $('#nameEventU').val();
          var description = $('#descriptionU').val();
          var shortdescription = $('#shortdescriptionU').val();
          var video = $('#videoEventU').val();
          if (name == "" && description == "" && shortdescription =="" && video==""){
            alertify.error("Debes ingresar toda la información");
          } else if (name == ""){
              alertify.error("El nombre del evento no puede estar vacío");
          } else if (description ==""){
             alertify.error("La descripción del evento no puede estar vacío");
          } else if (shortdescription ==""){
            alertify.error("La descripción corta del evento no puede estar vacío");
          } else if (video==""){
            alertify.error("El id del video no puede estar vacío");
          } else {
            data=$('#updateEvent').serialize();
            $.ajax({
              type:"POST",
              data:data,
              url:"/helpers/updateEvent.php",
              success:function(r){
                  if (r==1) {
                     $("#edit").modal("hide"); 
                     $('#eventsTable').load('/views/administrator/eventsAllTable.php');
                     $("#successfull").modal("show");
                     setTimeout(function(){ $('#successfull').modal('hide');},2000);
                  } else {
                      alertify.error("Error, fallo al actualizar, intente nuevamente");
                  }
              }
            });
          }
        });
    });
    function getDataEvent(id_event){
          $.ajax({
              type: "POST",
              data: "id_event=" + id_event,
              url: "/helpers/getEvent.php",
              success:function(r){
                  event=jQuery.parseJSON(r);
                  $('#idU').val(event['id']);
                  $('#nameEventU').val(event['name']);
                  $('#descriptionU').val(event['description']);
                  $('#shortdescriptionU').val(event['shortdescription']);
                  $('#videoEventU').val(event['video']);
              }
          });
      }
      function deleteEvent(id_event){
        alertify.confirm('Eliminar la evento', '¿Seguro de eliminar este evento?', function(){
            $.ajax({
                type: "POST",
                data: "id_event=" + id_event,
                url: "/helpers/deleteEvent.php",
                success:function(r){
                   if (r==1) {
                       $('#eventsTable').load('/views/administrator/eventsAllTable.php');
                        alertify.success("Eliminado con éxito");
                   } else {
                        alertify.error("No se pudo eliminar");
                   }
                }
            });
        }
        , function(){
        }).set('labels', {ok: 'Eliminar', cancel:'Cerrar'});
      }
</script>
