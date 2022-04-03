<?php 
require 'crud.php';
$obj = new crud();
if ($_FILES['cover']['size']>0) {
	$folder = '../public/img/';
	$nameOrin = $_FILES['cover']['tmp_name'];
	$replace  = array('\'', ':');
	$replacesql  = array('\'');
	$info = new SplFileInfo($_FILES['cover']['name']);
	$ext = $info->getExtension();
	$namesql = str_replace($replacesql,"\'", $_POST['titleService'].".".$ext);
	$namefinal = str_replace($replace,"", $_POST['titleService']);
	$destination = $folder.$namefinal.".".$ext;
	move_uploaded_file($nameOrin, $destination);
	$evento = "";
	$eventos = "";
	if (isset($_POST['eventos'])) {
		foreach ($_POST['eventos'] as $key => $value) {
			$evento .= $value . ",";
		}
			$eventos = substr(trim($evento), 0,-1);
	}
	$title = $_POST['titleService'];
	$description = $_POST['descriptionService'];
	$unit = $_POST['unit'];
	$unit1 = "";
	$unit2 = "0";
	$unit3 = "0";
	$unitStandar = $_POST['unitStandar'];
	$unitMeidum = "0";
	$unitGold = "0";
	if ($unit == "1" or $unit == "3") {
		$unit1 = $_POST['unit1'];
	} else if ($unit == "2") {
		$unit1 = $_POST['unit1'];
		$unit2 = $_POST['unit2'];
		$unit3 = $_POST['unit3'];
		$unitMeidum = $_POST['unitStandar'];
		$unitGold = $_POST['unitStandar'];
	}
	$data = array(
		$title,
		$description,
		$eventos,
		$namesql,
		$unit1,
		$unit2,
		$unit3,
		$unitStandar,
		$unitMeidum,
		$unitGold
	);
	echo $obj->newService($data);
} else {
	echo 0;
}
?>