<?php 
	require 'crud.php';
 	$obj = new crud();
 	echo json_encode($obj->getServiceData($_POST['id_service']));
?>