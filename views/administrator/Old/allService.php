<div class="container-sm">
    <div class="row">
        <div class="col-sm-12">
            <div class="card text-center">
                <div class="card-body">
                    <div id="serviceTable"></div>
                </div>
            </div>
        </div>
    </div>
</div><br><br><br>
<!-- Modal -->
<div class="modal fade" id="editService" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Actualizar Servicio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="updateService">
            <div class="mb-3">
                <input type="text" hidden="" id="idUs" name="idUs">
                <label for="exampleInputText" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="titleUs" name="titleUs" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputText" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripUs" name="descripUs" rows="3" required></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnServiceUpdate">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="successfullService">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4>Servicio actualizado exitosamente</h4>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
        $('#serviceTable').load('/views/administrator/serviceAllTable.php');
    }); 
    function updateService(id_service){
        $.ajax({
            type: "POST",
            data: "id_service=" + id_service,
            url: "/helpers/getService.php",
            success:function(r){
                event=jQuery.parseJSON(r);
                $('#idUs').val(event['id']);
                $('#titleUs').val(event['type']);
                $('#descripUs').val(event['description']);
            }
        });
    }
    function deleteService(id_service){
        alertify.confirm('Eliminar el servicio', '¿Seguro de eliminar este servicio?', function(){
            $.ajax({
                type: "POST",
                data: "id_service=" + id_service,
                url: "/helpers/deleteService.php",
                success:function(r){
                   if (r==1) {
                        $('#serviceTable').load('/views/administrator/serviceAllTable.php');
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
    	$('#btnServiceUpdate').click(function(){ 
    		var title = $('#titleUs').val();
        	var description = $('#descripUs').val();
        	if (title == "" && description == "") {
        		alertify.error("Debe ingresar toda la información");
        	} else {
        		if (title == "") {
        			alertify.error("Debe ingresar el titulo del servicio");
        		} else {
        			if (description == "") {
        				alertify.error("Debe ingresar la descripción del servicio");
        			} else {
        				data=$('#updateService').serialize();
        				$.ajax({
        					type:"POST",
                            data:data,
                            url:"/helpers/updateService.php",
                            success:function(r){
                            	if (r==1) {
                            		$("#editService").modal("hide"); 
                                    $('#serviceTable').load('/views/administrator/serviceAllTable.php');
                                    $("#successfullService").modal("show");
                                   setTimeout(function(){ $('#successfullService').modal('hide');},2000);
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