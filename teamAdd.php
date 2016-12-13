<?php
//	echo "Team name: ".$_POST['teamname']."<br>";
	//echo "Color: ".$_POST['color']."<br>";
?>

<?php
	/*-------------------------------------------------------\
	|					Raistlin Hess						 |
	\-------------------------------------------------------*/
	require_once 'navbar.php';
	require_once 'Gateways/TeamsGateway.php';
	echo "<head><link rel='site icon' href='favicon.ico' type='image/x-icon'/></head>";
	
	//Html formatting
	echo <<< END
	<html lang="en">
		<head>
		  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
		  <title>Account Creation</title>
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

	//Replace spaces with underscore
	$teamname = preg_replace('/\s+/', '_', $_POST['teamname']);
	
	//Check if team exists
	$gateway = new TeamsGateway;
	$result = $gateway->insert($teamname, $imagePath.$teamname.$imageExt, $_POST['color']);
	
	//Team exists
	if($result != FALSE)
	{
		  echo '<span class="card-title">Team '.$teamname.' successfully added!</span>';
		  echo <<< END
		  <p> Please wait...
		  <p> <a href="settings.php" class="white-text">Click here if you are not automatically redirected.</a> 
		  <meta http-equiv="refresh" content="3; url=settings.php"/>
END;
	}
	//Team does not exist
	else
	{
		echo <<< END
		  <span class="card-title">This team already exists...</span>
		  <p> Please wait...
		  <p> <a href="settings.php" class="white-text">Click here if you are not automatically redirected.</a> 
		  <meta http-equiv="refresh" content="3; url=settings.php"/>
END;
	}
	
	//Close html tags
	echo <<< END
					</div>
				</div>
			</div>
		</body>
	</html>
END;
?>