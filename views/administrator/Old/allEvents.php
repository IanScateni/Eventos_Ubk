<div class="container-sm">
    <div class="row">
        <div class="col-sm-12">
            <div class="card text-center">
                <div class="card-body">
                    <div id="eventsTable"></div>
                </div>
            </div>
        </div>
    </div>
</div><br><br><br>
<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Actualizar Categoría</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="updateEvent">
            <div class="mb-3">
                <input type="text" hidden="" id="idU" name="idU">
                <label for="exampleInputText" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nameEventU" name="nameEventU" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputText" class="form-label">Descripción</label>
                <textarea class="form-control" id="descriptionU" name="descriptionU" rows="3" required></textarea>
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
                <h4>Categoría actualizada exitosamente</h4>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#eventsTable').load('/views/administrator/eventsAllTable.php');
    });
    function updateEvent(id_event){
        $.ajax({
            type: "POST",
            data: "id_event=" + id_event,
            url: "/helpers/getEvent.php",
            success:function(r){
                event=jQuery.parseJSON(r);
                $('#idU').val(event['id']);
                $('#nameEventU').val(event['name']);
                $('#descriptionU').val(event['description']);
            }
        });
    }
    function deleteEvent(id_event){
        alertify.confirm('Eliminar la categoría', '¿Seguro de eliminar esta categoría?', function(){
            $.ajax({
                type: "POST",
                data: "id_event=" + id_event,
                url: "/helpers/deleteEvent.php",
                success:function(r){
                   if (r==1) {
                        $('#categoryTable').load('/views/administrator/categoryAllTable.php');
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
        $('#btnUpdate').click(function(){
            var name = $('#nameEventU').val();
            var description = $('#descriptionU').val();
            if (name == "" && description == "") {
                alertify.error("Debes ingresar toda la información");
            } else {
                if (name == "") {
                    alertify.error("Debes ingresar el nombre de la categoría");
                } else {
                    if (description == "") {
                        alertify.error("Debes ingresar la descripción");
                    } else {
                        data=$('#updateEvent').serialize();
                        $.ajax({
                            type:"POST",
                            data:data,
                            url:"/helpers/updateEvent.php",
                            success:function(r){
                                if (r==1) {
                                   $("#edit").modal("hide"); 
                                   $('#categoryTable').load('/views/administrator/categoryAllTable.php');
                                   $("#successfull").modal("show");
                                   setTimeout(function(){ $('#successfull').modal('hide');},2000);
                                } else {
                                    alertify.error("Error, fallo al actualizar");
                                }
                            }
                        });
                    }
                }
            }
        });
    });
</script>