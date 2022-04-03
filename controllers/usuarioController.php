<?php 
require_once 'models/usuario.php';
require_once 'models/reservas.php';
require_once 'models/servicios.php';
class usuarioController{
	public function login(){
		require_once 'views/usuario/login.php';
	}
	public function panel(){
		require_once 'views/usuario/panel.php';
	}
	public function contacto(){
		require_once 'views/usuario/contacto.php';
	}
	public function registro(){
		require_once 'views/usuario/registro.php';
	}
	public function perfil(){
		$usuario = new Usuario();
		$dataUser = $usuario->getDataUser($_SESSION['identity']->id);
		require_once 'views/usuario/perfil.php';
	}
	public function detalleReserva(){

		if (isset($_GET['id'])) {
			$data = array(
				$_SESSION['identity']->email,
				$_GET['id']
			);
			$service = new Servicios();
			$oReservation = new Reservas();
			$reservation = $oReservation->getDetailReservation($data);
		}
		require_once 'views/usuario/detalleReserva.php';
	}
	public function logging(){
		if (isset($_POST)) {
			// Identificar al usuario
			// Consultar a la base de datos
			$usuario = new Usuario();
			$usuario->setemail($_POST['user']);
			$usuario->setPassword($_POST['password']);
			$identity = $usuario->logging();

			// crear una sesion
			if ($identity && is_object($identity)) {
				$_SESSION['identity'] = $identity;
				if($identity->idrol == '1'){
					$_SESSION['administrator'] = true;
				} else {
					if($identity->idrol == '2'){
						$_SESSION['customer'] = true;
					} else {
						if($identity->idrol == '3'){
							$_SESSION['supplier'] = true;
						}
					}
				}	
			} else {
				$_SESSION['error_login'] = 'Autenticación fallida!!';
				header("Location:".PATH.'usuario/login');
			}
		}
		// Aqui el redireccionamiento si es administrador, proveedor o cliente
		if (isset($_SESSION['administrator'])) {
			if ($identity->idrol == '1') {
				header("Location:".PATH.'administrator/panel');
			}
		}
		if (isset($_SESSION['customer'])) {
			if ($identity->idrol == '2') {
				header("Location:".PATH.'usuario/panel');
			}
		}
		if (isset($_SESSION['supplier'])) {
			if ($identity->idrol == '3') {
				header("Location:".PATH.'supplier/panel');
			}
		}
	}
	public function logout(){
		if(isset($_SESSION['identity'])){
			unset($_SESSION['identity']);
		}
		if(isset($_SESSION['administrator'])){
			unset($_SESSION['administrator']);
		}
		if(isset($_SESSION['supplier'])){
			unset($_SESSION['supplier']);
		}
		if(isset($_SESSION['customer'])){
			unset($_SESSION['customer']);
		}
		header("Location:".PATH.'usuario/login');
	}
	public function register(){
		if (isset($_POST)) {
			$name = isset($_POST['name']) ? $_POST['name'] : false;
			$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : false;
			$address = isset($_POST['address']) ? $_POST['address'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$phone = isset($_POST['phone']) ? $_POST['phone'] : false;
			$typeDocument = isset($_POST['typeDocument']) ? $_POST['typeDocument'] : false;
			$document = isset($_POST['document']) ? $_POST['document'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				if ($name && $lastname && $address && $email && $phone && $typeDocument && $document && $password) {
					$usuario = new Usuario();
					$usuario->setfirstname($name);
					$usuario->setlastname($lastname);
					$usuario->setaddress($address);
					$usuario->setemail($email);
					$usuario->setphone($phone);
					$usuario->setdocumenttype($typeDocument);
					$usuario->setdocument($document);
					$usuario->setPassword($password);
					$registerUser = $usuario->register($document, $email);
					if ($registerUser) {
						$_SESSION['register'] = "complete";
					} else {
						$_SESSION['register'] = "failed";
					}
				} else {
					$_SESSION['register'] = "failed";
				}
			} else {
				$_SESSION['register'] = "failed";
				header("Location:".PATH.'usuario/registro');
			}
		} else {
			$_SESSION['register'] = "failed";
			header("Location:".PATH.'usuario/registro');
		}
		header("Location:".PATH.'usuario/registro');
	}
}
?>