<?php  
class Servicios{
	private $id;
	private $type;
	private $description;
	private $cover;
	private $urlfriendly;
	private $standar;
	private $medium;
	private $gold;
	private $unitstandar;
	private $unitmedium;
	private $unitgold;
	private $name;
	private $price;
	private $category;
	private $db;

	public function __construct() {
		$this->db = Database::connect();
	}
	function getId() {
		return $this->id;
	}
	function gettype() {
		return $this->type;
	}
	function getdescription() {
		return $this->description;
	}
	function getcover() {
		return $this->cover;
	}
	function geturlfriendly() {
		return $this->urlfriendly;
	}
	function getstandar() {
		return $this->standar;
	}
	function getmedium() {
		return $this->medium;
	}
	function getgold() {
		return $this->gold;
	}
	function setId($id) {
		$this->id = $id;
	}
	function settype($type) {
		$this->type = $type;
	}
	function setdescription($description) {
		$this->description = $description;
	}
	function setcover($cover) {
		$this->cover = $cover;
	}
	function seturlfriendly($urlfriendly) {
		$this->urlfriendly = $urlfriendly;
	}
	function setstandar($standar) {
		$this->standar = $standar;
	}
	function setmedium($medium) {
		$this->medium = $medium;
	}
	function setgold($gold) {
		$this->gold = $gold;
	}
	public function getServicesEvent($id){
		$servicios = $this->db->query("SELECT title, description, cover, standar, medium, gold FROM service WHERE idEvent LIKE '%$id%'");
		return $servicios;
	}
	public function getMenuCategory(){
		$menuCategory = $this->db->query("SELECT * FROM menucategory");
		return $menuCategory;
	}
	public function getMenu($category){
		$menuCategory = $this->db->query("SELECT * FROM menu WHERE Category = '$category'");
		return $menuCategory;
	}
	public function getDetailService($service){
		$detailService = $this->db->query("SELECT * FROM service WHERE title = '$service'");
		$row = mysqli_fetch_row($detailService);
		$dservice = array(
			'idEvent'=> $row[0],
			'title'=> $row[1],
			'description'=> $row[2],
			'idEvent'=> $row[3],
			'cover'=> $row[4],
			'standar'=> $row[5],
			'medium'=> $row[6],
			'gold'=> $row[7],
			'unitStandar'=> $row[8],
			'unitMedium'=> $row[9],
			'unitGold'=> $row[10],
		);
		return $dservice;
	}
	public function getDetailSite($service){
		$detailService = $this->db->query("SELECT * FROM sites  WHERE title = '$service'");
		$row = mysqli_fetch_row($detailService);
		$dservice = array(
			'idEvent'=> $row[0],
			'title'=> $row[1],
			'description'=> $row[2],
			'cover'=> $row[3],
			'idEvent'=> $row[6],
			'standar'=> $row[5],
			'medium'=> $row[5],
			'gold'=> $row[5],
			'unitStandar'=> "Site",
			'unitMedium'=> $row[5],
			'unitGold'=> $row[5],
		);
		return $dservice;
	}
	public function getAll(){
		$service = $this->db->query("SELECT * FROM service");
		return $service;
	}
}
?>