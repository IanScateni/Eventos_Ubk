<?php 
	require 'crud.php';
	$obj = new crud();
	$status = "Approved";
	$data = array(
		$_POST['id_reserva'],
		$status
	);
	echo json_encode($obj->statusReservation($data));
?>