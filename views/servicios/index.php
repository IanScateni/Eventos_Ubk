<div class="container">
	<section class="section-padding">
		<div class="col-lg-12 col-align-center text-center">
			<h1>Servicios complementarios para eventos</h1>
			<p>Por favor selecciona la clase de servicio que deseas.</p>
		</div>
	</section>
	<section class="events section-padding">
		<div class="row row-cols-1 row-cols-md-3 g-4">
			<?php while ($service = $services->fetch_object()): ?>
				<div class="col">
					<div class="card h-100">
						<img src="<?=PATH?>public/img/<?= $service->cover; ?>" class="card-img-top" alt="...">
						<div class="card-body text-center">
							<h5 class="card-title"><?= $service->title; ?></h5><hr>
							<div class="d-grid gap-2">
								<a href="#" class="btn btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#serviceModal" onclick="getData('<?= $service->title; ?>')">Cotizar</a>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>	
	</section>
</div>
<!-- Modal -->
<div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cotización automática</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body serviceEvent">
        <div id="info"></div>
        </div>
		<div class='d-grid gap-2'>
		<button type='button' id='addReserva' class='btn btn-danger btn-sm'>Reservar</button>
		</div>
		</form>
		</div>
		</div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="successfullService" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h4>Reserva exitosa por favor revise su correo eléctronico, para consultar los detalles de su reserva</h4>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
function getData(id){
	$.ajax({
		type:"POST",
	    data:"id=" + id,
	    url:"/helpers/dataService.php",
	    success:function(r){
	    	$('#info').html(r);
	    }
	});
}
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
$('#addReserva').click(function(){
	var nombre = $('#nombre').val();
	var apellido = $('#apellido').val();
	var email = $('#email').val();
	var telefono = $('#telefono').val();
	var fecha = $('#fecha').val();
	var precio = $('#precio').val();
	if (nombre == "" || apellido == "" || email == "" || telefono =="") {
		alertify.error("Por favor ingrese todos los datos, no se permiten campos vacíos");
	} else if(/^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/.test(email)){
		data=$('#serviceRe').serialize();
		$.ajax({
			type:"POST",
	        data:data,
	        url:"/helpers/newBudgetService.php",
	        success:function(r){
	        	if (r==1) {
	        		$('#serviceRe')[0].reset();
	        		$("#successfullService").modal("show");
	        		$("#serviceModal").modal("hide");
	        		setTimeout(function(){ $('#successfullService').modal('hide');},4000);
	        	} else {
	        		alertify.error("Error, intente de nuevo en un momento");
	        	}
	        }
		});
	} else {
		alertify.error("El correo electrónico no es valido");
	}
});
</script>


	