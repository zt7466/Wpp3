<?php
	/*-------------------------------------------------------\
	|					Raistlin Hess						 |
	\-------------------------------------------------------*/
	require_once 'navbar.php';
	echo "<head><link rel='site icon' href='favicon.ico' type='image/x-icon'/></head>";
	
	//Check if inputted user already exists in the database
	$gateway = new UsersGateway;
	$result = $gateway->findUser($_POST['teamname']);
	
	//Set up beginning of div tags
	echo <<< END
	<html lang="en">
		<head>
		  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
		  <title>Team Deletion</title>
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
END;
	
	//User doesn't exist
	if($result == null)
	{		
		//Display webpage with confirmation
		echo <<< END
			  <span class="card-title">Team does not exist</span>
			  <p> Please wait...
			  <p> <a href="settings.php" class="white-text">Click here if you are not automatically redirected.</a> 
			  <meta http-equiv="refresh" content="3; url=settings.php"/>
			</div>
	  </div>
	</div>
</body>
END;
	}
	
	//Team exists
	else
	{
		//Delete team from the database
		$conn = ConnectionHandler::getConnection();
		//$result = $conn->query("DELETE from webprog27.Users where;");
        $statement = ConnectionHandler::getConnection()->prepare("DELETE FROM webprog27.Teams WHERE Name=:name");
        $statement->bindParam(':name', $_POST['name']);
        $successful = $statement->execute();
		print_r($successful);
		
		//Display webpage stating team exists already
		echo '<span class="card-title">'.$_POST['name'].' has been deleted successfully!';
		echo <<< END
			  </span>
			  <p> Please wait...
			  <p> <a href="settings.php" class="white-text">Click here if you are not automatically redirected.</a> 
			  <meta http-equiv="refresh" content="3; url=settings.php"/>
			</div>
	  </div>
	</div>
</body>
END;
	}
	
	echo "</html>";
?>