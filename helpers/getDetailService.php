<?php 
	require 'crud.php';
 	$obj = new crud();
 	echo json_encode($obj->getDetailServiceData($_POST['id_service']));
?>