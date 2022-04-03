<div class="row">
	<div class="col-12">
		<h3>Gestión de eventos</h3>
		<hr>
		<div class="center">
			<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				<li class="nav-item" role="presentation">
				<button class="nav-link active" id="pills-allEvents-tab" data-bs-toggle="pill" data-bs-target="#pills-allEvents" type="button" role="tab" aria-controls="pills-allEvents" aria-selected="true">Ver Todos los eventos</button>
				</li>
				<li class="nav-item" role="presentation">
				<button class="nav-link" id="pills-newCategoryEvent-tab" data-bs-toggle="pill" data-bs-target="#pills-newCategoryEvent" type="button" role="tab" aria-controls="pills-newCategoryEvent" aria-selected="false">Crear categoría</button>
				</li>
				<li class="nav-item" role="presentation">
				<button class="nav-link" id="pills-newEvent-tab" data-bs-toggle="pill" data-bs-target="#pills-newEvent" type="button" role="tab" aria-controls="pills-newEvent" aria-selected="false">Crear evento</button>
				</li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-allEvents" role="tabpanel" aria-labelledby="pills-allEvents-tab">
					<?php require_once 'views/administrator/allEvents.php';?>
				</div>
				<div class="tab-pane fade" id="pills-newCategoryEvent" role="tabpanel" aria-labelledby="pills-newCategoryEvent-tab">
					<?php require_once 'views/administrator/newCategoryEvent.php'; ?>
				</div>
				<div class="tab-pane fade" id="pills-newEvent" role="tabpanel" aria-labelledby="pills-newEvent-tab">
					<?php require_once 'views/administrator/newEvents.php'; ?>
				</div>
			</div>
		</div>
	</div>
</div>
