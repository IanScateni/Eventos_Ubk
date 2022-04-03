<?php 
	require 'crud.php';
	$obj = new crud();
	$status = "Rejected";
	$data = array(
		$_POST['id_reserva'],
		$status
	);
	echo json_encode($obj->statusReservation($data));
?>