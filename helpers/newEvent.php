<?php  
require 'crud.php';
$obj = new crud();
if (isset($_POST) && isset($_FILES)) {
	if ($_FILES['cover']['size']>0) {
		$folder = '../public/img/';
		$nameOrin = $_FILES['cover']['tmp_name'];
		$replace  = array('\'', ':');
		$replacesql  = array('\'');
		$info = new SplFileInfo($_FILES['cover']['name']);
		$ext = $info->getExtension();
		$namesql = str_replace($replacesql,"\'", $_POST['nameEvent'].".".$ext);
		$namefinal = str_replace($replace,"", $_POST['nameEvent']);
		$destination = $folder.$namefinal.".".$ext;
		move_uploaded_file($nameOrin, $destination);
		$data = array(
			$_POST['nameEvent'],
			$namesql,
			$_POST['descriptionEvent'],
			$_POST['videoEvent'],
			$_POST['shortdescriptionEvent']
		);
		$dataEvent = $obj->newEvent($data);
		if ($dataEvent['sql'] == 1) {
			$filesUpdate = $_FILES['galery'];
			$idEvent = $dataEvent['id'];
			$files= array();
			$filesCount = count($filesUpdate['name']);
			$fileKeys = array_keys($filesUpdate);
			for($i=0; $i < $filesCount; $i++){
		  		foreach ($fileKeys as $key) {
		  			$files[$i][$key] = $filesUpdate[$key][$i];
		  		}
		  	}
		  	//Search Name y Count Images
		  	$countImage = $obj->countImage($idEvent);
		  	//we prepare the name
		  	$search = array('\'', ':', ' ', ',', ' - ', '.', '!', '&', '(', ')', '@', '¿', '?', '¡', 'á', 'é', 'í', 'ó', 'ú', '/', 'ä', '\\', '*', '#', '=', '+', '{', '}', '|', '¨', '[', ']');
		  	$replaceUrl = array('', '', '-', '-', '-', '-', '', 'and', '', '', 'a', '', '', '', 'a', 'e', 'i', 'o', 'u', '-', 'a', '', '', '', '', '-', '', '', '', '', '', '');
		  	$nameEvent = str_replace($search, $replaceUrl, $_POST['nameEvent']);
		  	$count = $countImage;
		  	$success = "";
		  	foreach ($files as $fileID=> $file){
		  		$fileContent = file_get_contents($file['tmp_name']);
		  		$ext = new SplFileInfo($file['name']);
		  		$endName = $nameEvent . "-" . $count . "." . $ext->getExtension();
		  		file_put_contents($folder . $endName, $fileContent);
		  		$count=$count+1;
		  		$insetImage = $obj->newGaleryEvent($endName, $idEvent);
		  		if ($insetImage) {
		  			$succes = "1";
		  		}
		  	}
		  	if ($succes = 1) {
		  		echo $succes;
		  	} else {
  				echo 0;
  			}
		} else {
			echo 2;
		}
	} else {
		echo 0;
	}
} else {
	echo 0;
}
?>