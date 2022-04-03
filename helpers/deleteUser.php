<?php 
	require 'crud.php';
 	$obj = new crud();
 	echo json_encode($obj->deleteUser($_POST['id_User']));
?>