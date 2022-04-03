<div class="container-sm">
    <div class="row">
        <div class="col-sm-12">
            <div class="card text-center">
                <div class="card-body">
                    <div id="eventTable"></div>
                </div>
            </div>
        </div>
    </div>
</div><br><br><br>
<!-- Modal -->
<div class="modal fade" id="editTypeEvent" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Actualizar Evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="updateTypeEvent">
            <div class="mb-3">
                <input type="text" hidden="" id="idUp" name="idUp">
                <label for="exampleInputText" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="titleUp" name="titleUp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputText" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripUp" name="descripUp" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputText" class="form-label">Descripción corta</label>
                <textarea class="form-control" id="descriptionShortUp" name="descriptionShortUp" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputText" class="form-label">Video</label>
                 <input type="text" class="form-control" id="videoUp" name="videoUp" required>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnTypeEventUpdate">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="successfullEvent">
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
        $('#eventTable').load('/views/administrator/eventsAllTable.php');
    });    
    function updateTypeEvent(id_event){
        $.ajax({
            type: "POST",
            data: "id_event=" + id_event,
            url: "/helpers/getTypeEvent.php",
            success:function(r){
                event=jQuery.parseJSON(r);
                $('#idUp').val(event['id']);
                $('#titleUp').val(event['title']);
                $('#descripUp').val(event['description']);
                $('#descriptionShortUp').val(event['shortdescription']);
                $('#videoUp').val(event['video']);
            }
        });
    }
    function deleteTypeEvent(id_event){
        alertify.confirm('Eliminar el evento', '¿Seguro de eliminar este evento?', function(){
            $.ajax({
                type: "POST",
                data: "id_event=" + id_event,
                url: "/helpers/deleteTypeEvent.php",
                success:function(r){
                   if (r==1) {
                        $('#eventTable').load('/views/administrator/eventsAllTable.php');
                        alertify.success("Eliminado con exito");
                   } else {
                        alertify.error("No se pudo eliminar");
                   }
                }
            });
        }
        , function(){
        }).set('labels', {ok: 'Eliminar', cancel:'Cerrar'});
    }
    $(document).ready(function() {
        $('#btnTypeEventUpdate').click(function(){
        var title = $('#titleUp').val();
        var description = $('#descripUp').val();
        var shortdescription = $('#descriptionShortUp').val();
        var video = $('#videoUp').val();
        if (title == "" && description == "" && shortdescription == "" && video == "") {
            alertify.error("Debes ingresar toda la información");
        } else {
            if (title == "") {
                alertify.error("Debes ingresar el nombre del evento");
            } else {
                if (description == "") {
                     alertify.error("Debes ingresar la descripción");
                } else {
                    if (shortdescription == "") {
                         alertify.error("Debes ingresar la descripción corta");
                    } else {
                        if (video == "") {
                             alertify.error("Debes ingresar el video del evento");
                        } else {
                                data=$('#updateTypeEvent').serialize();
                                $.ajax({
                                    type:"POST",
                                    data:data,
                                    url:"/helpers/updateTypeEvent.php",
                                    success:function(r){
                                        if (r==1) {
                                           $("#editTypeEvent").modal("hide"); 
                                           $('#eventTable').load('/views/administrator/eventsAllTable.php');
                                           $("#successfullEvent").modal("show");
                                           setTimeout(function(){ $('#successfullEvent').modal('hide');},2000);
                                        } else {
                                            alertify.error("Error, fallo al actualizar");
                                        }
                                    }
                                });
                            }
                        
                    }
                }
            }
        }
        });
    });
</script>