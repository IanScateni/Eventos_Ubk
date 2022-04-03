<?php 
require_once 'models/servicios.php';
class serviciosController{
	public function index(){
		$serviced = new Servicios();
		$services = $serviced->getAll();
		require_once 'views/servicios/index.php';
	}
	public function menuCard(){
		$menu = new Servicios();
		$menuCategory = $menu->getMenuCategory();
		require_once 'views/servicios/menuCard.php';
	}
}
?>