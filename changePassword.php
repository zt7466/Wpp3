<?php
	/*-------------------------------------------------------\
	|					Raistlin Hess						 |
	\-------------------------------------------------------*/
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
					  <form id="changePassForm" action="changePassword.php" method="post">
						<label for="new_password" class="card-title white-text">New Password</label>
						<input type="password" class="grey lighten-4 black-text round" name="new_password" id="new_password" size="24" placeholder="New Password" value="" required></input>
						<label for="confirm" class="card-title white-text">Confirm</label>
						<input type="password" class="grey lighten-4 black-text round" name="confirm" id="confirm" size="24" placeholder="Confirm" value="" required></input>
						<a href="javascript:checkPasswordsMatch();" class="btn orange waves-effect waves" id="changePassSubmit">Submit</a>
						<input type="hidden" name="password" id="password" value="1"></input>
END;
						echo '<input type="hidden" name="username" id="username" value='.$_SESSION['username'].'></input>';
						echo <<< END
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
		//Copy $_POST['new_password'] into confirm and password if not null
		if(strlen($_POST['new_password']) > 0)
		{
			$_POST['password'] = $_POST['new_password'];
		}
		
		//Check if user manually changed their password
		if(strlen($_POST['confirm']) > 0 || strlen($_POST['new_password']) > 0)
		{
				//Passwords match, so update the database
				$result = passwordHasher($_POST['username'],$_POST['password'],'update');
				
				//Display confirmation and redirect
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
		<br><br><br><br><br><br><br>
		<div class="col s12 l4">
			<div class="card blue white-text">
				<div class="card-content">
				  <span class="card-title">Password changed successfully!</span>
				  <p> Please wait...
				  <p> <a href="settings.php" class="white-text">Click here if you are not automatically redirected.</a> 
				  
				</div>
		  </div>
		</div>
	</body>
END;
				return;
		}
		
		$gateway = new UsersGateway;
		$result = passwordHasher($_POST['username'],$_POST['password'],'update');
		$result = $gateway->updateLastLogin($_POST['username']);
		$token = hash('ripemd160', $username+$password+rand(58,round(microtime(true) * 1000)));
		$gateway->loginUpdate(date("Y-m-d h:i:s"), $token, $username);
		$_SESSION['username'] = $username;
		$_SESSION['token'] = $token;
		ini_set('session.gc_maxlifetime', 60*180);
		setcookie('username', $username, time()+60*180);
		setcookie('token', $token, time()+60*180);
		
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