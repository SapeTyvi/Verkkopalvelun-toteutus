<?php
/*
class testDB{
	private static $instance = NULL;
	
	private function __construct() {}
	private function __clone() {}
	
	public static function getInstance() {
		if (!isset(self::$instance)) {
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			self::$instance = new PDO('mysql:host=localhost:3302;dbname=logintestdb', 'root', '', $pdo_options);
		}
		return self::$instance;
	}
}
*/
	define('DB_SERVER', 'mysql.cc.puv.fi');
	define('DB_USERNAME', 'e1501151');
	define('DB_PASSWORD', 'trDDWQUFCuHp');
	define('DB_DATABASE', 'e1501151_login');
	$testDB = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
/*
$testDB = new PDO('mysql:host=mysql.cc.puv.fi;dbname=e1501151_login',
              'e1501151',
              'trDDWQUFCuHp');

$testDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
*/

   
?>