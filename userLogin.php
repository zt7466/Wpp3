<?php
	/*-------------------------------------------------------\
	|					Raistlin Hess						 |
	\-------------------------------------------------------*/
	require_once 'Gateways/Salt_n_Pepper.php';
	require_once 'navbar.php';
	
	//Format the site using the CSS styling
	echo <<< END
	<html lang="en">
		<head>
		  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
		  <title>Login Verification</title>
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
	
	//Sanitize the user's input
	$username = trim(preg_replace('/\s+/', ' ', $_POST['username']));
	$password = trim(preg_replace('/\s+/', ' ', $_POST['password']));
	
	//Check if the user tried to log out
	if($_POST['logout'] == "true")
	{
		destroySession();
		
		//Print out message saying user logged out, and redirect
		echo <<< END
			  <span class="card-title">Logged out successfully!</span>
			  <p> Please wait...
			  <p> <a href="index.php" class="white-text">Click here if you are not automatically redirected.</a> 
			  <meta http-equiv="refresh" content="3; url=index.php"/>
			</div>
	  </div>
	</div>
</body>
END;
		echo '<meta http-equiv="refresh" content="3; url=index.php"/>';
		return;
	}
	
	//Initialize a connection to the Users table
	$result = checkUser($username, $password);
	
	//Check if gateway actually found a user matching the input
	if($result == FALSE)
	{
		//Check if this is the user's first log in. If so, require them to
		//change their password
		$gateway = new UsersGateway;
		$result = $gateway->findUser($username);
		if($result != null && $result[0][3] == null)
		{
			echo <<< END
			  <span class="card-title">You need to change your password</span>
			  <p> Please click the button below to continue.
			  <form id="changePassForm" action="changePassword.php" method="post">
				<input type="hidden" name="username" id="username" value=
END;
				echo $username."></input>";
				echo <<< END
				<input type="submit" name="submit" id="submit" class="btn waves-effect waves white black-text" value="Continue"></input>
			  </form>
			</div>
	  </div>
	</div>
</body>
END;
		}
		else
		{
			//Show a message that login failed, and provide forms to try again
			echo <<< END
			  <span class="card-title">Login failed</span>
			  <form id="loginForm" action="userLogin.php" method="post">
			  <div class="col s12">
				<div class="card white black-text">
				  <div class="card-content">
					Login
					<input type="text" name="username" id="username" size="24" placeholder="Username" value=""></input>
					<input id="password" name="password" type="password" class="validate" size="24" placeholder="Password" value=""></input>
					<table>
					  <tr>
						<td>
						  <button id="loginButton" type="submit" class="btn waves-effect waves-light blue" value="Submit">Submit</button>
						</td>
						<td>
						  <a href="index.php" class="btn waves-effect waves-light blue" id="hideLogin">Back</a>
						</td>
					  </tr>
					  <tr>
						<td>
						  <a href="forgotPassword.php" id="forgot" style="color:#000000" size="5">Forgot password?</a>
						</td>
						<td>
							<a href="registerAccount.php" id="registerAcc" style="color:#000000">Register</a>
						</td>
					  </tr>
					</table>
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
	}
	
	//Login information matches the database
	else
	{
		//Finish the rest of the html with a login successful mesage
		echo <<< END
			  <span class="card-title">Login Successful!</span>
			  <p> Please wait...
			  <p> <a href="index.php" class="white-text">Click here if you are not automatically redirected.</a> 
			  <meta http-equiv="refresh" content="3; url=changePassword.php"/>
			</div>
	  </div>
	</div>
</body>
END;
		
		//Generate unique hash based on the username,password, and a random value 
		//between 58 and the current time in milliseconds. This is stored in the Token
		//field for the user and their cookie.
		$token = hash('ripemd160', $username+$password+rand(58,round(microtime(true) * 1000)));
		$gateway->loginUpdate(date("Y-m-d h:i:s"), $token, $username);
		
		//Store hash and user info in a cookie that lives for 3 hours
		$_SESSION['username'] = $username;
		$_SESSION['token'] = $token;
		ini_set('session.gc_maxlifetime', 60*180);
		setcookie('token', $token, time()+60*180);
	}

	echo "</html>";
	/*-------------------------------------------------------\
	|				End Raistlin Hess						 |
	\-------------------------------------------------------*/
?>