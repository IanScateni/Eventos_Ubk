<?php 
	require 'crud.php';
 	$obj = new crud();
 	echo json_encode($obj->deleteEvent($_POST['id_event']));
?>