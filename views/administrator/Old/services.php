<div class="row">
	<div class="col-12">
		<h3>Gestión de servicios</h3>
		<hr>
		<div class="center">
			<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				<li class="nav-item" role="presentation">
				<button class="nav-link" id="pills-allService-tab" data-bs-toggle="pill" data-bs-target="#pills-allService" type="button" role="tab" aria-controls="pills-allService" aria-selected="false">Ver Servicios</button>
				</li>
				<li class="nav-item" role="presentation">
				<button class="nav-link" id="pills-newService-tab" data-bs-toggle="pill" data-bs-target="#pills-newService" type="button" role="tab" aria-controls="pills-newService" aria-selected="false">Crear Servicio</button>
				</li>
				<li class="nav-item" role="presentation">
				<button class="nav-link" id="pills-detailService-tab" data-bs-toggle="pill" data-bs-target="#pills-detailService" type="button" role="tab" aria-controls="pills-detailService" aria-selected="false">Ver Detalles de Servicios</button>
				</li>
				<li class="nav-item" role="presentation">
				<button class="nav-link" id="pills-newDetailService-tab" data-bs-toggle="pill" data-bs-target="#pills-newDetailService" type="button" role="tab" aria-controls="pills-newDetailService" aria-selected="false">Ingresar Detalles de Servicios</button>
				</li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade" id="pills-allService" role="tabpanel" aria-labelledby="pills-allService-tab">
					<?php require_once 'views/administrator/allService.php'; ?>
				</div>
				<div class="tab-pane fade" id="pills-newService" role="tabpanel" aria-labelledby="pills-newService-tab">
					<?php require_once 'views/administrator/newService.php'; ?>
				</div>
				<div class="tab-pane fade" id="pills-detailService" role="tabpanel" aria-labelledby="pills-detailService-tab">
					<?php require_once 'views/administrator/detailAllService.php'; ?>
				</div>
				<div class="tab-pane fade" id="pills-newDetailService" role="tabpanel" aria-labelledby="pills-newDetailService-tab">
					<?php require_once 'views/administrator/newDetailService.php'; ?>
				</div>
			</div>
		</div>
	</div>
</div>
