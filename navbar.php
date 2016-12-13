<?php
	/*---------------------*
	 * Raistlin Hess       *
	 *---------------------*/
	 
	 /**
	  * Clears the user's session
	  */
	  function destroySession()
	  {
		  //Remove token and token validity for user, if exists
		  if(strlen($_SESSION['username']) > 0)
		  {
			  $gateway = new UsersGateway;
			  $result = $gateway->loginUpdate(NULL,$_SESSION['username']);
		  }
		  
		  $_SESSION = array();
		  setcookie(session_name(), '', time()-2592000);
		  session_unset();
		  session_destroy();
	  }
	  
	  $imagePath = '/webprog27/assets/images/';
	  $imageExt = '.png';
	  
	/*---------------------*
	 * End Raistlin Hess   *
	 *---------------------*/
?>

<!--
	The block below checks the user's session token against the token for the
	user stored in the database. If they do not match, then destory the user's
	session.
-->
<?php
	/*---------------------*
	 * Raistlin Hess       *
	 *---------------------*/
	 
	//Create a session and initialize a UserGateway for account management
	require_once 'Gateways/Salt_n_Pepper.php';
	session_start();
	$gateway = new UsersGateway;
	
	//Store username and token in php variable, if valid.
	//This is used for displaying greeting and account info instead
	//of the login button
	
	/*
	if(strlen($_SESSION['username']) > 0 && strlen($_SESSION['token']) > 0)
	{
		//Make sure session token matches the database, otherwise delete
		//the session and refresh
		if($_SESSION['token'] != $gateway->findUser($_SESSION['username'])[0][4])
		{
			destroySession();
			echo '<meta http-equiv="refresh" content="0">';
		}
	}
	*/
	
	/*---------------------*
	 * End Raistlin Hess   *
	 *---------------------*/
?>

