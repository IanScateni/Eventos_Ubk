<?php 
class Usuario{
	private $id;
	private $document;
	private $documenttype;
	private $firstname;
	private $lastname;
	private $address;
	private $email;
	private $phone;
	private $password;
	private $idrol;
	private $db;

	public function __construct() {
		$this->db = Database::connect();
	}
	function getId() {
		return $this->id;
	}
	function getdocument() {
		return $this->document;
	}
	function getdocumenttype() {
		return $this->documenttype;
	}
	function getfirstname() {
		return $this->firstname;
	}
	function getlastname() {
		return $this->lastname;
	}
	function getaddress() {
		return $this->address;
	}
	function getemail() {
		return $this->email;
	}
	function getphone() {
		return $this->phone;
	}
	function getPassword() {
		$password = $this->db->real_escape_string($this->password);
		$password = hash('sha512', $password);
		return $password;
	}
	function getidrol() {
		return $this->idrol;
	}
	function setId($id) {
		$this->id = $id;
	}
	function setdocument($document) {
		$this->document = $this->db->real_escape_string($document);
	}
	function setdocumenttype($documenttype) {
		$this->documenttype = $this->db->real_escape_string($documenttype);
	}
	function setfirstname($firstname) {
		$this->firstname = $this->db->real_escape_string($firstname);
	}
	function setlastname($lastname) {
		$this->lastname = $this->db->real_escape_string($lastname);
	}
	function setaddress($address) {
		$this->address = $this->db->real_escape_string($address);
	}
	function setemail($email) {
		$this->email = $this->db->real_escape_string($email);
	}
	function setphone($phone) {
		$this->phone = $this->db->real_escape_string($phone);
	}
	function setPassword($password) {
		$this->password = $password;
	}
	function setidrol($idrol) {
		$this->idrol = $this->db->real_escape_string($idrol);
	}
	public function logging(){
		$result = false;
		$email = $this->email;
		$password = $this->password;
		// comprobar si existe el usuario
		$sql = "SELECT * FROM user WHERE email = '$email'";
		$logging = $this->db->query($sql);
		if ($logging && $logging->num_rows == 1) {
			$usuario = $logging->fetch_object();
			$password = hash('sha512', $password);
			$sqlV = "SELECT password FROM user WHERE password = '$password' && email = '$email'";
			$verify = $this->db->query($sqlV);
			if ($verify && $verify->num_rows == 1) {
				$result = $usuario;
			}
		}
		return $result;
	} 
	public function register($document, $email){
		$q = "SELECT email FROM user WHERE email = '$email' OR document = '$document'";
		$usr = $this->db->query($q);
		if ($usr->num_rows > 0) {
			$result = false;
			return $result;
		}
		$date = date('Y-m-d H:m:s');
		$sql = "INSERT INTO user VALUES(NULL, '{$this->getdocument()}', '{$this->getdocumenttype()}', '{$this->getfirstname()}', '{$this->getlastname()}', '{$this->getaddress()}', '{$this->getemail()}', '{$this->getphone()}', '{$this->getPassword()}', '2', '$date')";
		$save = $this->db->query($sql);
		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}
	public function getDataUser($id){
		$query = $this->db->query("SELECT * FROM user WHERE id = '$id'");
		 return $query->fetch_object();
	}
	public function getAll(){
		$user = $this->db->query("SELECT * FROM user");
		return $user;
	}
}
?>