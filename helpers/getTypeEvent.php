<?php 
	require 'crud.php';
 	$obj = new crud();
 	echo json_encode($obj->getTypeEventData($_POST['id_event']));
?>