<?php 
require_once '../../config/db.php'; 
require_once '../../models/servicios.php';
$oService = new Servicios();
$services = $oService->getAll();
?>
<div class="table-responsive">
	<table id="tableServices" class="table table-sm table-hover table-condensed" cellspacing="0" style="width: 100%;">
		<thead style="background-color: #dc3545;color: #fff; font-weight: bold;">
			<tr>
				<td>Nombre</td>
				<td>Descripción</td>
				<td>Cover</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: #fff; font-weight: bold;">
			<tr>
				<td>Nombre</td>
				<td>Descripción</td>
				<td>Cover</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</tfoot>
		<tbody>
			<?php while ($service = $services->fetch_object()):?>
				<tr>
					<td><strong><?= $service->title ?></strong></td>
					<td><?= substr($service->description, 0, 300) ?></td>
					<td><img class="eventImg" src="../../public/img/<?= $service->cover ?>" alt=""></td>
					<td><span class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editService" onclick="getDataService('<?= $service->id ?>')" ><span class="fas fa-edit"></span></span></td>
                <td><span class="btn btn-danger btn-sm" onclick="deleteService('<?= $service->id ?>')"><span class="fas fa-trash-alt"></span></span></td>
				</tr>
			<?php endwhile; ?>	
		</tbody>
	</table>
</div>
<script type="text/javascript">
    $('#tableServices').DataTable({
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