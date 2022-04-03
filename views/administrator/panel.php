<?php 
if (!isset($_SESSION['identity'])) {
    header("Location:".PATH.'usuario/login');
}
if ($_SESSION['identity']->idrol == "1") {?>
	<div class="container events">
		<div class="section-padding category-admin">
			<p>Bienvenido de nuevo <strong><?php echo $_SESSION['identity']->firstname ." " .$_SESSION['identity']->lastname;?></strong></p>
			<p>Gestiona todos los servicio</p>
			<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			  <li class="nav-item" role="presentation">
			    <button id="pills-events-tab" data-bs-toggle="pill" data-bs-target="#pills-events">
			    	<div class="card text-white bg-primary" style="max-width: 18rem;">
						<div class="card-body">
							<h5 class="card-title">Eventos</h5>
							<p class="card-text">Gestión de eventos</p>
						</div>
					</div>
			    </button>
			  </li>
			  <li class="nav-item" role="presentation">
			    <button id="pills-services-tab" data-bs-toggle="pill" data-bs-target="#pills-services" type="button" role="tab" aria-controls="pills-services" aria-selected="false">
			    	<div class="card text-white bg-warning" style="max-width: 18rem;">
						<div class="card-body">
							<h5 class="card-title">Servicios</h5>
							<p class="card-text">Gestión de servicios</p>
						</div>
					</div>
			    </button>
			  </li>
			  <li class="nav-item" role="presentation">
			    <button id="pills-reservations-tab" data-bs-toggle="pill" data-bs-target="#pills-reservations" type="button" role="tab" aria-controls="pills-reservations" aria-selected="false">
			    	<div class="card text-white bg-success" style="max-width: 18rem;">
						<div class="card-body">
							<h5 class="card-title">Reservas</h5>
							<p class="card-text">Gestión de reservas</p>
						</div>
					</div>
			    </button>
			  </li>
			  <li class="nav-item" role="presentation">
			    <button id="pills-users-tab" data-bs-toggle="pill" data-bs-target="#pills-users" type="button" role="tab" aria-controls="pills-users" aria-selected="false">
			    	<div class="card text-white bg-danger" style="max-width: 18rem;">
						<div class="card-body">
							<h5 class="card-title">Usuarios</h5>
							<p class="card-text">Gestión de usuarios</p>
						</div>
					</div>
			    </button>
			  </li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
			  <div class="tab-pane fade show active" id="pills-events" role="tabpanel" aria-labelledby="pills-events-tab">
			  	<?php require 'views/administrator/events.php';?>
			  </div>
			  <div class="tab-pane fade" id="pills-services" role="tabpanel" aria-labelledby="pills-services-tab">
			  	<?php require 'views/administrator/services.php';?>
			  </div>
			  <div class="tab-pane fade" id="pills-reservations" role="tabpanel" aria-labelledby="pills-reservations-tab">
			  	<?php require 'views/administrator/reservations.php';?>
			  </div>
			  <div class="tab-pane fade" id="pills-users" role="tabpanel" aria-labelledby="pills-users-tab">
			  	<?php require 'views/administrator/users.php';?>
			  </div>
			</div>
		</div>
	</div>
<?php } else {
	header("Location:".PATH.'usuario/login');
}?>