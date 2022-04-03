<div class="row">
	<div class="col-12">
		<h3>Gestión de usuarios</h3>
		<hr>
		<div class="center">
			<div class="row">
				<div class="col-sm-12">
					<div class="card text-center">
						<div class="card-body">
							<div id="usersTable"></div>		
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#usersTable').load('/views/administrator/usersAllTable.php');
	});
	function deleteUser(id_User){
        alertify.confirm('Eliminar usuario', '¿Seguro de eliminar este usuario?', function(){
            $.ajax({
                type: "POST",
                data: "id_User=" + id_User,
                url: "/helpers/deleteUser.php",
                success:function(r){
                   if (r==1) {
                       	$('#usersTable').load('/views/administrator/usersAllTable.php');
                        alertify.success("Eliminado con éxito");
                   } else {
                        alertify.error("No se pudo eliminar");
                   }
                }
            });
        }
        , function(){
        }).set('labels', {ok: 'Eliminar', cancel:'Cerrar'});
    }
</script>