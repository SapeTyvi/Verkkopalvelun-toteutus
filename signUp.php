<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
	<title>Rekisteröidy</title>
</head>
<body>
	<div class="registerContent">
		<form action="register.php" method="post" class="registerForm">
			<label>Yrityksen nimi : </label><input type="text" name="companyName" class="box"><br/>
			<label>Etunimi : </label><input type="text" name="firstName" class="box" required><br/>
			<label>Sukunimi : </label><input type="text" name="lastName" class="box" required><br/>
			<label>Käyttäjänimi : </label><input type="text" name="username" class="box" required><br/>
			<label>Salasana : </label><input type="text" name="pwd" class="box" required> <br/>
			<input type="submit" value="Rekisteröidy"/> <br/>
			
			<a href="index.html">Takaisin</a>
	</div>
		
</body>
</html>