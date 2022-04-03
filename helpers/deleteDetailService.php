<?php 
	require 'crud.php';
 	$obj = new crud();
 	echo json_encode($obj->deleteDetailService($_POST['id_service']));
?>