<?php 
if (isset($_POST)) {
	require 'crud.php';
	$obj = new crud();
	$password = hash('sha512', $_POST['password']);
	$data = array(
		$password,
		$_POST['id']
	);
	echo $obj->passwordChange($data);
}
?>