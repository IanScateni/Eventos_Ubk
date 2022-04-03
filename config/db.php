<?php 
class Database{
	public static function connect(){
		$db = new mysqli('sql572.main-hosting.eu', 'u564423426_UBK', '0Ctubr314*', 'u564423426_UBK');
		$db->query("SET NAMES 'utf8'");
		return $db;
	}
}
?>