<?php 
	require 'crud.php';
 	$obj = new crud();
 	echo json_encode($obj->deleteService($_POST['id_service']));
?>