<?php 
date_default_timezone_set('America/Bogota');
require_once '../config/db.php';
require_once '../config/parameters.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
	class crud{
		public function __construct() {
			$this->db = Database::connect();
		}
		public function getEventData($id_event){
			$query = $this->db->query("SELECT * FROM event WHERE id = '$id_event'");
			$row = mysqli_fetch_row($query);
			$event =  array(
				'id'=> $row[0],
				'name'=> $row[1],
				'cover'=> $row[2],
				'description'=> $row[3],
				'video'=> $row[4],
				'shortdescription'=> $row[5]
			);
			return $event;
		}
		public function updateEvent($data){
			$query = $this->db->query("UPDATE event SET name ='$data[1]',
					                                    description='$data[2]',
					                                    shortdescription='$data[3]',
					                                    video='$data[4]'
					                                    WHERE id = '$data[0]'");
			return $query;
		}
		public function deleteEvent($id_event){
			$query = $this->db->query("DELETE FROM event WHERE id= '$id_event'");
			return 1;
		}
		public function newEvent($data){
			$sql = $this->db->query("SELECT name FROM event WHERE name = '$data[0]'");
			if ($sql->num_rows>0) {
				$idEvent = array(
					'sql'=> 2
				);
				return $idEvent;
			} else {
				$query = "INSERT INTO event (name, cover, description, video, shortdescription) VALUES ('$data[0]','$data[1]','$data[2]', '$data[3]', '$data[4]')";
				$save = $this->db->query($query);
				if ($save == 1) {
					$querySelect = $this->db->query("SELECT id FROM event WHERE name = '$data[0]'");
					if ($querySelect->num_rows > 0) {
						$row = mysqli_fetch_row($querySelect);
						$idEvent = array(
							'id'=> $row[0],
							'sql'=> 1
						);
						return $idEvent;
					} else {
						$idEvent = array(
							'sql'=> 0
						);
						return $idEvent;
					}
				} else {
					$idEvent = array(
						'sql'=> 0
					);
					return $idEvent;
				}
			} 
		}
		public function getTypeEventData($id_event){
			$query = $this->db->query("SELECT T.id, T.title, T.description, T.shortdescription, T.video,T.cover, E.name AS evento FROM typeevent T INNER JOIN event E ON E.id  = T.idevent WHERE T.id = $id_event");
			$row = mysqli_fetch_row($query);
			$event =  array(
				'id'=> $row[0],
				'title'=> $row[1],
				'description'=> $row[2],
				'shortdescription'=> $row[3],
				'video'=> $row[4],
				'cover'=> $row[5],
				'evento'=> $row[6]
			);
			return $event;
		}
		public function updateTypeEvent($data){
			$query = $this->db->query("UPDATE typeevent SET title ='$data[1]',
					                                    description='$data[2]',
					                                    shortdescription='$data[3]',
					                                    video='$data[4]'
					                                    WHERE id = '$data[0]'");
			return 1;
		}
		public function newTypeEvent($data){
			$sql = $this->db->query("SELECT title FROM typeevent WHERE title = '$data[1]' && idevent = '$data[5]'");
			if ($sql->num_rows>0) {
				return 2;
			} else {
				$query = "INSERT INTO typeevent (title, description, shortdescription, video, cover, idevent) VALUES ('$data[1]','$data[3]','$data[2]','$data[4]','$data[0]','$data[5]')";
				$save = $this->db->query($query);
				return $save;
			}
		}
		public function deleteTypeEvent($id_event){
			$query = $this->db->query("DELETE FROM typeevent WHERE id= '$id_event'");
			return 1;
		}
		public function getServiceData($id_service){
			$query = $this->db->query("SELECT * FROM service WHERE id = '$id_service'");
			$row = mysqli_fetch_row($query);
			$service =  array(
				'id'=> $row[0],
				'title'=> $row[1],
				'description'=> $row[2],
				'idEvent'=> $row[3],
				'cover'=> $row[4],
				'standar'=> $row[5],
				'medium'=> $row[6],
				'gold'=> $row[7],
				'unitStandar'=> $row[8],
				'unitMedium'=> $row[9],
				'unitGold'=> $row[10]
			);
			return $service;
		}
		public function updateService($data, $type){
			if ($type == "1") {
			$query = $this->db->query("UPDATE service SET title ='$data[1]',
					                                    description='$data[2]',
					                                    idEvent='$data[3]',
					                                    standar='$data[4]',
					                                    medium='$data[5]',
					                                    gold='$data[6]',
					                                    unitStandar='$data[7]',
					                                    unitMedium='$data[8]',
					                                    unitGold='$data[9]'
					                                    WHERE id = '$data[0]'");
			} else if ($type == "2") {
				$query = $this->db->query("UPDATE service SET title ='$data[1]',
					                                    description='$data[2]',
					                                    standar='$data[3]',
					                                    medium='$data[4]',
					                                    gold='$data[5]',
					                                    unitStandar='$data[6]',
					                                    unitMedium='$data[7]',
					                                    unitGold='$data[8]'
					                                    WHERE id = '$data[0]'");
			} else if ($type == "3") {
				$query = $this->db->query("UPDATE service SET title ='$data[1]',
					                                    description='$data[2]',
					                                    idEvent='$data[3]'
					                                    WHERE id = '$data[0]'");
			} else if ($type == "4") {
				$query = $this->db->query("UPDATE service SET title ='$data[1]',
					                                    description='$data[2]'
					                                    WHERE id = '$data[0]'");
			}
			return 1;
		}
		public function deleteService($id_service){
			$query = $this->db->query("DELETE FROM service WHERE id= '$id_service'");
			return 1;
		}
		public function newService($data){
			$sql = $this->db->query("SELECT title FROM service WHERE title = '$data[0]'");
			if ($sql->num_rows>0) {
				return 2;
			} else {
				$query = "INSERT INTO service (title, description, idEvent, cover, standar, medium, gold, unitStandar, unitMedium, unitGold) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]')";
				$save = $this->db->query($query);
				return $save;
			}
		}
		public function getDetailServiceData($id_service){
			$query = $this->db->query("SELECT * FROM detailservice WHERE id = '$id_service'");
			$row = mysqli_fetch_row($query);
			$service =  array(
				'id'=> $row[0],
				'title'=> $row[1],
				'description'=> $row[2],
				'value'=> $row[3],
				'idservice'=> $row[4]
			);
			return $service;
		}
		public function updateDetailService($data){
			$query = $this->db->query("UPDATE detailservice SET title ='$data[1]',
					                                    description='$data[2]',
					                                    value='$data[3]'
					                                    WHERE id = '$data[0]'");
			return 1;
		}
		public function deleteDetailService($id_service){
			$query = $this->db->query("DELETE FROM detailservice WHERE id= '$id_service'");
			return 1;
		}
		public function newDetailService($data){
			$sql = $this->db->query("SELECT title FROM detailservice WHERE title = '$data[0]' && idservice = '$data[3]'");
			if ($sql->num_rows>0) {
				return 2;
			} else {
				$query = "INSERT INTO detailservice (title, description, value, quantity, idservice) VALUES ('$data[0]','$data[1]','$data[2]','1','$data[3]')";
				$save = $this->db->query($query);
				return $save;
			}
		}
		public function sendMail($subject, $body, $email){
			require_once '../public/libraries/phpMailer/Exception.php';
			require_once '../public/libraries/phpMailer/PHPMailer.php';
			require_once '../public/libraries/phpMailer/SMTP.php';
			$mail = new PHPMailer(true);
			$mail->CharSet = 'UTF-8';
			try {
			    $mail->SMTPDebug = 0;                      
			    $mail->isSMTP();                                            
			    $mail->Host       = 'smtp.hostinger.com';                     
			    $mail->SMTPAuth   = true;                                   
			    $mail->Username   = 'reservas@eventosubk.online';                     
			    $mail->Password   = '0Ctubr314**';                               
			    $mail->SMTPSecure = 'ssl';            
			    $mail->Port       = 465;                                    
			    $mail->setFrom('reservas@eventosubk.online', 'Ubk Eventos');
			    $mail->addAddress($email);               
			    $mail->isHTML(true);
			    $mail->Subject = $subject;
			    $mail->Body    = $body;
			    $mail->send();
			    return 1;
			} catch (Exception $e) {
			    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}	
		}
		public function newBudget($data){
			$querySelectEvent = $this->db->query("SELECT evento FROM reservation WHERE (email = '$data[2]' && fecha = '$data[4]') && (type = '0' && status='Pending')");
			if ($querySelectEvent->num_rows > 0) {
				return 3;
			} else {
				$query = "INSERT INTO reservation (evento, nombre, email, telefono, fecha, personas, servicios, menu, status, type, hour) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]', '$data[5]', '$data[6]', '$data[7]', 'Pending', '0', '$data[10]')";
				$save = $this->db->query($query);
				if ($save == 1) {
					$querySelect =  $this->db->query("SELECT email FROM user WHERE email =  '$data[2]'");
					if ($querySelect->num_rows == 0) {
						$password = hash('sha512', $data[2]);
						$queryInsert = "INSERT INTO user (firstname, lastname, email, phone, password, idrol) VALUES ('$data[8]', '$data[9]', '$data[2]', '$data[3]', '$password', '2')";
						$saveI = $this->db->query($queryInsert);
						return $saveI;
					} else {
						return 2;
					}
				} else {
					return 0;
				}
			}
		}
		public function passwordChange($data){
			$query = $this->db->query("UPDATE `user` SET `password` ='$data[0]'
						                                    WHERE id = '$data[1]'");
			if ($query == 1) {
				return 1;
			} else {
				return 2;
			}
		}
		public function newBudgetService($data){
			$query = "INSERT INTO reservation (evento, nombre, email, telefono, fecha,  servicios, status, type) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]', '$data[5]', 'Pending', '1')";
			$save = $this->db->query($query);
			if ($save == 1) {
				$querySelect =  $this->db->query("SELECT email FROM user WHERE email =  '$data[2]'");
				if ($querySelect->num_rows == 0) {
					$password = hash('sha512', $data[2]);
					$queryInsert = "INSERT INTO user (firstname, lastname, email, phone, password, idrol) VALUES ('$data[6]', '$data[7]', '$data[2]', '$data[3]', '$password', '2')";
					$saveI = $this->db->query($queryInsert);
					return $saveI;
				} else {
					return 2;
				}
			} else {
				return 0;
			}	
		}
		public function getDetailService($service){
			$detailService = $this->db->query("SELECT * FROM service WHERE title = '$service'");
			$row = mysqli_fetch_row($detailService);
			$dservice = array(
				'id'=> $row[0],
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
		public function newGaleryEvent($name , $id){
			$query = "INSERT INTO galeryevents (idEvent, src) VALUES ('$id','$name')";
			$save = $this->db->query($query);
		}
		public function countImage($id){
			$count = [];
			$queryCount = $this->db->query("SELECT COUNT(idEvent) FROM galeryevents WHERE idEvent = '$id'");		
			$rowCount = mysqli_fetch_row($queryCount);
			$count = $rowCount[0];
			return $count;
		}
		public function statusReservation($data){
			$query = $this->db->query("UPDATE `reservation` SET `status` ='$data[1]'
						                                    WHERE id = '$data[0]'");
			if ($query == 1) {
				return 1;
			} else {
				return 2;
			}
		}
		public function deleteUser($id_User){
			$query = $this->db->query("DELETE FROM user WHERE id= '$id_User'");
			return 1;
		}
	}
?>