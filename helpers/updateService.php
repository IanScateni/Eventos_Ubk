<?php 
require 'crud.php';
$obj = new crud();
if (isset($_POST)) {
	$id = $_POST['idServiceU'];
	$title = $_POST['titleServiceU'];
	$description = $_POST['descriptionServiceU'];
	$description = $_POST['descriptionServiceU'];
	$evento = "";
	$eventos = "";
	$unit = "";
	$unit1 = "";
	$unit2 = "0";
	$unit3 = "0";
	$unitStandar = "";
	$unitMeidum = "0";
	$unitGold = "0";
	if (isset($_POST['eventos'])) {
		foreach ($_POST['eventos'] as $key => $value) {
			$evento .= $value . ",";
		}
			$eventos = substr(trim($evento), 0,-1);
	}
	if (isset($_POST['unitUpdate'])) {
		$unitStandar = $_POST['unitStandar'];
		$unit = $_POST['unitUpdate'];
		if ($unit == "1" or $unit == "3") {
			$unit1 = $_POST['unit1'];
		} else if ($unit == "2") {
			$unit1 = $_POST['unit1'];
			$unit2 = $_POST['unit2'];
			$unit3 = $_POST['unit3'];
			$unitMeidum = $_POST['unitStandar'];
			$unitGold = $_POST['unitStandar'];
		}
	}
	if ($eventos != "" && $unit != "") {
		$data = array(
			$id,
			$title,
			$description,
			$eventos,
			$unit1,
			$unit2,
			$unit3,
			$unitStandar,
			$unitMeidum,
			$unitGold
		);
		echo $obj->updateService($data, "1");
	} else if ($eventos == "" && $unit != "") {
		$data = array(
			$id,
			$title,
			$description,
			$unit1,
			$unit2,
			$unit3,
			$unitStandar,
			$unitMeidum,
			$unitGold
		);
		echo $obj->updateService($data, "2");
	} else if ($eventos != "" && $unit == "") {
		$data = array(
			$id,
			$title,
			$description,
			$eventos
		);
		echo $obj->updateService($data, "3");
	} else if ($eventos == "" && $unit == "") {
		$data = array(
			$id,
			$title,
			$description
		);
		echo $obj->updateService($data, "4");
	}
}
?>