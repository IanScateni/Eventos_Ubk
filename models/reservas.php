<?php 
class Reservas{
 	private $id;
	private $dateReservation;
	private $status;
	private $type;
	private $iduser;
	private $db;

	public function __construct() {
		$this->db = Database::connect();
	}
	public function getAll(){
		$reservation = $this->db->query("SELECT * FROM reservation");
		return $reservation;
	}
	public function getReservation($email){
		$reservation = $this->db->query("SELECT * FROM reservation WHERE email = '$email'");
		return $reservation;
	}
	public function getDetailReservation($data){
		$reservation = $this->db->query("SELECT * FROM reservation WHERE email = '$data[0]' && id = '$data[1]'");
		return $reservation;
	}
	public function getMenu($id){
		$menu = $this->db->query("SELECT name FROM menu WHERE id = '$id'");
		return mysqli_fetch_row($menu);
	}
	public function getAdminDetailReservation($id){
		$reservation = $this->db->query("SELECT * FROM reservation WHERE id = '$id'");
		return $reservation;
	}
}
?>