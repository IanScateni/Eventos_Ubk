<?php 
require_once 'models/servicios.php';
require_once 'models/reservas.php';
class administratorController{
	public function panel(){
		require_once 'views/administrator/panel.php';
	}
	public function detalleReserva(){

		if (isset($_GET['id'])) {
			$service = new Servicios();
			$oReservation = new Reservas();
			$reservation = $oReservation->getAdminDetailReservation($_GET['id']);
		}
		require_once 'views/administrator/detalleReserva.php';
	}
}
?>