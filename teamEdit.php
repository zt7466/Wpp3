<?php
	require_once 'Gateways/TeamsGateway.php';
	
	//Get all teams from database and parse
	$gateway = new TeamsGateway;
	//$result = $gateway->getAllTeams();
	
	//Get ID. For some reason, getAllTeams() doesn't return this
	$conn = ConnectionHandler::getConnection();
	$statement = ConnectionHandler::getConnection()->prepare("SELECT * FROM webprog27.Teams WHERE Name=:name");
	$statement->bindParam(':name', $_POST['team_select']);
	$result = $statement->execute();
	$result = $statement->fetchAll();
	
	$id = $result[0]['ID'];
	$name = preg_replace('/\s+/', '_', $_POST['new_name']);
	$logo = $_POST['new_logo'];
	$color = $_POST['new_color'];
	
	//Update database
	$fin = $gateway->updateTeam($id, $name, $logo, $color);
?>

<html lang="en">
	<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
	  <link rel='site icon' href='favicon.ico' type='image/x-icon'/>
	  <title>Team Edited</title>
	  <!-- CSS  -->
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <link href="assets/lib/materialize/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	  <!--<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>-->
	</head>
	<body>
		<br><br><br><br><br><br><br>
		<div class="col s12 l4">
			<div class="card blue white-text">
				<div class="card-content">
				  <span class="card-title">The team has been updated!</span>
				  <p> Please wait...
				  <p> <a href="settings.php" class="white-text">Click here if you are not automatically redirected.</a> 
				  <meta http-equiv="refresh" content="3; url=settings.php"/>
				</div>
			</div>
		</div>
	</body>
</html>