<?php 
require 'crud.php';
$obj = new crud();
$data = array(
	$_POST['idUsS'],
	$_POST['titleUsS'],
	$_POST['descripUsS'],
	str_replace(".", "", $_POST['valueU'])
);
echo $obj->updateDetailService($data);
?>