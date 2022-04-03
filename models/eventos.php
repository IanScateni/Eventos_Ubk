<?php 
class Eventos{
	private $id;
	private $name;
	private $description;
	private $cover;
	private $urlfriendly;
	private $db;
	public function __construct() {
		$this->db = Database::connect();
	}
	function getId() {
		return $this->id;
	}
	function getName() {
		return $this->name;
	}
	function getDescription() {
		return $this->description;
	}
	function getCover() {
		return $this->cover;
	}
	function getUrlfriendly() {
		return $this->urlfriendly;
	}
	function setId($id) {
		$this->id = $id;
	}
	function setName($name) {
		$this->name = $name;
	}
	function setDescription($description) {
		$this->description = $description;
	}
	function setCover($cover) {
		$this->cover = $cover;
	}
	function setUrlfriendly($urlfriendly) {
		$this->urlfriendly = $urlfriendly;
	}
	public function getAll(){
		$eventos = $this->db->query("SELECT * FROM event");
		return $eventos;
	}
	public function getIndexEvent(){
		$eventos = $this->db->query("SELECT * FROM event ORDER BY RAND() LIMIT 3");
		return $eventos;
	}
	public function getEvent($id){
		$eventos = $this->db->query("SELECT id, name, cover, description, video FROM event WHERE id = '$id'");
		return $eventos->fetch_object();
	}
	public function getGaleryEvent($id){
		$eventos = $this->db->query("SELECT src FROM galeryevents WHERE idEvent = '$id'");
		return $eventos;
	}
	public function getSite($people, $id){
		if ($people <= "100") {
			$site = $this->db->query("SELECT * FROM sites WHERE capacity <= 100 AND idEvent LIKE '%$id%'");
		}
		if ($people > "100" &&  $people <= "160") {
			$site = $this->db->query("SELECT * FROM sites WHERE (capacity > 100 && capacity <= 160) AND idEvent LIKE '%$id%' ");
		}
		if ($people > "160" &&  $people <= "340") {
			$site = $this->db->query("SELECT * FROM sites WHERE (capacity > 160 && capacity <= 340) AND idEvent LIKE '%$id%' ");
		}
		if ($people > "340" &&  $people <= "500") {
			$site = $this->db->query("SELECT * FROM sites WHERE (capacity > 340 && capacity <= 500) AND idEvent LIKE '%$id%'");
		}
		return $site;
	}
}
?>