<?php
	/*---------------------*
	 * Raistlin Hess       *
	 *---------------------*/
	function displayNavbar()
	{
		echo <<< END
		<div class="navbar-fixed">
		<nav class="light-blue" style="box-shadow: 0 0 0 0;">
		<div class="nav-wrapper container">
		<a id="logo-container" href="index.php" class="brand-logo">Scoreboard</a>
		<ul class="right hide-on-med-and-down">
		  
		  <!-------------------Raistlin Hess----------------------------------------------------------->
		   <!--
			  This shows or hides a form to allow the user to log in
			  or to create an account.
		   -->
		   <script type="text/javascript">
			function display(clicked)
			{
			  //No session, show login form
			  if(clicked == 1)
			  {
				document.getElementById("showLogin").style.display="none";
				document.getElementById("username").style.display="block";
				document.getElementById("password").style.display="block";
				document.getElementById("loginButton").style.display="block";
				document.getElementById("loginForm").style.display="block";
				document.getElementById("hideLogin").style.display="block";
			  }
			  
			  //No session, hide login form
			  else if(clicked == 0)
			  {
				document.getElementById("showLogin").style.display="block";
				document.getElementById("username").style.display="none";
				document.getElementById("password").style.display="none";
				document.getElementById("loginButton").style.display="none";
				document.getElementById("loginForm").style.display="none";
				document.getElementById("hideLogin").style.display="none";
				document.getElementById("username").value = "";
				document.getElementById("password").value = "";
			  }
			  
			  //Has session, show account form
			  else if(clicked == 2)
			  {
				document.getElementById("showLogin").style.display="none";
				document.getElementById("loginButton").style.display="block";
				document.getElementById("loginForm").style.display="block";
				document.getElementById("hideLogin").style.display="block";
				document.getElementById("username").style.display="none";
				document.getElementById("password").style.display="none";
				//document.getElementById("forgot").style.display="none";
				//document.getElementById("registerAcc").style.display="none";
			  }
			}
		  </script>
END;
		  /*
			  If the user does not have a valid session, show login button and form
		  */
			if($_SESSION['username'] == null || $_SESSION['token'] == null)
			{
			echo <<< END
			  <!--The Login Form-->
			  <a href="javascript:display(1);" id="showLogin">Login</a>
			  <form id="loginForm" action="userLogin.php" method="post">
			  <div class="col s12">
				<div class="card white black-text">
				  <div class="card-content">
					<div class="card-title">
					Login
					</div>
					<input type="text" name="username" id="username" size="24" placeholder="Username" value=""></input>
					<input id="password" name="password" type="password" class="validate" size="24" placeholder="Password" value="" required></input>
					<table class="none">
					  <tr>
						<td>
						  <button id="loginButton" type="submit" class="btn waves-effect waves-light blue" value="Submit">Submit</button>
						</td>
						<td>
						  <a href="javascript:display(0);" class="btn waves-effect waves-light blue" id="hideLogin">Close</a>
						</td>
					  </tr>
					</table>
				  </div>
				</div>
			  </div>
			  </form>
END;
			}
			
			/*
			  If the user does have a valid session, show account button and form
			 */
			else
			{
			  echo <<< END
			  <!--The Account Form-->
			  <a href="javascript:display(2);" id="showLogin">
END;
			  echo $_SESSION['username']."</a>";
			  echo <<< END
			  <form id="loginForm" action="userLogin.php" method="post">
			  <div class="col s12">
				<div class="card white black-text">
				  <div class="card-content">
					<div class="card-title">
END;
					echo "Welcome, ".$_SESSION['username']."!";
					echo <<< END
					</div>
					<input type="text" name="username" id="username" size="24" placeholder="Username" value=""></input>
					<input id="password" name="password" type="password" class="validate" size="24" placeholder="Password" value=""></input>
					<table>
					  <tr>
						<td>
						  <button id="loginButton" type="submit" class="btn waves-effect waves-light blue" value="Submit">Logout</button>
						  <div style="color:FFFFFF">I am dummy text!</div>
						</td>
						<td>
						  <a href="javascript:display(0);" class="btn waves-effect waves-light blue" id="hideLogin">Close</a>
						  <div style="color:FFFFFF">I am dummy text!</div>
						</td>
						<tr>
						 <a href="settings.php" id="registerAcc" class="btn waves-effect waves-light orange">Settings</a>
						</tr>
					  </tr>
					</table>
				  </div>
				</div>
			  </div>
			  <input type="hidden" name="logout" value="true"></input>
			  </form>
END;
			}
			echo <<< END
		  <!--Hide forms when page loads-->
		  <script type="text/javascript">
			document.getElementById("loginForm").style.display="none";
		  </script>
		  <!-------------------End Raistlin Hess----------------------------------------------------------->
		</ul>
		<ul class="right hide-on-med-and-down">
		  <li><a href="events_page.php">Events</a></li>
		</ul>
		<ul class="right hide-on-med-and-down">
		  <li><a href="teams.php">Teams</a></li>
		</ul>
		<ul class="right hide-on-med-and-down">
		  <li><a href="subscribe.php">Email Notifications</a></li>
		</ul>

		<ul id="nav-mobile" class="side-nav">
		  <li><a href="#">Navbar Link</a></li>
		</ul>
		<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
		</div>
		</nav>
	</div>
END;
	}
	
	/*---------------------*
	 * End Raistlin Hess   *
	 *---------------------*/
?>

  <script type="text/javascript">
	/**
	 * @author Drew Rife
	 *
	 * Checks to see if the passwords match when changing the password 
	 */
	function checkPasswordsMatch()
	{
		var password = document.getElementById("new_password").value;
		var confirmed_password = document.getElementById("confirm").value;
		
		/* check if the password fields match or not */
		if(password !== confirmed_password)
		{
			alert("Error: password fields do not match");
			document.getElementById("new_password").value = "";
			document.getElementById("confirm").value = "";
			return false;
		}
		else
		{
			document.getElementById("changePassForm").submit();
			return true;
		}
	}
	</script>
	
	<script type="text/javascript">
	/*
	 * Raistlin Hess
	 *
	 * Updates fields under Edit Team in settings.php with current values
	 */
	function teamEditUpdates()
	{
		var thisTeam = document.getElementById("team_select").value;
		document.getElementById("new_name").value = document.getElementById("hiddenName"+thisTeam).value;
		document.getElementById("new_logo").value = document.getElementById("hiddenLogo"+thisTeam).value;
		document.getElementById("new_color").value = document.getElementById("hiddenColor"+thisTeam).value;
	}
	</script>