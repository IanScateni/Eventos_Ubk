<?php 
	require 'crud.php';
 	$obj = new crud();
 	$data = array(
 		$_POST['idU'],
	    $_POST['nameEventU'],
	    $_POST['descriptionU'],	
	    $_POST['shortdescriptionU'],	
	    $_POST['videoEventU']	
 	);
 	echo $obj->updateEvent($data);
?>