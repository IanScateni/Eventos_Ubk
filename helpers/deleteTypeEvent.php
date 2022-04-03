<?php 
	require 'crud.php';
 	$obj = new crud();
 	echo json_encode($obj->deleteTypeEvent($_POST['id_event']));
?>