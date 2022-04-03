<?php 
if (!isset($_SESSION['identity'])) {
    header("Location:".PATH.'usuario/login');
}
if ($_SESSION['identity']->idrol == "2") {?>
<div class="container" style="height: 88vh;">
	<div class="section-padding category-admin">
		<div class="row g-0">
		  <div class="col-sm-10 col-md-10">
			<p>Bienvenido de nuevo <strong><?php echo $_SESSION['identity']->firstname ." ". $_SESSION['identity']->lastname;?></strong></p>
		  </div>
		  <div class="col-2 col-md-2">
		  	<a style="text-align: right;" href="perfil">Gestionar cuenta</a>
		  </div>
		</div>
		<center><h5>Sus reservas</h5></center><hr>
		<?php require_once 'config/db.php'; require_once 'models/reservas.php';
		$oReservation = new Reservas();
		$reservations = $oReservation->getReservation($_SESSION['identity']->email);
		if ($reservations->num_rows > 0) {?>
			<div class="table-responsive">
				<table id="tableReservation" class="table table-sm table-hover table-condensed text-center" cellspacing="0" style="width: 100%;">
					<thead style="background-color: #dc3545;color: #fff; font-weight: bold;">
						<tr>
							<td>Nombre</td>
							<td>Email</td>
							<td>Teléfono</td>
							<td>Fecha</td>
							<td>Hora</td>
							<td>Personas</td>
							<td>Evento</td>
							<td>Estado</td>
							<td>Tipo</td>
							<td>Detalles</td>
						</tr>
					</thead>
					<tfoot style="background-color: #ccc;color: #fff; font-weight: bold;">
						<tr>
							<td>Nombre</td>
							<td>Email</td>
							<td>Teléfono</td>
							<td>Fecha</td>
							<td>Hora</td>
							<td>Personas</td>
							<td>Evento</td>
							<td>Estado</td>
							<td>Tipo</td>
							<td>Detalles</td>
						</tr>
					</tfoot>
					<tbody>
						<?php 
						foreach ($reservations as $info) {?>
						<tr>
							<td><?= $info['nombre']?></td>
							<td><?= $info['email']?></td>
							<td><?= $info['telefono']?></td>
							<td><?= $info['fecha']?></td>
							<td><?= $info['hour']?></td>
							<td><?= $info['personas']?></td>
							<td><?= $info['evento']?></td>
							<?php if ($info['status'] ==  'Pending') {?>
							<td>Pendiente</td>	
							<?php } else if ($info['status'] ==  'Approved') {?>
							<td>Aprobado</td>
							<?php } else if ($info['status'] ==  'Rejected') {?>
							<td>Rechazada</td>
							<?php } else if ($info['status'] ==  'completed') {?>
							<td>Finalizado</td>
							<?php } if ($info['type'] == '0') {?>
							<td>Evento o recepción</td>
							<?php } else {?>
							<td>Servicio</td>
							<?php } ?>
							<td><a href="/usuario/detalleReserva&id=<?= $info['id']; ?>" target="_blank"><i class="fas fa-file-alt"></i></a></td>
						</tr>
						<?php }?>
					</tbody>
				</table>				
			</div>
		<?php } else { ?>
			<div class="alert alert-danger" role="alert">
			  <center>Actualmente no tiene reservas, lo invitamos a ver nuestros servicios<br><br>
			  	<a class="btn btn-primary" href="/eventos/index">Eventos y recepciones</a>
			  	<a class="btn btn-primary" href="servicios/index">Servicios</a>
			  </center> 
			</div>
		<?php } ?>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#tableReservation').DataTable({
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                 },
                 "sProcessing":"Procesando...",
            },
        responsive: "true",
        dom: 'Bfrtilp',       
        buttons:[ 
            {
                extend:    'excelHtml5',
                text:      '<i class="fas fa-file-excel"></i>',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fas fa-file-pdf"></i>',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend:    'print',
                text:      '<i class="fas fa-print"></i>',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ]           
    });
});
</script>
<?php } else {
	header("Location:".PATH.'usuario/login');
}
?>