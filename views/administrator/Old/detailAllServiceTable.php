<?php 
require_once '../../config/db.php'; 
require_once '../../models/servicios.php';
$oDetailsService = new Servicios();
$detailServices = $oDetailsService->getAllDetails();
?>
<div class="table-responsive">
	<table id="tableDetailServices" class="table table-sm table-hover table-condensed" cellspacing="0" style="width: 100%;">
		<thead style="background-color: #dc3545;color: #fff; font-weight: bold;">
			<tr>
				<td>Nombre</td>
				<td>Descripción</td>
				<td>Valor</td>
				<td>Servicio</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: #fff; font-weight: bold;">
			<tr>
				<td>Nombre</td>
				<td>Descripción</td>
				<td>Valor</td>
				<td>Servicio</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</tfoot>
		<tbody>
			<?php while ($detailService = $detailServices->fetch_object()):?>
				<tr>
					<td><?= $detailService->title ?></td>
					<td><?= $detailService->description ?></td>
					<td><?= str_replace(",", ".", number_format($detailService->value)); ?></td>
					<td><?= $detailService->service ?></td>
					<td><span class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editDetailService" onclick="updateDetailService('<?= $detailService->id ?>')" ><span class="fas fa-edit"></span></span></td>
                	<td><span class="btn btn-danger btn-sm" onclick="deleteDetailService('<?= $detailService->id ?>')"><span class="fas fa-trash-alt"></span></span></td>
				</tr>
			<?php endwhile; ?>	
		</tbody>
	</table>
</div>
<script type="text/javascript">
    $('#tableDetailServices').DataTable({
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