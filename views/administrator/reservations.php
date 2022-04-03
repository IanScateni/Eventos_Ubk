<div class="row">
	<div class="col-12">
		<h3>Gestión de reservas</h3>
		<hr>
		<div class="center">
			<div class="row">
				<div class="col-sm-12">
					<div class="card text-center">
						<div class="card-body">
							<div id="reservationTable"></div>		
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#reservationTable').load('/views/administrator/reservationAllTable.php');
	});
</script>