<?php 
require 'crud.php';
$obj = new crud();
$data = array(
	$_POST['idUp'],
$_POST['titleUp'],
$_POST['descripUp'],	
$_POST['descriptionShortUp'],	
$_POST['videoUp']	
);
echo $obj->updateTypeEvent($data);
?>