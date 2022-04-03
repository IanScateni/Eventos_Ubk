<?php 
require_once '../../config/db.php'; 
require_once '../../models/usuario.php';
$oUsers = new Usuario();
$users = $oUsers->getAll();
?>
<div class="table-responsive">
	<table id="tableUser" class="table table-sm table-hover table-condensed" cellspacing="0" style="width: 100%;">
		<thead style="background-color: #dc3545;color: #fff; font-weight: bold;">
			<tr>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Email</td>
				<td>Teléfono</td>
				<td>Documento</td>
				<td>Dirección</td>
				<td>Rol</td>
				<td>Registro</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: #fff; font-weight: bold;">
			<tr>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Email</td>
				<td>Teléfono</td>
				<td>Documento</td>
				<td>Dirección</td>
				<td>Rol</td>
				<td>Registro</td>
				<td>Eliminar</td>
			</tr>
		</tfoot>
		<tbody>
			<?php while ($user = $users->fetch_object()):?>
			<tr>
				<td><?= $user->firstname; ?></td>
				<td><?= $user->lastname; ?></td>
				<td><?= $user->email; ?></td>
				<td><?= $user->phone; ?></td>
				<td><?= $user->document; ?></td>
				<td><?= $user->address; ?></td>
				<?php if ($user->idrol == '2'): ?>
				<td>Cliente</td>
				<?php else: ?>
				<td>Administrador</td>
				<?php endif ?>
				<td><?= $user->register; ?></td>
				<td><span class="btn btn-danger btn-sm" onclick="deleteUser('<?= $user->id ?>')"><span class="fas fa-trash-alt"></span></span></td>
			</tr>	
			<?php endwhile; ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
    $('#tableUser').DataTable({
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