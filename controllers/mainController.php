<?php 
require 'models/eventos.php';
class MainController{
	public function index(){
		$event = new Eventos();
		$events = $event->getIndexEvent();
		require 'views/main/main.php';
	}
}
?>