<?php 
require_once 'config/db.php';
require_once 'models/eventos.php';
$oEvents = new Eventos();
$eventss = $oEvents->getAll();
?>
<div class="container pb-5">
	<div class="row">
		<div class="col-sm-12">
			<div class="card text-center">
				<div class="card-body">
					<div id="servicesTable"></div>		
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="editService" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Actualizar evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="updateService">
                <input type="text" hidden= "" id="idServiceU" name="idServiceU">
            <div class="mb-3">
                <label for="exampleInputText" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="titleServiceU" name="titleServiceU" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputText" class="form-label">Descripción</label>
                <textarea class="form-control" id="descriptionServiceU" name="descriptionServiceU" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <div class="col">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="eventoUpdate">
                      <label class="form-check-label" for="evento">
                        Editar Servicios para eventos y recepciones
                      </label>
                    </div>
                </div>
                <div id="eventUpdateService" class="eventosUpdateService col"><br>
                    <label class="form-check-label" for="evento">
                    Seleccione los eventos que ofrecen este servicio
                    </label><br><br>
                    <?php 
                    while ($event = $eventss->fetch_object()) {?>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="<?= $event->id; ?>" name="eventos[]" value="<?= $event->id; ?>">
                          <label class="form-check-label" for="flexSwitchCheckDefault"><?= $event->name; ?></label>
                        </div>
                    <?php } ?>
                </div><br>
                <div class="col">
                    <label for="formFile" class="form-label">Editar Precio</label> 
                    <select class="form-select" id="unitUpdate" name="unitUpdate" required onchange="unitCUpdate();">
                      <option selected disabled value="">Seleccione...</option>
                      <option value="1">Por invitado</option>
                      <option value="2">Por cantidad de personas</option>
                      <option value="3">c/u</option>
                    </select>
                    <br>
                    <span id="unitUpdatetype"></span>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger" id="btnUpdateService">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="successfullUpdateService">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4>Servicio actualizado exitosamente</h4>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#servicesTable').load('/views/administrator/servicesAllTable.php');

        $('#btnUpdateService').click(function(){
            var title = $('#titleServiceU').val();
            var description = $('#descriptionServiceU').val();
            if (title == "" || description == ""){
                alertify.error("Debes ingresar toda la información");
            } else {
                data=$('#updateService').serialize();
                $.ajax({
                    type:"POST",
                    data:data,
                    url:"/helpers/updateService.php",  
                    success:function(r){
                        if (r==1) {
                          $("#editService").modal("hide");
                          $("#updateService")[0].reset();
                          $('#servicesTable').load('/views/administrator/servicesAllTable.php');
                           $("#successfullUpdateService").modal("show");
                            setTimeout(function(){ $('#successfullUpdateService').modal('hide');},2000);  
                        } else {
                            alertify.error("Error, fallo al actualizar, intente nuevamente");
                        }
                    }
                });
            }
        });
	});
	function getDataService(id_service){
		$.ajax({
			type: "POST",
            data: "id_service=" + id_service,
            url: "/helpers/getService.php",	
            success:function(r){
            	service=jQuery.parseJSON(r);
            	$('#idServiceU').val(service['id']);	
                $('#titleServiceU').val(service['title']);   
                $('#descriptionServiceU').val(service['description']);   
            }
		});	
	}
    function deleteService(id_service){
        alertify.confirm('Eliminar servicio', '¿Seguro de eliminar este servicio?', function(){
            $.ajax({
                type: "POST",
                data: "id_service=" + id_service,
                url: "/helpers/deleteService.php",
                success:function(r){
                   if (r==1) {
                       $('#servicesTable').load('/views/administrator/servicesAllTable.php');
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
    $("#eventoUpdate").on('change', function(){
        if( $(this).is(':checked') ) {
            document.getElementById('eventUpdateService').style.display = 'block';
        } else {
            document.getElementById('eventUpdateService').style.display = 'none';          
        }
    });
    function unitCUpdate(){
        let unit = document.getElementById('unitUpdate');
        let unittype = unit.value;
        if (unittype == '1'){
            document.getElementById('unitUpdatetype').innerHTML = '<label for="exampleInputEmail1" class="form-label">Valor por invitado</label><input type="text" class="form-control" id="unit1" name="unit1" onkeypress="return isNumberKey(event)" required><input type="text" hidden="" class="form-control" id="unitStandar" name="unitStandar" value="Por invitado">'; 
        } else if (unittype == '2'){
            document.getElementById('unitUpdatetype').innerHTML = '<label for="exampleInputEmail1" class="form-label">Valor Paquete 1</label><input type="text" class="form-control validanumericos" id="unit1" name="unit1"  onkeypress="return isNumberKey(event)" required><label for="exampleInputEmail1" class="form-label">Valor Paquete 2</label><input  type="text" class="form-control validanumericos" id="unit2" name="unit2"  onkeypress="return isNumberKey(event)" required><label for="exampleInputEmail1" class="form-label">Valor Paquete 3</label><input type="text" class="form-control validanumericos" id="unit3" name="unit3" onkeypress="return isNumberKey(event)"  required><input type="text" hidden="" class="form-control" id="unitStandar" name="unitStandar" value="Personas">';
        } else if (unittype == '3'){
            document.getElementById('unitUpdatetype').innerHTML = '<label for="exampleInputEmail1" class="form-label">Valor por unidad</label><input type="text" class="form-control validanumericos" id="unit1" name="unit1" onkeypress="return isNumberKey(event)" required><input type="text" hidden="" class="form-control" id="unitStandar" name="unitStandar" value="c/u">';    
        }
        
    }
</script>