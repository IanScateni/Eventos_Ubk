<?php 
require_once 'models/servicios.php';
$sService = new Servicios();
$sServices = $sService->getAll();
?>
<div class="container-sm" style="background-color: #FFF; padding: 1.25rem; border: 1px solid rgba(0,0,0,.125);border-radius: .25rem;">
	<form action="" id="newDetailService">
		<h5>Crear detalles de servicio</h5>
		<hr>
		<div class="mb-3">
			<label for="example" class="form-label">Titulo</label>
			<input type="text" class="form-control" id="titleDetailService" name="titleDetailService" required>
		</div>
		<div class="mb-3">
			<label for="example" class="form-label">Descripción</label>
			<textarea class="form-control" id="descriptionDetailService" name="descriptionDetailService" rows="2" required></textarea>
		</div>
		<div class="row g-3">
			<div class="col-md-6">
				<label for="formFile" class="form-label">Valor</label>
				<input type="text" class="form-control" id="valueDetailService" name="valueDetailService" required>
			</div>
			<div class="col-md-6">
				<label for="formFile" class="form-label"><h6>Seleccione el servicio al cual corresponden estos detalles:</h6></label>
				<select class="form-select" aria-label="Default select" id="serviceDetail" name="serviceDetail">
				<?php while ($service = $sServices->fetch_object()):?>
					  <option value="<?= $service->id ?>"><?= $service->type ?></option>
				<?php endwhile; ?>
				</select>
			</div>
		</div>
		<br>
		<div class="d-grid gap-2">
			<button id="addNewDetailService" type="button" class="btn btn-danger btn-sm">Crear Detalles</button>
		</div>
	</form>
</div>
<div class="modal fade" id="successfullDetailNewSercice">
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
		$('#addNewDetailService').click(function(){
			var title = $('#titleDetailService').val();
			var description = $('#descriptionDetailService').val();
			var value = $('#valueDetailService').val();
			if (title == "" && description =="" && value =="") {
				alertify.error("Debe agregar todos los datos solicitados");
			} else {
				if (title =="") {
					alertify.error("Debe agregar el titulo");
				} else {
					if (description=="") {
						alertify.error("Debe agregar la descripción");
					}else {
						if (value=="") {
							alertify.error("Debe ingresar el valor del servicio");
						} else {
							data=$('#newDetailService').serialize();
							$.ajax({
								type:"POST",
                                data:data,
                                url:"/helpers/newDetailService.php",
                                success:function(r){
									if (r==1) {
										$('#detailAllServiceTable').load('/views/administrator/detailAllServiceTable.php');
										$("#newDetailService")[0].reset();
											$("#successfullDetailNewSercice").modal("show");
											setTimeout(function(){ $('#successfullDetailNewSercice').modal('hide');},2000);
									} else {
										if (r == 2) {
											alertify.error("Error, los detalles del servicio ya existen");
										} else {
												alertify.error("Error, No se agrego los detalles del servicio");		
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