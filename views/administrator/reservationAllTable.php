<?php 
require_once '../../config/db.php'; 
require_once '../../models/reservas.php';
$oReservation = new Reservas();
$reservations = $oReservation->getAll();
?>
<div class="table-responsive">
	<table id="tableReservation" class="table table-sm table-hover table-condensed" cellspacing="0" style="width: 100%;">
		<thead style="background-color: #dc3545;color: #fff; font-weight: bold;">
			<tr>
				<td>Nombre</td>
				<td>Email</td>
				<td>Teléfono</td>
				<td>Fecha</td>
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
				<td>Personas</td>
				<td>Evento</td>
				<td>Estado</td>
				<td>Tipo</td>
				<td>Detalles</td>
			</tr>
		</tfoot>
		<tbody>
			<?php while ($reservation = $reservations->fetch_object()):?>
				<tr>
					<td><strong><?= $reservation->nombre ?></strong></td>
					<td><?= $reservation->email ?></td>
					<td><?= $reservation->telefono ?></td>
					<td><?= $reservation->fecha ?></td>
					<td><?= $reservation->personas ?></td>
					<td><strong><?= $reservation->evento ?></strong></td>
					<?php if ($reservation->status ==  'Pending') {?>
					<td>Pendiente</td>	
					<?php } else if ($reservation->status ==  'Approved') {?>
					<td>Aprobado</td>
					<?php } else if ($reservation->status ==  'Rejected') {?>
					<td>Rechazada</td>
					<?php } else if ($reservation->status ==  'completed') {?>
					<td>Finalizado</td>
					<?php } if ($reservation->type == '0') {?>
					<td>Evento o recepción</td>
					<?php } else {?>
					<td>Servicio</td>	
					<?php } ?>
					<td><a href="detalleReserva&id=<?= $reservation->id; ?>" target="_blank"><i class="fas fa-file-alt"></i></a></td>
				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
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
</script>