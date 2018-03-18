<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', TRUE); // Error logging
ini_set('error_log', 'error.txt'); // Logging file
ini_set('log_errors_max_len', 1024); // Logging file size

include('connection.php');
session_start();
	$error = "homo";
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$username = mysqli_real_escape_string($testDB, $_POST['username']);
		$pwd = mysqli_real_escape_string($testDB, $_POST['pwd']);
		
		$sql = "SELECT firstName FROM user WHERE username = '$username' and pwd = '$pwd'";
		$result = mysqli_query($testDB, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		//$active = $row['active'];
		
		$count = mysqli_num_rows($result);
		
			if($count == 1) {
				$_SESSION['login_user'] = $username;
				header('location: tasks.php');
			} else {
				$error = "Käyttäjänimi tai salasana on väärä";
			}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
	<label>VITTU <?php echo $error;  ?></label>
</body>
</html>