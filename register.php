<?php
include('connection.php');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

	$query = "INSERT INTO user (firstName, lastName, companyName, username, pwd)
			VALUES('".$_POST["firstName"]."', '".$_POST["lastName"]."', '".$_POST["companyName"]."', '".$_POST["username"]."', '".$_POST["pwd"]."')";
			
		if($testDB->query($query) === TRUE) {
			echo "Käyttäjä luotu!";
		} else {
			echo $testDB->error;
		}
	

?>
<html>
<body>
	<div>
		<a href="index.html">Etusivulle</a>
	</div>
</body>
</html>
<!--("INSERT INTO user (firstName, lastName, companyName, username, pwd)
			VALUES(:firstName, :lastName, :companyName, :userName, :pwd)")*/
</html>
	if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$companyName = mysqli_real_escape_string($testDB, $_POST['companyName']);
	$firstName = mysqli_real_escape_string($testDB, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($testDB, $_POST['lastName']);
	$username = mysqli_real_escape_string($testDB, $_POST['username']);
	$pwd = mysqli_real_escape_string($testDB, $_POST['pwd']);
	
	$stmt = $testDB->prepare("INSERT INTO user VALUES(?, ?, ?, ?, ?)");
	$stmt->bind_param("testDB", $companyName, $firstName, $lastName, $username, $pwd);
	
	$stmt->execute();
	$stmt-close();
	$form = $_POST;
	
	$companyName = $form["companyName"];
	$firstName = $form["firstName"];
	$lastName = $form["lastName"];
	$username = $form["username"];
	$pwd = $form["pwd"];
	
	
	try{
		$query = $testDB->prepare("INSERT INTO user (firstName, lastName, companyName, username, pwd)
				VALUES(:firstName, :lastName, :companyName, :userName, :pwd)");
		$query->bind_param( ":companyName", $companyName);
		$query->bind_param( ":firstName", $firstName);
		$query->bind_param( ":lastName", $lastName);
		$query->bind_param( ":username", $username);
		$query->bind_param( ":pwd", $pwd);
		
		$query->execute();
	} catch (Exception $e) {
		echo $e->getMessage();
		echo "virhe";
		exit;
	}
	
	$query-close();
-->