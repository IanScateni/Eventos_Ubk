<?php 
require 'crud.php';
$obj = new crud();
if ($_FILES['coverTypeEvent']['size']>0) {
	$folder = '../public/img/';
	$nameOrin = $_FILES['coverTypeEvent']['tmp_name'];
	$replace  = array('\'', ':');
	$replacesql  = array('\'');
	$info = new SplFileInfo($_FILES['coverTypeEvent']['name']);
	$ext = $info->getExtension();
	$namesql = str_replace($replacesql,"\'", $_POST['titleTypeEvent'].".".$ext);
	$namefinal = str_replace($replace,"", $_POST['titleTypeEvent']);
	$destination = $folder.$namefinal.".".$ext;
	move_uploaded_file($nameOrin, $destination);
	$data = array(
		$namesql,
		$_POST['titleTypeEvent'],
		$_POST['descriptionShortTypeEvent'],
		$_POST['descriptionTypeEvent'],
		$_POST['videoTypeEvent'],
		$_POST['categoryTypeEvent']
	);
	echo $obj->newTypeEvent($data);
} else {
	echo 0;
}
?>