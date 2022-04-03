<?php 
	require 'crud.php';
 	$obj = new crud();
 	echo json_encode($obj->getEventData($_POST['id_event']));
?>