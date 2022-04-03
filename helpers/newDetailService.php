<?php 
require 'crud.php';
$obj = new crud();
$data = array(
	$_POST['titleDetailService'],
	$_POST['descriptionDetailService'],
	$_POST['valueDetailService'],
	$_POST['serviceDetail']
);
echo $obj->newDetailService($data);
?>