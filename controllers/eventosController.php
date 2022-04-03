<?php 
require_once 'models/eventos.php';
require_once 'models/servicios.php';
class EventosController {
	public function index(){
		$event = new Eventos();
		$events = $event->getAll();
		require 'views/eventos/index.php';
	}
	public function evento(){
		if (isset($_GET['detail']) && isset($_GET['id'])) {
			$event = new Eventos();
			$detailEvent = $event->getEvent($_GET['id']);
			$eventGalery = new Eventos();
			$eventGalery = $eventGalery->getGaleryEvent($_GET['id']);
			$servicesEvent = new Servicios();
			$servicesEvent = $servicesEvent->getServicesEvent($_GET['id']);
		}
		require_once 'views/eventos/evento.php';
	}
	public function cotiza(){
		if (!empty($_POST)) {
			if (array_key_exists('lugar', $_POST )) {
				$output = array_slice($_POST, -10);	
				$position = count($_POST) -10;
				$input = array_slice($_POST, 0, $position);
				$nombre = $_POST['nombre'] . " " . $_POST['apellido'];
				$evento = $_POST['NameEvent'];	
				$personas = $_POST['personas'];	
				$email = $_POST['email'];	
				$telefono = $_POST['telefono'];	
				$fecha = $_POST['fecha'];
				$hora = $_POST['time'];
				$firstname = $_POST['nombre'];	
				$lastname = $_POST['apellido'];	
				$lugar = $_POST['lugar'];
				$site = $_POST['siteEventTitle'];
				$service = new Servicios();
				$menuCategory = $service->getMenuCategory();
			} else {
				$output = array_slice($_POST, -10);	
				$position = count($_POST) -10;
				$input = array_slice($_POST, 0, $position);
				$nombre = $_POST['nombre'] . " " . $_POST['apellido'];
				$evento = $_POST['NameEvent'];	
				$personas = $_POST['personas'];	
				$email = $_POST['email'];	
				$telefono = $_POST['telefono'];	
				$fecha = $_POST['fecha'];
				$hora = $_POST['time'];
				$firstname = $_POST['nombre'];	
				$lastname = $_POST['apellido'];	
				$site = $_POST['siteEventTitle'];	
				$service = new Servicios();
				$menuCategory = $service->getMenuCategory();
			}
			require 'views/eventos/cotiza.php';	
		} else {
			header('location:error');
		}
	}
	public function finalizarReserva(){
		if (!empty($_POST)) {
			$output = array_slice($_POST, 6);
			$info = $_POST;
			$data = json_encode($_POST);
			$service = new Servicios();
			$reserva = $service->newReservation($data);
		require 'views/eventos/finalizarReserva.php';
		} else {
			header('location:index');
		}
	}
}
?>