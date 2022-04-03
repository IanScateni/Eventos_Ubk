<div class="row">
	<div class="col-12">
		<h3>Gestión de servicios</h3>
		<hr>
		<div class="center">
			<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				<li class="nav-item" role="presentation">
				<button class="nav-link active" id="pills-allServices-tab" data-bs-toggle="pill" data-bs-target="#pills-allServices" type="button" role="tab" aria-controls="pills-allServices" aria-selected="true">Ver Todos los servicios</button>
				</li>
				<li class="nav-item" role="presentation">
				<button class="nav-link" id="pills-newService-tab" data-bs-toggle="pill" data-bs-target="#pills-newService" type="button" role="tab" aria-controls="pills-newService" aria-selected="false">Crear servicio</button>
				</li>	
			</ul>
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-allServices" role="tabpanel" aria-labelledby="pills-allServices-tab">
					<?php require_once 'views/administrator/allServices.php';?>
				</div>
				<div class="tab-pane fade" id="pills-newService" role="tabpanel" aria-labelledby="pills-newService-tab">
					<?php require_once 'views/administrator/newServices.php'; ?>
				</div>
			</div>
		</div>
	</div>
</div>
