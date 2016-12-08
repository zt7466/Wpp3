<?php
	/*-------------------------------------------------------\
	|					Raistlin Hess						 |
	\-------------------------------------------------------*/
	require_once 'Gateways/Salt_n_Pepper.php';
	require_once 'navbar.php';
	session_start();
	echo "<head><link rel='site icon' href='favicon.ico' type='image/x-icon'/></head>";
	
	//When there is no post data for 'password', show form requesting one
	if(strlen($_POST['password']) <= 0)
	{
		//Format the site using the CSS styling
		echo <<< END
		<html lang="en">
			<head>
			  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
			  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
			  <title>Change Password</title>
			  <!-- CSS  -->
			  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
			  <link href="assets/lib/materialize/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
			  <!--<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>-->
			</head>
			<body>
				<br><br><br><br><br><br>
				<div class="col s12 l4">
					<div class="card blue white-text">
						<div class="card-content">
						  <span class="card-title">Type your new password below</span>
						  <form id="loginForm" action="changePassword.php" method="post">
						  <div class="col s12">
							<div class="card white black-text">
							  <div class="card-content">
								<input id="password" name="password" type="password" class="validate" size="24" placeholder="New Password" value=""></input>
								<table>
								  <tr>
									<td>
									  <button id="loginButton" type="submit" class="btn waves-effect waves-light blue" value="Submit">Submit</button>
									</td>
								  </tr>
								</table>
								<input type="hidden" name="username" id="username" value=
END;
				echo $_POST['username']."></input>";
								echo <<< END
							  </div>
							</div>
						  </div>
						  </form>
				</div>
		  </div>
		</div>
	</body>
END;
	}
	
	//When there is post data for 'password', insert it into the database.
	//Then return to home page
	else
	{
		$gateway = new UsersGateway;
		$result = passwordHasher($_POST['username'],$_POST['password'],'update');
		$result = $gateway->updateLastLogin($_POST['username']);
		$token = hash('ripemd160', $username+$password+rand(58,round(microtime(true) * 1000)));
		$gateway->loginUpdate(date("Y-m-d h:i:s"), $token, $username);
		
		//Format the site using the CSS styling
		echo <<< END
		<html lang="en">
			<head>
			  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
			  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
			  <title>Change Password</title>
			  <!-- CSS  -->
			  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
			  <link href="assets/lib/materialize/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
			  <!--<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>-->
			</head>
			<body>
				<br><br><br><br><br><br>
				<div class="col s12 l4">
					<div class="card blue white-text">
						<div class="card-content">
						  <span class="card-title">Password changed successfully!</span>
						  <form id="loginForm" action="userLogin.php" method="post">
						  <div class="col s12">
							<div class="card white black-text">
							  <div class="card-content">
								<table>
								  <tr>
									<td>
									  <button id="loginButton" type="submit" class="btn waves-effect waves-light blue" value="Submit">Continue</button>
									</td>
								  </tr>
								</table>
								<input type="hidden" name="username" id="username" value=
END;
				echo $_POST['username']."></input>";
				echo '<input type="hidden" name="password" id="password" value='.$_POST['password'].'></input>';
								echo <<< END
							  </div>
							</div>
						  </div>
						  </form>
				</div>
		  </div>
		</div>
	</body>
END;
	}

?>